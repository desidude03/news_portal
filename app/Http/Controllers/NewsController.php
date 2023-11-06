<?php

namespace App\Http\Controllers;

use App\Imports\NewsImport;
use App\Models\News;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NewsController extends Controller
{
    public function list()
    {
        $data = \App\Models\News::all();
        return response()->json($data);
    }

    public function import(Request $request)
    {
        $fileExt = $request->file('file')->extension();
        // return response()->json($fileExt);
        // dd($fileExt);
        if ($fileExt == 'json') {
            // dd($fileExt);
            $content = json_decode(file_get_contents($request->file('file')), true);
            foreach ($content as $news) {
                News::create($news);
            }

            return redirect()->back()->with('success', 'All good!');

        }
        if ($fileExt == 'xlsx') {
            Excel::import(new NewsImport, $request->file('file')->store('temp'));
            return redirect()->back()->with('success', 'All good!');
        }

        return redirect()->back()->with('Looks like file not Supported!!!');
    }
}
