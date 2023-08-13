<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Database;
use Config\Services;

class AdminController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "admin") {
      echo 'Access denied';
      exit;
    }
    helper(['my_helper']);
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
        'password' => password_hash($this->request->getPost("password"), PASSWORD_DEFAULT),
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

  public function edit_user($id)
  {
    return view('admin/user_edit', [
      'user' => Database::connect()->table('users')->select()->where('id', Services::request()->getUri()->getSegment(3))->get()->getFirstRow(),
    ]);
  }

  public function update_user()
  {
    Database::connect()->table('users')->set('name', $this->request->getPost('name'))->set('email', $this->request->getPost('email'))->set('role', $this->request->getPost('role'))->set('phone_no', $this->request->getPost('phone_no'))->where('id', $this->request->getPost('id'))->update();
    session()->setFlashdata('message', 'user berhasil diubah!');
    return redirect()->to(base_url('admin/users'));
  }

  public function del_user()
  {
    $role = Database::connect()->table('users')->select('role')->where('id', $this->request->getPost('user_id'))->get()->getFirstRow();
    // dd($role);
    if ($role->role == 'siswa') {
      // if role is student
      // $file = Database::connect()->table('users')->select('formulir,kartu_pelajar,raport,vaksin,surat_kesehatan')->where('id', $this->request->getPost('user_id'))->get()->getFirstRow();
      // if ($file->formulir != NULL) {
      //   unlink($file->formulir);
      // }
      Database::connect()->table('tbl_siswa')->where('id_user', $this->request->getPost('user_id'))->delete();
      Database::connect()->table('users')->where('id', $this->request->getPost('user_id'))->delete();
      session()->setFlashdata('message', 'Siswa & User berhasil dihapus!');
    } else {
      Database::connect()->table('users')->where('id', $this->request->getPost('user_id'))->delete();
      session()->setFlashdata('message', 'User berhasil dihapus!');
    }
    return redirect()->to(base_url('admin/users'));
  }

  public function students()
  {
    // student data
    return view('admin/students', [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')->get(),
      'class' => Database::connect()->table('tbl_kelas')->select()->get(),
    ]);
  }

  public function add_student()
  {
    helper(['my_helper']);

    $validation = $this->validate(
      [
        'nis' =>
        [
          'rules' => 'required|numeric',
          'errors' =>
          [
            'required' => 'wajib masukkan NIS!',
            'numeric' => 'jangan masukkan selain angka!',
          ]
        ],
        'name' => [
          'rules' => 'required|min_length[4]',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'min_length' => 'minimal 4 karakter!'
          ]
        ],
        'tgl_lahir' => [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
          ]
        ],
        'id_kelas' => [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
          ]
        ],
        'email' => [
          'rules' => 'required|valid_email',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'valid_email' => 'pastikan email anda benar!',
          ]
        ],
        'phone_no' => [
          'rules' => 'required|numeric',
          'errors' =>
          [
            'required' => 'wajib masukkan nama!',
            'numeric' => 'jangan masukkan selain angka!',
          ]
        ],
      ]
    );

    $db = \Config\Database::connect();
    $query1 = $db->table('users');
    $query2 = $db->table('tbl_siswa');

    if ($validation) {
      // insert users data
      $data1 = [
        'name' => ucwords(htmlspecialchars($this->request->getPost('name'))),
        'email' => $this->request->getPost('email'),
        'phone_no' => $this->request->getPost('phone_no'),
        'role' => 'siswa',
        'password' => password_hash(genPasswd($this->request->getPost('tgl_lahir')), PASSWORD_BCRYPT),
        // 'password' => $this->request->getPost('tgl_lahir'),
        'created_at' => new Time('now'),
      ];
      $query1->insert($data1);
      // dd(Database::connect()->insertID());

      // insert student data
      $data2 = [
        'id_user' => $db->insertID(),
        'nis' => $this->request->getPost('nis'),
        'name' => ucwords(htmlspecialchars($this->request->getPost('name'))),
        'tgl_lahir' => $this->request->getPost('tgl_lahir'),
        'id_kelas' => $this->request->getPost('id_kelas'),
        'email' => $this->request->getPost('email'),
        'phone_no' => $this->request->getPost('phone_no'),
      ];
      $query2->insert($data2);
      // dd($data2);

      session()->setFlashdata('message', 'Siswa berhasil ditambahkan');
      // var_dump($this->request);
      return redirect()->to(base_url('admin/students'));
    } else {
      $data = [
        'class' => Database::connect()->table('tbl_kelas')->select()->get(),
        'students' => $query2->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas')->get(),
        'validation' => $this->validator,
      ];
      return view('admin/students', $data);
    }
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

  public function detail_dudi()
  {
    // detail show all
    return view('admin/dudi_detail', [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan', 'inner')->where('tbl_jurusan.id_jurusan', Services::request()->getUri()->getSegment(3))->get(),
    ]);
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

  public function add_criteria()
  {
    // add criteria
    $validation = $this->validate(
      [
        'nm_kriteria' =>
        [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan nama kriteria!',
          ]
        ],
        'tipe_kriteria' => [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan tipe!',
          ]
        ],
        'bobot_kriteria' => [
          'rules' => 'required',
          'errors' =>
          [
            'required' => 'wajib masukkan bobot!',
          ]
        ]
      ]
    );

    $db = \Config\Database::connect();
    $query = $db->table('tbl_kriteria');

    // validation
    if ($validation) {
      // insert data
      $data = [
        'nm_kriteria' => $this->request->getPost('nm_kriteria'),
        'tipe_kriteria' => $this->request->getPost('tipe_kriteria'),
        'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
      ];

      $query->insert($data);
      session()->setFlashdata('message', 'Kriteria berhasil ditambahkan');
      // var_dump($this->request);
      return redirect()->to(base_url('admin/criterias'));
    } else {
      $data = [
        'criterias' => $query->get(),
        'validation' => $this->validator,
      ];
      return view('admin/criterias', $data);
    }
  }
}
