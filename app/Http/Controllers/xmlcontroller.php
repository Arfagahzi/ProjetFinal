<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class xmlcontroller extends Controller
{
    public function  index()
    {$xmlString = file_get_contents(public_path('Siad.xml'));

        $xmlObject = simplexml_load_string($xmlString);


        $json = json_encode($xmlObject);

        $phpArray = json_decode($json, true);

      return view("xml",['tables' => $phpArray]);
    }
}
