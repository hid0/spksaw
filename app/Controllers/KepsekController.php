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
}
