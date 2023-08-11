<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class KoordinatorController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "koordinator") {
      echo 'Access denied';
      exit;
    }
  }

  public function index()
  {
    return view("koordinator/dashboard");
  }

  public function dokumen()
  {
    $db = \Config\Database::connect();
    return view("koordinator/dokumen", [
      'students' => $db->table('tbl_siswa')->select()->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function penilaian()
  {
    // penilaian per siswa
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    return view("koordinator/dokumen_detail", [
      'student' => $db->table('tbl_siswa')->select()->join('c2', 'c2.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', $request->getUri()->getSegment(3))->get(),
    ]);
  }

  public function save_nilai()
  {
    $db = \Config\Database::connect();
    // $request = \Config\Services::request();

    $db->table('c2')->set('nilai_c2', $this->request->getPost('nilai'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('koordinator/dokumen'));
  }

  public function rapor()
  {
    $db = \Config\Database::connect();
    return view("koordinator/rapor", [
      'students' => $db->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function c1()
  {
    // show form input
    $request = \Config\Services::request();
    $db = \Config\Database::connect();
    return view("koordinator/rapor_detail", [
      'student' => $db->table('tbl_siswa')->select()->join('c1', 'c1.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', $request->getUri()->getSegment(3))->get(),
    ]);
  }

  public function save_rapor()
  {
    // save rapor
    $db = \Config\Database::connect();
    // $request = \Config\Services::request();

    $db->table('c1')->set('nilai_c1', $this->request->getPost('nilai_c1'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai Rapor berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('koordinator/rapor'));
  }

  public function rekapNilai()
  {
    $db = \Config\Database::connect();
    return view("koordinator/rekapNilai", [
      'students' => $db->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }
}
