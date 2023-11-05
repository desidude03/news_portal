<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function list()
    {
        $data = \App\Models\News::all();
        return response()->json($data);
    }
}
