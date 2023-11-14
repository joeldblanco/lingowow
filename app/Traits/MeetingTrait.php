<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

// use Log;

/**
 * trait MeetingTrait
 */
trait MeetingTrait
{
    public $client;
    public $jwt;
    public $OAuth;
    public $headers;

    public function __construct()
    {
        $this->client = new Client();
        $this->jwt = $this->generateZoomJWTToken();
        $this->OAuth = $this->generateZoomOAuthToken();
        $this->headers = [
            'Authorization' => 'Bearer ' . $this->jwt,
            'Content-Type'  => 'application/json',
            // 'Accept'        => 'application/json',
        ];
    }
    public function generateZoomJWTToken()
    {
        $key = env('ZOOM_API_KEY', '');
        $secret = env('ZOOM_API_SECRET', '');
        $payload = [
            'iss' => $key,
            'exp' => strtotime('+90 minute'),
        ];

        // dd(\Firebase\JWT\JWT::encode($payload, $secret, 'HS256'));

        return \Firebase\JWT\JWT::encode($payload, $secret, 'HS256');
    }

    public function generateZoomOAuthToken()
    {
        // GET CONFIGURATION DATA FROM .env
        $clientId  = env('ZOOM_API_CLIENT_ID', '');
        $clientSecret = env('ZOOM_API_CLIENT_SECRET', '');
        $accountId = env('ZOOM_API_ACCOUNT_ID', '');
        $url = 'https://zoom.us/oauth/token';

        // CREATE THE CLIENT INSTANCE
        $client = new Client();

        // BUILD THE REQUEST BODY
        $data = [
            'form_params' => [
                'grant_type' => 'account_credentials',
                'account_id' => $accountId,
            ],
            'headers' => [
                'Host' => 'zoom.us',
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
            ],
        ];

        // MAKE THE REQUEST
        $response = $client->post($url, $data);

        // GET THE RESPONSE BODY / TOKEN
        $body = $response->getBody();
        $tokenData = json_decode($body, true);

        return $tokenData['access_token'];
    }

    private function retrieveZoomUrl()
    {
        return env('ZOOM_API_URL', '');
    }

    public function toZoomTimeFormat(string $dateTime)
    {
        try {
            $date = new \DateTime($dateTime);

            return $date->format('Y-m-d\TH:i:s');
        } catch (\Exception $e) {
            Log::error('ZoomJWT->toZoomTimeFormat : ' . $e->getMessage());

            return '';
        }
    }
}
