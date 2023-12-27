<?php

class Auth extends Controller
{
    public function index()
    {
        session_start();

        if (isset($_SESSION['nama']) && $_SESSION['level'] == "Admin") {
            header("Location: " . BASEURL . '/dashboard');
        } else if (isset($_SESSION['nama']) && $_SESSION['level'] == "Operator") {
            header("Location: " . BASEURL . '/operatortransaksi');
        } else {
            $this->view('login');
        }
    }

    public function login()
    {
        session_start();

        $username = $_POST['username'];
        $password = substr(hash_hmac('sha256', $_POST['password'], '6hUb#1iWB'), 0, 50);

        $user = $this->model('UserModel')->getUser($username, $password);

        if ($user['level'] == "Admin") {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['id'] = $user['id_user'];

            $this->model('NotifModel')->insert($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Selamat datang ' . $_SESSION['nama'], 'success');
            header("Location: " . BASEURL . "/dashboard");
        } else if ($user['level'] == "Operator") {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['id'] = $user['id_user'];

            $this->model('NotifModel')->insert($user['id_user']);

            Flasher::setFlash('Berhasil !', 'Selamat datang ' . $_SESSION['nama'], 'success');
            header("Location: " . BASEURL . "/operatortransaksi");
        } else {
            Flasher::setFlash('Gagal !', 'Username atau Password salah.', 'danger');
            header("Location: " . BASEURL);
        }
    }

    public function blocked()
    {
        $this->view('blocked');
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['nama']);
        unset($_SESSION['level']);

        Flasher::setFlash('Berhasil !', 'Anda telah logout dari sistem.', 'success');
        header("Location:" . BASEURL);
    }
}
