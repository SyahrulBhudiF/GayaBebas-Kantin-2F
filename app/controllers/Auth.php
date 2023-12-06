<?php

class Auth extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $data['user'] = $this->model('UserModel')->getUser($username, $password);

        session_start();
        if ($data['user'] == NULL) {
            header("Location: " . BASEURL . "login");
        } else {
            foreach ($data['user'] as $user) :
                $_SESSION['nama'] = $user['nama'];
                header("Location: " . BASEURL);
            endforeach;
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['nama']);
        session_destroy();
        header("Location:" . BASEURL);
    }
}
