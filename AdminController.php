<?php

namespace App\Http\Controllers;

use File;

class AdminController extends Controller
{
    public function index()
    {
        $files = array_map('basename', File::directories(resource_path('/views/admin/')));

        return view('admin.index', [
            'files' => $files
        ]);

    }
}
