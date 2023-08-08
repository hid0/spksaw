<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\Database\RawSql;

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
      'class' => $db->table('tbl_kelas')->select()->get(),
    ];
    return view('admin/students', $data);
  }

  public function add_student()
  {
    helper(['my_helper', 'date']);

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
        'id' => new RawSql('DEFAULT'),
        'name' => ucwords(htmlspecialchars($this->request->getPost('name'))),
        'email' => $this->request->getPost('email'),
        'phone_no' => $this->request->getPost('phone_no'),
        'role' => 'siswa',
        'password' => password_hash(genPasswd($this->request->getPost('tgl_lahir')), PASSWORD_BCRYPT),
        // 'password' => $this->request->getPost('tgl_lahir'),
        'created_at' => now()
      ];
      $query1->insert($data1);
      // dd($data1);

      // insert student data
      $data2 = [
        'id_user' => $data1['id'],
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
        'class' => $db->table('tbl_kelas')->select()->get(),
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
    $db = \Config\Database::connect();
    $request = \Config\Services::request();
    return view('admin/dudi_detail', [
      'students' => $db->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan', 'inner')->where('tbl_jurusan.id_jurusan', $request->getUri()->getSegment(3))->get(),
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
