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

      $data = $user->insert([
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone_no' => $this->request->getPost('phone_no'),
        'role' => $this->request->getPost('role'),
        'password' => password_hash($this->request->getPost("password"), PASSWORD_BCRYPT),
      ]);

      // while create student user
      // if ($this->request->getPost('role') === 'siswa') {
      //   $studentData = [
      //     'id_user' => $data['id'],
      //     // 'nis'
      //   ];
      //   $db = \Config\Database::connect();
      //   $query = $db->table('tbl_siswa');
      // }


      // flash message
      session()->setFlashdata('message', 'Pengguna berhasil ditambahkan');
      // var_dump($this->request);
      return redirect()->to(base_url('admin/users'));
    } else {
      $user = new UserModel();
      return view('admin/users', ['validation' => $this->validator, 'users' => $user->findAll(),]);
    }
  }

  public function edit_user($id)
  {
    $users = new UserModel();

    $data = [
      'users' => $users->find($id),
    ];
    return view('admin/user_edit', $data);
  }

  public function update_user($id)
  {
    helper(['form', 'url']);
  }

  public function del_user($id)
  {
    $users = new UserModel();

    $user = $users->find($id);
    if ($user) {
      $users->delete($id);

      session()->setFlashdata('message', 'Pengguna berhasil dihapus!');
      return redirect()->to(base_url('admin/users'));
    } else {
      // return view('admin/users', ['validation' => $this->validator, 'users' => $users->findAll()]);
    }
  }

  public function students()
  {
    // student data
    $db = \Config\Database::connect();
    $query = $db->table('tbl_siswa');
    $query->select('*');
    $query->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas');
    $data = [
      'students' => $query->get(),
    ];
    return view('admin/students', $data);
  }

  public function dudi()
  {
    $db = \Config\Database::connect();
    $query = $db->table('tbl_dudi');
    $query->select('*');
    $query->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_dudi.id_jurusan');
    $data = [
      'dudi' => $query->get(),
    ];
    return view('admin/dudi', $data);
  }

  public function add_dudi()
  {
    // add DUDI
    $validation = $this->validate(
      [
        'id_jurusan' =>
        [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
          ]
        ],
        'nm_dudi' => [
          'rules' => 'required|min_length[4]',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'min_length' => 'minimal 4 karakter!'
          ]
        ]
      ]
    );

    if ($validation) {
      $data = [
        'id_jurusan' => $this->request->getPost('id_jurusan'),
        'nm_dudi' => $this->request->getPost('nm_dudi'),
      ];

      $db = \Config\Database::connect();
      $builder = $db->table('tbl_dudi');
      $builder->insert($data);
      // flash message
      session()->setFlashdata('message', 'DUDI berhasil ditambahkan');
      // var_dump($this->request);
      return redirect()->to(base_url('admin/dudi'));
    } else {
      $db = \Config\Database::connect();
      $query = $db->table('tbl_dudi');
      $query->select('*');
      $query->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_dudi.id_jurusan');
      $data = [
        'dudi' => $query->get(),
        'validation' => $this->validator,
      ];
      return view('admin/dudi', $data);
      // return view('admin/users', ['validation' => $this->validator, 'users' => $user->findAll(),]);
    }
  }

  public function criterias()
  {
    $db = \Config\Database::connect();
    $query = $db->table('tbl_kriteria');
    $data = [
      'criterias' => $query->get(),
    ];
    return view('admin/criterias', $data);
  }
}
