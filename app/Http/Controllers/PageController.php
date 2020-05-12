<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    public function insertData(Request $Request)
    {
    	$response = 'Your form has been submitted';
    	
    	return response()->json(['message'=>$response],200);
    }
}
