<?php

class AlternatifController extends Controller
{
    public function __construct()
    {
        Spk::is_logged_in();
        Spk::check_access();
    }
    public function index()
    {
        $data['title'] = "Data Alternatif";

        $data['alternatif'] = $this->model('AlternatifModel')->semua_alternatif();

        $this->render('templates/header', $data);
        $this->render('templates/sidebar', $data);
        $this->render('templates/topbar');
        $this->render('alternatif/index', $data);
        $this->render('templates/footer');
    }

    public function form($id = NULL)
    {
        $data['title'] = "Tambah Data Alternatif";
        $data['kriteria'] = $this->model('KriteriaModel')->semua_kriteria();

        if ($id != NULL) {
            $data['title'] = "Edit Data Alternatif";
            $data['detail'] = $this->model('AlternatifModel')->detail_alternatif($id);
            $data['penilaian'] = $this->model('NilaialternatifModel')->detail_nilai_alternatif($id);
        }
        $this->render('templates/header', $data);
        $this->render('templates/sidebar', $data);
        $this->render('templates/topbar');
        $this->render('alternatif/form', $data);
        $this->render('templates/footer');
    } 

    public function simpan_alternatif()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Tambah") {

                $id_alternatif = $this->model('AlternatifModel')->tambah_alternatif($_POST);
                $nilai_alternatif = $this->model('NilaialternatifModel')->tambah_nilai_alternatif($_POST);
                if(isset($id_alternatif)&&isset($nilai_alternatif)) {
                    Flasher::setFlash('Data alternatif dan nilai alternatif berhasil ditambah', 'success');
                } elseif(isset($id_alternatif) && !isset($nilai_alternatif)) {
                    Flasher::setFlash('Data nilai alternatif gagal ditambah', 'danger');
                }else if(!isset($id_alternatif) && isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif gagal ditambah', 'danger');
                }else if(!isset($id_alternatif) && !isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif dan nilai alternatif gagal ditambah', 'danger');
                }   
            } else if ($_POST['submit'] == "Edit") {
                $id_alternatif = $this->model('AlternatifModel')->edit_alternatif($_POST);
                $nilai_alternatif = $this->model('NilaialternatifModel')->edit_nilai_alternatif($_POST);
                if(isset($id_alternatif)&&isset($nilai_alternatif)) {
                    Flasher::setFlash('Data alternatif dan nilai alternatif berhasil diedit', 'success');
                } elseif(isset($id_alternatif) && !isset($nilai_alternatif)) {
                    Flasher::setFlash('Data nilai alternatif gagal diedit', 'danger');
                }else if(!isset($id_alternatif) && isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif gagal diedit', 'danger');
                }else if(!isset($id_alternatif) && !isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif dan nilai alternatif gagal diedit', 'danger');
                } 
            }
        }
        header('Location:' . BASEURL . 'alternatif');
        exit;
    }

    public function hapus_alternatif($id)
    {
                $id_alternatif = $this->model('NilaialternatifModel')->hapus_nilai_alternatif($id);
                $nilai_alternatif = $this->model('AlternatifModel')->hapus_alternatif($id);
                if(isset($id_alternatif)&&isset($nilai_alternatif)) {
                    Flasher::setFlash('Data alternatif dan nilai alternatif berhasil dihapus', 'success');
                } elseif(isset($id_alternatif) && !isset($nilai_alternatif)) {
                    Flasher::setFlash('Data nilai alternatif gagal dihapus', 'danger');
                }else if(!isset($id_alternatif) && isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif gagal dihapus', 'danger');
                }else if(!isset($id_alternatif) && !isset($nilai_alternatif)){
                    Flasher::setFlash('Data alternatif dan nilai alternatif gagal dihapus', 'danger');
                } 
        header('Location:' . BASEURL . 'alternatif');
        exit;
    }
}
