<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller 
{
    public function query_builder()
    {
        $video = DB::table('videos')->get();
        dd($video);
    }
    
}

