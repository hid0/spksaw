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
    $db = \Config\Database::connect();
    return view("hubin/tesTulis", [
      'students' => $db->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function tesWawancara()
  {
    return view("hubin/tesWawancara");
  }

  public function rekapNilai()
  {
    $db = \Config\Database::connect();
    return view("hubin/rekapNilai", [
      'students' => $db->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function tulisNilai()
  {
    // detail
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    return view("hubin/testulis_detail", [
      'student' => $db->table('tbl_siswa')->select()->join('c4', 'c4.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', $request->getUri()->getSegment(3))->get(),
    ]);
  }

  public function tulisNilaiSave()
  {
    // save
    $db = \Config\Database::connect();
    // $request = \Config\Services::request();

    $db->table('c4')->set('nilai_c4', $this->request->getPost('nilai_c4'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai Tes Tulis berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('hubin/tesTulis'));
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
