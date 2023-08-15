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
        'tgl_lahir' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Tanggal Lahir wajib diisi!'
          ]
        ],
        'phone_no' => [
          'rules' => 'numeric',
          'errors' => [
            'numeric' => 'No.HP wajib diisi!'
          ]
        ],
        't_badan' => [
          'rules' => 'numeric',
          'errors' => [
            'numeric' => 'Tinggi Badan wajib diisi!'
          ]
        ],
        'b_badan' => [
          'rules' => 'numeric',
          'errors' => [
            'numeric' => 'Berat Badan wajib diisi!'
          ]
        ],
        'formulir' => [
          'rules' => 'max_size[formulir,4096]', 'mime_in[formulir,application/pdf]', 'ext_in[formulir,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ],
        'kartu_pelajar' => [
          'rules' => 'max_size[kartu_pelajar,4096]', 'mime_in[kartu_pelajar,application/pdf]', 'ext_in[kartu_pelajar,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ],
        'raport' => [
          'rules' => 'max_size[raport,4096]', 'mime_in[raport,application/pdf]', 'ext_in[raport,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ],
        'vaksin' => [
          'rules' => 'max_size[vaksin,4096]', 'mime_in[vaksin,application/pdf]', 'ext_in[vaksin,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ],
        'surat_kesehatan' => [
          'rules' => 'max_size[surat_kesehatan,4096]', 'mime_in[surat_kesehatan,application/pdf]', 'ext_in[surat_kesehatan,pdf]',
          'errors' => [
            'max_size' => 'maksimal 4MB',
            'mime_in' => 'harus file pdf',
            'ext_in' => 'harus file pdf',
          ]
        ],
      ]
    );

    if ($validation) {
      if ($this->request->getFiles()['formulir']->getError() != 4 || $this->request->getFiles()['kartu_pelajar']->getError() != 4 || $this->request->getFiles()['raport']->getError() != 4 || $this->request->getFiles()['vaksin']->getError() != 4 || $this->request->getFiles()['surat_kesehatan']->getError() != 4) {
        $file1 = $this->request->getFile('formulir');
        $file2 = $this->request->getFile('kartu_pelajar');
        $file3 = $this->request->getFile('raport');
        $file4 = $this->request->getFile('vaksin');
        $file5 = $this->request->getFile('surat_kesehatan');

        // $check = Database::connect()->table('tbl_siswa')->select()->where('id', $this->request->getPost('id_siswa'))->get()->getFirstRow();
        // if ($check->formulir != NULL || $check->formulir != '' && $this->request->getFiles()['formulir']->getError() != 4) {
        //   // delete old file
        //   if (file_exists($check->formulir)) {
        //     unlink($check->formulir);
        //   }
        //   unlink($check->formulir);
        //   } elseif ($check->kartu_pelajar != NULL || $check->kartu_pelajar != '' && $this->request->getFiles()['kartu_pelajar']->getError() != 4) {
        //     // delete old file
        //     if (file_exists('uploads/' . $check->kartu_pelajar)) {
        //       unlink('uploads/' . $check->kartu_pelajar);
        //     }
        //   } elseif ($check->raport != NULL || $check->raport != '' && $this->request->getFiles()['raport']->getError() != 4) {
        //     // delete old file
        //     if (file_exists('uploads/' . $check->raport)) {
        //       unlink('uploads/' . $check->raport);
        //     }
        //   } elseif ($check->vaksin != NULL || $check->vaksin != '' && $this->request->getFiles()['vaksin']->getError() != 4) {
        //     // delete old file
        //     if (file_exists('uploads/' . $check->vaksin)) {
        //       unlink('uploads/' . $check->vaksin);
        //     }
        //   } elseif ($check->surat_kesehatan != NULL || $check->surat_kesehatan != '' && $this->request->getFiles()['surat_kesehatan']->getError() != 4) {
        //     // delete old file
        //     if (file_exists('uploads/' . $check->surat_kesehatan)) {
        //       unlink('uploads/' . $check->surat_kesehatan);
        //     }
        // }
        $newName1 = $file1->getRandomName();
        $newName2 = $file2->getRandomName();
        $newName3 = $file3->getRandomName();
        $newName4 = $file4->getRandomName();
        $newName5 = $file5->getRandomName();
        $file1->move('uploads', $newName1);
        $file2->move('uploads', $newName2);
        $file3->move('uploads', $newName3);
        $file4->move('uploads', $newName4);
        $file5->move('uploads', $newName5);
        Database::connect()->table('tbl_siswa')->set('tgl_lahir', $this->request->getPost('tgl_lahir'))->set('phone_no', $this->request->getPost('phone_no'))->set('t_badan', $this->request->getPost('t_badan'))->set('b_badan', $this->request->getPost('b_badan'))->set('formulir', $newName1)->set('kartu_pelajar', $newName2)->set('raport', $newName3)->set('vaksin', $newName4)->set('surat_kesehatan', $newName5)->where('id', $this->request->getPost('id_siswa'))->update();
        // dd($check);
        session()->setFlashdata('message', 'Data berhasil disimpan & diupload');
      } else {
        Database::connect()->table('tbl_siswa')->set('tgl_lahir', $this->request->getPost('tgl_lahir'))->set('phone_no', $this->request->getPost('phone_no'))->set('t_badan', $this->request->getPost('t_badan'))->set('b_badan', $this->request->getPost('b_badan'))->where('id', $this->request->getPost('id_siswa'))->update();
        session()->setFlashdata('message', 'Biodata berhasil disimpan');
      }
    }
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
