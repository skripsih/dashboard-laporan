<?php

class Rupiah
{

    public static function format_rupiah($number)
    {

        if ($number == '') $number = 0;
        return number_format($number, 2, '.', ',');
    }
}