<?php

require_once './../vendor/autoload.php';
require_once './app/config/database.php';

require_once './app/core/Controller.php';

session_start();

define('LINK_PREFIX', "http://localhost/Ocni/okularium");
define('DO_LINK_PREFIX', "http://localhost/Ocni/domaci-optika");
define('SHARED_RES_PREFIX', "/Ocni/shared_resources");
define('DO_RES_PREFIX', "/Ocni/domaci-optika/public");
define('OK_RES_PREFIX', "/Ocni/okularium/public");