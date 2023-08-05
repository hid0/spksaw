<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KoordinatorController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "koordinator") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("koordinator/dashboard");
    }
    public function dokumen()
    {
        return view("koordinator/dokumen");
    }
    public function rapor()
    {
        return view("koordinator/rapor");
    }
    public function rekapNilai()
    {
        return view("koordinator/rekapNilai");
    }
}
