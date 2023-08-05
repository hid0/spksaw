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
    public function tesTulis()
    {
        return view("hubin/tesTulis");
    }
    public function tesWawancara()
    {
        return view("hubin/tesWawancara");
    }
    public function rekapNilai()
    {
        return view("hubin/rekapNilai");
    }
    public function hitung()
    {
        return view("hubin/hitung");
    }
    public function lihatHasil()
    {
        return view("hubin/lihatHasil");
    }
    public function detailHasil()
    {
        return view("hubin/detailHasil");
    }
    public function cetak()
    {
        return view("hubin/cetak");
    }
}
