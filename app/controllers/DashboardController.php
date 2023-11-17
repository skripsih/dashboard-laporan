<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        Spk::is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['t_kriteria'] = count($this->model('KriteriaModel')->semua_kriteria());
        $data['t_alternatif'] = count($this->model('AlternatifModel')->semua_alternatif());
        // $data['jenisgaji'] = $this->model('JenisgajiModel')->getAllJenisGaji();

        $this->render('templates/header', $data);
        $this->render('templates/sidebar', $data);
        $this->render('templates/topbar');
        $this->render('dashboard/index', $data);
        $this->render('templates/footer');
    }
}