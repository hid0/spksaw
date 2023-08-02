<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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

  public function user($id)
  {
    $users = new UserModel();

    $data = [
      'users' => $users->find($id),
    ];
    return view('admin/user_edit', $data);
  }
}
