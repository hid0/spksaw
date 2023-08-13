<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Config\Database;
use \Config\Services;

class SiswaController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "siswa") {
      echo 'Access denied';
      exit;
    }
  }
  public function index()
  {
    return view("siswa/dashboard");
  }

  public function biodata()
  {
    return view("siswa/biodata", [
      'user' => Database::connect()->table('users')->where('users.id', session()->id)->join('tbl_siswa', 'tbl_siswa.id_user = users.id', 'left')->get()
    ]);
  }

  public function saveBio()
  {
    // dd($this->request->getFile('formulir'));
    // upload pdf file
    $validation = $this->validate(
      [
        'formulir' => [
          'rules' => 'max_size[formulir,4096]', 'mime_in[formulir,application/pdf]', 'ext_in[formulir,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ]
      ]
    );

    if ($validation) {
      $file = $this->request->getFile('formulir');

      $newName = $file->getRandomName();
      $file->move('uploads', $newName);
      // dd($newName);
      Database::connect()->table('tbl_siswa')->set('formulir', $newName)->where('id', $this->request->getPost('id_siswa'))->update();
      session()->setFlashdata('message', 'File berhasil disimpan & diupload');
    }

    Database::connect()->table('tbl_siswa')->set('tgl_lahir', $this->request->getPost('tgl_lahir'))->set('phone_no', $this->request->getPost('phone_no'))->set('t_badan', $this->request->getPost('t_badan'))->set('b_badan', $this->request->getPost('b_badan'))->where('id', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Biodata berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('siswa/biodata'));
  }

  public function rekomendasi()
  {
    // recommendation
    return view('siswa/rekomendasi', [
      'dudi' => Database::connect()->table('tbl_dudi')->select()->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_dudi.id_jurusan')->get(),
    ]);
  }

  public function dudi()
  {
    // detail
    return view('siswa/dudi', [
      'students' => Database::connect()->table('tbl_referensi')->select()->distinct('false')->join('tbl_siswa', 'tbl_referensi.id_siswa = tbl_siswa.id', 'inner')->join('tbl_kelas', 'tbl_siswa.id_kelas = tbl_kelas.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_kelas.id_jurusan = tbl_jurusan.id_jurusan', 'inner')->where('tbl_kelas.id_jurusan', Services::request()->getUri()->getSegment(3))->orderBy('tbl_referensi.nilai_referensi', 'DESC')->get(),
      'dudi' => Database::connect()->table('tbl_dudi')->select('id_dudi,nm_dudi')->where('id_dudi', Services::request()->getUri()->getSegment(4))->get()->getFirstRow(),
    ]);
  }
}
