<?php

class HitungController extends Controller
{
    public function __construct()
    {
        Spk::is_logged_in();
        Spk::check_access();
    }
    public function index()
    {
            $data['title'] = "Penghitungan Simple Additive Weighting";

            $data['penilaian'] = $this->model('NilaialternatifModel')->cek_penilaian();
            $data['kriteria'] = $this->model('KriteriaModel')->semua_kriteria();
            $data['alternatif'] = $this->model('AlternatifModel')->semua_alternatif(); 

            $this->render('templates/header', $data);
            $this->render('templates/sidebar', $data);
            $this->render('templates/topbar');
            $this->render('hitung/index', $data);
            $this->render('templates/footer');
    }
}