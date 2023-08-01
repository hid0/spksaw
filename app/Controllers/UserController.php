<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{
    public function login()
    {
        $data = [];

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => "Email or Password didn't match",
                ],
            ];

            if (!$this->validate($rules, $errors)) {

                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

                // Stroing session values
                $this->setUserSession($user);

                // Redirecting to dashboard after login
                if ($user['role'] == "admin") {

                    return redirect()->to(base_url('admin'));
                } elseif ($user['role'] == "siswa") {

                    return redirect()->to(base_url('siswa'));
                } elseif ($user['role'] == "koordinator") {

                    return redirect()->to(base_url('koordinator'));
                } elseif ($user['role'] == "hubin") {

                    return redirect()->to(base_url('hubin'));
                } elseif ($user['role'] == "gurubk") {

                    return redirect()->to(base_url('gurubk'));
                } elseif ($user['role'] == "kepsek") {

                    return redirect()->to(base_url('kepsek'));
                }
            }
        }
        return view('login');
    }

    private function setUserSession($user)
    {
        $data = [
            'id' => $user['id'],
            'name' => $user['name'],
            'phone_no' => $user['phone_no'],
            'email' => $user['email'],
            'isLoggedIn' => true,
            "role" => $user['role'],
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}
