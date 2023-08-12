<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Config\Database;
// use \Config\Services;

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
      'user' => Database::connect()->table('users')->where('users.id', session()->id)->join('tbl_siswa', 'tbl_siswa.id_user = users.id')->get()
    ]);
  }

  public function saveBio()
  {
    // save biodata
    $this->upPDF();
    Database::connect()->table('tbl_siswa')->set('tgl_lahir', $this->request->getPost('tgl_lahir'))->set('phone_no', $this->request->getPost('phone_no'))->set('t_badan', $this->request->getPost('t_badan'))->set('b_badan', $this->request->getPost('b_badan'))->where('id', $this->request->getPost('id_siswa'))->update();
    session()->setFlashdata('message', 'Biodata berhasil disimpan');
    // var_dump($this->request->getPost('id_siswa'));
    return redirect()->to(base_url('siswa/biodata'));
  }

  private function upPDF()
  {
    // upload pdf file
    $validation = $this->validate(
      [
        'formulir' => 'uploaded[formulir]|mime_in[application/pdf]|max_size[4096]|ext_in[formulir,pdf]'
      ]
    );

    if ($validation) {
      $file = $this->request->getFile('formulir');

      $newName = $file->getRandomName();
      $file->move(WRITEPATH . 'uploads', $newName);
      // dd($newName);
      Database::connect()->table('tbl_siswa')->set('formulir', $newName)->where('id', $this->request->getPost('id_siswa'))->update();
      session()->setFlashdata('message', 'File berhasil disimpan & diupload');
    }
  }
}
