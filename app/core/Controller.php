<?php

class Controller
{

    public function render($view, $data = [])
    {

        $tanggal = new Tanggal();
        $spk = new Spk();

        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {

        require_once '../app/models/' . $model . '.php';

        return new $model;
    }
}