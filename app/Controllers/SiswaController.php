<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SiswaController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "siswa") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("siswa/dashboard");
    }

    public function biodata()
    {
        return view("siswa/biodata");
    }
}
