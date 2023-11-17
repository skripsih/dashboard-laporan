<?php

class AuthController extends Controller
{

    public function index()
    {
        if (isset($_POST['submit'])) {
            $username = htmlspecialchars($_POST['username'], true);
            $password = htmlspecialchars($_POST['password'], true);
            $passmd5 = MD5($password);
            $data = [
                'username' => $username,
                'password' => $passmd5
            ];
            $user = $this->model('UserModel')->login($data);

            if ($user) {
                $_SESSION['username'] = $user->username;
                $_SESSION['id_user'] = $user->id_user;
                $_SESSION['role'] = $user->role;

                header('Location:' . BASEURL . 'dashboard');
            } else {
                Flasher::setFlash('Username atau password salah', 'danger');
                header('Location:' . BASEURL . 'auth');
            }
        } else {
            $data['title'] = "Login";
            $this->render('auth/login', $data);
        }
    }
    public function logout()
    {
        if (empty($_SESSION['username'])) {
            Flasher::setFlash('Upps Anda belum login', 'danger');
            header('Location:' . BASEURL . 'auth');
        } else {
            unset($_SESSION['id_user']);
            unset($_SESSION['username']);
            unset($_SESSION['role']);

            Flasher::setFlash('Terima kasih. Anda telah keluar', 'success');
            header('Location:' . BASEURL . 'auth');
        }
    }
    public function blocked()
    {
        $this->render('auth/blocked');
    }
}