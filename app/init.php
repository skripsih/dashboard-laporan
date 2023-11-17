<?php

require_once 'config/Config.php';
require_once 'core/download_helper.php';
require_once 'core/tcpdf_helper.php';

spl_autoload_register(function ($class) {
    require_once 'core/' . $class . '.php';
});