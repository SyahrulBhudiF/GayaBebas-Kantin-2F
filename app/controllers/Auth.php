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
        $password = $_POST['password'];

        $user = $this->model('UserModel')->getUser($username, $password);

        if ($user['level'] == "Admin") {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = $user['level'];
            header("Location: " . BASEURL . "/dashboard");
        } else if ($user['level'] == "Operator") {
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['level'] = $user['level'];
            header("Location: " . BASEURL . "/operatortransaksi");
        } else {
            $_SESSION['message'] = true;
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
        session_destroy();
        header("Location:" . BASEURL);
    }
}
