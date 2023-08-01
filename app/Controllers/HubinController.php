<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HubinController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "hubin") {
            echo 'Access denied';
            exit;
        }
    }
    public function index()
    {
        return view("hubin/dashboard");
    }
}
