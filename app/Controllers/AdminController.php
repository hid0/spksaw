<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "admin") {
      echo 'Access denied';
      exit;
    }
  }
  public function index()
  {
    return view("admin/dashboard");
  }

  public function users()
  {
    $users = new UserModel();

    $data = [
      'users' => $users->findAll(),
    ];
    return view('admin/users', $data);
  }

  // add data
  public function user_add()
  {
    helper(['url']);

    $validation = $this->validate(
      [
        'name' =>
        [
          'rules' => 'required|min_length[4]',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'min_length' => 'minimal 4 karakter!'
          ]
        ],
        'email' => [
          'rules' => 'required|valid_email|is_unique[users.email]',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'valid_email' => 'email belum benar!',
            'is_unique' => 'email sudah pernah didaftarkan!'
          ]
        ],
        'phone_no' => [
          'rules' => 'required|numeric',
          'errors' =>
          [
            'required' => 'wajib masukkan nomer hp!',
          ]
        ],
        'role' => [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib memilih role!',
          ]
        ],
        'password' => [
          'rules' => 'required|min_length[6]',
          'errors' =>
          [
            'required' => 'wajib masukkan password!',
            'min_length' => 'minimal 6 karakter!'
          ]
        ],
      ]
    );

    if ($validation) {
      // model init
      $user = new UserModel();

      $user->insert([
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone_no' => $this->request->getPost('phone_no'),
        'role' => $this->request->getPost('role'),
        'password' => password_hash($this->request->getPost("password"), PASSWORD_BCRYPT),
      ]);


      // flash message
      session()->setFlashdata('message', 'Pengguna berhasil ditambahkan');
      // var_dump($this->request);
      return redirect()->to(base_url('admin/users'));
    } else {
      $user = new UserModel();
      return view('admin/users', ['validation' => $this->validator, 'users' => $user->findAll(),]);
    }
  }

  public function user($id)
  {
    $users = new UserModel();

    $data = [
      'users' => $users->find($id),
    ];
    return view('admin/user_edit', $data);
  }

  public function update($id)
  {
    helper(['form', 'url']);
  }
}
