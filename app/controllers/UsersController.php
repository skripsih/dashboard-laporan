<?php

class UsersController extends Controller
{

    public function __construct()
    {
        Spk::is_logged_in();
        Spk::check_access();
    }
    public function index($id = null)
    {
        $data['title'] = "Data Users";

        if (isset($_POST['submit'])) {

            if (trim($_POST['username_lama']) != trim($_POST['username'])) {
                if ($this->model('UserModel')->cek_username(trim($_POST['username']))) {
                    Flasher::setFlash('Data user gagal disimpan. Username sudah ada', 'danger');
                    header('Location:' . BASEURL . 'users');
                    exit;
                }
            }

            if ($_POST['submit'] == "Tambah") {
                if ($this->model('UserModel')->tambah_user($_POST) > 0) {
                    Flasher::setFlash('Data user berhasil ditambah', 'success');
                } else {
                    Flasher::setFlash('Data user gagal ditambah', 'danger');
                }
            } else if ($_POST['submit'] == "Edit") {
                if ($this->model('UserModel')->edit_user($_POST) > 0) {
                    Flasher::setFlash('Data user berhasil diedit', 'success');
                } else {
                    Flasher::setFlash('Data user gagal diedit', 'danger');
                }
            }
            header('Location:' . BASEURL . 'users');
            exit;
        } else {
            $data['user'] = $this->model('UserModel')->semua_user();
            if ($id != NULL) {
                $data['detail'] = $this->model('UserModel')->detail_user($id);
            }

            $this->render('templates/header', $data);
            $this->render('templates/sidebar', $data);
            $this->render('templates/topbar');
            $this->render('user/index', $data);
            $this->render('templates/footer');
        }
    }

    public function hapus_user($id)
    {

        if ($this->model('UserModel')->detail_user($id) > 0) {
            if ($this->model('UserModel')->hapus_user($id) > 0) {
                Flasher::setFlash('Data user berhasil dihapus', 'success');
            } else {
                Flasher::setFlash('Data user gagal dihapus', 'danger');
            }
        } else {
            Flasher::setFlash('Data user tidak ditemukan. Gagal dihapus', 'danger');
        }

        header('Location:' . BASEURL . 'users');
        exit;
    }

}
