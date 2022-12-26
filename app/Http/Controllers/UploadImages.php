<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


 class UploadImages extends Controller {
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index(Request $request)
     {
        dd("Hola Este archivo sirve", $request);//simplemente haremos que devuelva esto
     }
 } 


