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
    return view("hubin/hitung", [
      'rekapitulasi' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('c1', 'c1.id_siswa = tbl_siswa.id', 'left')->join('c2', 'c2.id_siswa = tbl_siswa.id', 'left')->join('c3', 'c3.id_siswa = tbl_siswa.id', 'left')->join('c4', 'c4.id_siswa = tbl_siswa.id', 'left')->join('c5', 'c5.id_siswa = tbl_siswa.id', 'left')->get(),
      'normalisasi' => Database::connect()->table('tbl_siswa')->select()->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'inner')->join('tbl_jurusan', 'tbl_jurusan.id_jurusan = tbl_kelas.id_jurusan')->join('tbl_normalisasi', 'tbl_normalisasi.id_siswa = tbl_siswa.id', 'inner')->get(),
      // 'referensi' => Database::connect()->table('tbl_referensi')->select()->join('tbl_normalisasi')->get(),
    ]);
  }

  public function reset()
  {
    // reset normalisasi table
    Database::connect()->table('tbl_normalisasi')->truncate();
    Database::connect()->table('tbl_referensi')->truncate();
    session()->setFlashdata('message', 'Data Berhasil direset!');
    return redirect()->to(base_url('hubin/hitung'));
  }

  public function normalisasi()
  {
    // normalisasi from hitung // use looping
    $c1Val = Database::connect()->table('c1')->get()->getNumRows();
    $c2Val = Database::connect()->table('c2')->get()->getNumRows();
    $c3Val = Database::connect()->table('c3')->get()->getNumRows();
    $c4Val = Database::connect()->table('c4')->get()->getNumRows();
    $c5Val = Database::connect()->table('c5')->get()->getNumRows();
    $c1 = Database::connect()->table('c1')->select()->get()->getResultArray();
    $c1Max = Database::connect()->table('c1')->selectMax('nilai_c1')->get()->getFirstRow();
    $c2 = Database::connect()->table('c2')->select()->get()->getResultArray();
    $c2Max = Database::connect()->table('c2')->selectMax('nilai_c2')->get()->getFirstRow();
    $c3 = Database::connect()->table('c3')->select()->get()->getResultArray();
    $c3Max = Database::connect()->table('c3')->selectMax('nilai_c3')->get()->getFirstRow();
    $c4 = Database::connect()->table('c4')->select()->get()->getResultArray();
    $c4Max = Database::connect()->table('c4')->selectMax('nilai_c4')->get()->getFirstRow();
    $c5 = Database::connect()->table('c5')->select()->get()->getResultArray();
    $c5Min = Database::connect()->table('c5')->selectMin('nilai_c5')->get()->getFirstRow();

    if ($c1Val == $c2Val && $c1Val == $c3Val && $c1Val == $c4Val && $c1Val == $c5Val) {
      for ($i = 0; $i < $c1Val; $i++) {
        // array all data in table c1-c5
        $data[] = [
          'id_siswa' => $c1[$i]['id_siswa'],
          'c1' => $c1[$i]['nilai_c1'] / $c1Max->nilai_c1,
          'c2' => $c2[$i]['nilai_c2'] / $c2Max->nilai_c2,
          'c3' => $c3[$i]['nilai_c3'] / $c3Max->nilai_c3,
          'c4' => $c4[$i]['nilai_c4'] / $c4Max->nilai_c4,
          'c5' => $c5Min->nilai_c5 / $c5[$i]['nilai_c5'],
        ];
      }
      Database::connect()->table('tbl_normalisasi')->insertBatch($data);
      session()->setFlashdata('message', 'Data Berhasil dinormalisasikan!');
      return redirect()->to(base_url('hubin/hitung'));
      // dd($c1[0]['nilai_c1'] / $c1Max->nilai_c1);
      // dd(number_format($c1[0]['nilai_c1'] / $c1Max->nilai_c1, 8, ".", ""));
    } else {
      echo "alert('Data ada yang belum diisi')";
    }
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
