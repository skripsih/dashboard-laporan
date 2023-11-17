<?php

class KriteriaController extends Controller
{
    public function __construct()
    {
        Spk::is_logged_in();
        Spk::check_access();
    }
    public function index($id = NULL)
    {
        $data['title'] = "Data Kriteria";
        $data['kriteria'] = $this->model('KriteriaModel')->semua_kriteria();

        $this->render('templates/header', $data);
        $this->render('templates/sidebar', $data);
        $this->render('templates/topbar');
        $this->render('kriteria/index', $data);
        $this->render('templates/footer');
    }

    public function simpan_kriteria()
    {

        if (isset($_POST['submit'])) {
            if ($_POST['submit'] == "Tambah") {
                $id_kriteria = $this->model('KriteriaModel')->tambahKriteria($_POST);
                $id_subkriteria = $this->model('KriteriaModel')->tambahSubKriteria($id_kriteria, $_POST);
                if ($id_kriteria) {
                    if ($id_subkriteria) {
                        Flasher::setFlash('Data kriteria dan sub kriteria berhasil ditambah', 'success');
                    } else {
                        Flasher::setFlash('Data kriteria dan sub kriteria gagal ditambah', 'danger');
                    }
                } else {
                    Flasher::setFlash('Data kriteria gagal ditambah', 'danger');
                }
            } else if ($_POST['submit'] == "Edit") {
                $id_kriteriaedit = $this->model('KriteriaModel')->editKriteria($_POST);
                $id_kriteriasubkriteriaedit = $this->model('KriteriaModel')->editSubKriteria($_POST);
                if ($id_kriteriaedit) {
                    if ($id_kriteriasubkriteriaedit) {
                        Flasher::setFlash('Data kriteria dan sub kriteria berhasil diedit', 'success');
                    }else{
                        Flasher::setFlash('Data kriteria dan sub kriteria gagal diedit', 'danger');    
                    }
                } else {
                    Flasher::setFlash('Data kriteria gagal diedit', 'danger');
                }
            }
        }
        header('Location:' . BASEURL . 'kriteria');
        exit;
    }

    public function hapus_kriteria($id_kriteria)
    {
        $this->model('NilaialternatifModel')->hapusPenilaianByKriteria($id_kriteria);
        $this->model('KriteriaModel')->hapusSubKriteriaByIdKriteria($id_kriteria);

        if ($this->model('KriteriaModel')->hapusKriteriaById($id_kriteria)) {
            Flasher::setFlash('Data kriteria, sub kriteria dan penilaian kriteria berhasil dihapus', 'success');
            header('Location:' . BASEURL . 'kriteria');
            exit;
        } else {
            Flasher::setFlash('Data kriteria, sub kriteria dan penilaian kriteria gagal dihapus', 'danger');
            header('Location:' . BASEURL . 'kriteria');
            exit;
        }
    }
}
