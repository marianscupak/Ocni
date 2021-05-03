<?php

require_once './../vendor/autoload.php';
require_once './app/config/database.php';

require_once './app/core/Controller.php';

session_start();

define('LINK_PREFIX', "http://marian.bruhmoment.eu/okularium");
define('DO_LINK_PREFIX', "http://marian.bruhmoment.eu/domaci-optika");
define('SHARED_RES_PREFIX', "http://marian.bruhmoment.eu/shared_resources");
define('DO_RES_PREFIX', "http://marian.bruhmoment.eu/domaci-optika/public");
define('OK_RES_PREFIX', "http://marian.bruhmoment.eu/okularium/public");
