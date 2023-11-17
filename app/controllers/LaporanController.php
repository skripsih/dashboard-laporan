<?php

class LaporanController extends Controller
{
    public function index()
    {
        $data['title'] = "Laporan Hasil Penghitungan";
        $data['ranking'] = $this->model('AlternatifModel')->ranking();
        $this->render('templates/header', $data);
        $this->render('templates/sidebar', $data);
        $this->render('templates/topbar');
        $this->render('hitung/laporan', $data);
        $this->render('templates/footer');
    }
}