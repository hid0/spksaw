<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KepsekController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "kepsek") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("kepsek/dashboard");
    }
    public function lihatHasil()
    {
        return view("kepsek/lihatHasil");
    }
    public function detailHasil()
    {
        return view("kepsek/detailHasil");
    }
    public function cetak()
    {
        return view("kepsek/cetak");
    }
}
