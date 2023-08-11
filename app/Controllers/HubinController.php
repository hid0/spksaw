<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Config\Database;
use \Config\Services;

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
    return view("hubin/tesTulis", [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function tulisNilai()
  {
    // detail
    return view("hubin/testulis_detail", [
      'student' => Database::connect()->table('tbl_siswa')->select()->join('c4', 'c4.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', Services::request()->getUri()->getSegment(3))->get(),
    ]);
  }

  public function tulisNilaiSave()
  {
    // save
    Database::connect()->table('c4')->set('nilai_c4', $this->request->getPost('nilai_c4'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai Tes Tulis berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('hubin/tesTulis'));
  }

  public function tesWawancara()
  {
    return view("hubin/tesWawancara", [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
  }

  public function wawancaraNilai()
  {
    // nilai wawancara
    return view("hubin/wawancara_detail", [
      'student' => Database::connect()->table('tbl_siswa')->select()->join('c3', 'c3.id_siswa = tbl_siswa.id', 'inner')->where('tbl_siswa.id', Services::request()->getUri()->getSegment(3))->get(),
    ]);
  }

  public function wawancaraSave()
  {
    // save
    Database::connect()->table('c3')->set('nilai_c3', $this->request->getPost('nilai_c3'))->where('id_siswa', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Nilai Tes Wawancara berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('hubin/tesWawancara'));
  }

  public function rekapNilai()
  {
    return view("hubin/rekapNilai", [
      'students' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
    ]);
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
