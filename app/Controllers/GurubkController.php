<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Config\Database;
use \Config\Services;

class GurubkController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "gurubk") {
      echo 'Access denied';
      exit;
    }
  }

  public function index()
  {
    return view("gurubk/dashboard");
  }

  public function presensi()
  {
    return view("gurubk/presensi", [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function presensiJml()
  {
    return view('gurubk/presensi_detail', [
      'student' => Database::connect()->table('tbl_siswa')->select()->join('c5', 'c5.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', Services::request()->getUri()->getSegment(3))->get(),
    ]);
  }

  public function presensiSave()
  {
    // save
    Database::connect()->table('c5')->set('nilai_c5', $this->request->getPost('nilai_c5'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Presensi berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('gurubk/presensi'));
  }

  public function rekapNilai()
  {
    return view("gurubk/rekapNilai", [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }
}
