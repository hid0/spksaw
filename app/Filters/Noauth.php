<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {

            if (session()->get('role') == "admin") {
                return redirect()->to(base_url('admin'));
            }

            if (session()->get('role') == "siswa") {
                return redirect()->to(base_url('siswa'));
            }

            if (session()->get('role') == "koordinator") {
                return redirect()->to(base_url('koordinator'));
            }

            if (session()->get('role') == "hubin") {
                return redirect()->to(base_url('hubin'));
            }

            if (session()->get('role') == "gurubk") {
                return redirect()->to(base_url('gurubk'));
            }

            if (session()->get('role') == "kepsek") {
                return redirect()->to(base_url('kepsek'));
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
