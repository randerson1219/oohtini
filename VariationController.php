<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function index()
    {
        $files = array_map('basename', File::directories(resource_path('/views/admin/variations')));

        return view('admin.variations.index', [
            'files' => $files
        ]);

    }
}
