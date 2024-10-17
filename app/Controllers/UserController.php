<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserController extends BaseController
{


    public function index()
    {
        // dd(password_hash('admin123casn123bps', PASSWORD_DEFAULT));
        return view('user/loginPage');
    }

    private function setSession($userModel)
    {
        session()->set([
            'user_id' => $userModel['id'],
            'user_username' => $userModel['username'],
            'user_role' => $userModel['role'],
            'logged_in' => true,
        ]);
    }

    public function auth()
    {

        if (! $this->request->is('post')) {
            return view('user/loginPage');
        }

        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Ambil pengguna berdasarkan username
        $user = $model->where('username', $username)->first();
        if ($user && password_verify($password, $user['password_hash'])) {
            $this->setSession($user);
            return view('admin/index');
        }

        session()->setFlashdata('error', 'Username atau password salah!');
        session()->setFlashdata('username', $username);
        return redirect()->to('login'); // Tidak valid
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function blank()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('login');
        }
        return view('/user/newPage');
    }
}
