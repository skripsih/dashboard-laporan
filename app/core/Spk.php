<?php

class Spk extends Database
{

    public static function is_logged_in()
    {

        if (!$_SESSION['id_user'] && !$_SESSION['username']) {
            Flasher::setFlash('Silahkan login terlebih dahulu', 'danger');
            header('Location:' . BASEURL);
            exit;
        }
    }

    public static function check_access()
    {
        if ($_SESSION['role'] != 'pengelola') {
            header('Location:' . BASEURL . 'auth/blocked');
            exit;
        }
    }
}