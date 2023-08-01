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
}
