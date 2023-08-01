<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class GurubkController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "gurubk") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("gurubk/dashboard");
    }
}
