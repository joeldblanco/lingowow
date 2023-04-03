<?php

namespace App\Http\Controllers;

use App\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExportController extends Controller
{

    public function export(Request $request)
    {
        $invoices = Invoice::whereBetween('created_at', [Carbon::create(null, $request->month, 1)->startOfMonth()->subDay()->format('Y-m-d'), Carbon::create(null, $request->month, 1)->endOfMonth()->addDay()->format('Y-m-d')])->get();

        $headers = [
            'Content-type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename=Invoices ' . Carbon::create(null, $request->month, 1)->startOfMonth()->format('Y-m-d') . '-' . Carbon::create(null, $request->month, 1)->endOfMonth()->format('Y-m-d') . '.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0'
        ];


        $callback = function () use ($invoices) {
            $file = fopen('php://output', 'w');

            // Encabezado del archivo CSV
            fputcsv($file, ['ID', 'Customer', 'Address', 'Total', 'Date', 'Payment Method']);

            // Datos de la tabla
            foreach ($invoices as $invoice) {
                fputcsv($file, [$invoice->id, $invoice->user->first_name . ' ' . $invoice->user->last_name, $invoice->user->street . ', ' . $invoice->user->city . ' ' . $invoice->user->zip_code . '. ' . $invoice->user->country, $invoice->price, $invoice->created_at->format('d/m/Y'), $invoice->payment_method], ',', '"');
            }

            // echo "\xEF\xBB\xBF";

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
