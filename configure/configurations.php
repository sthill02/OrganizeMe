<?php

date_default_timezone_set('America/Sao_Paulo');

//APLICATION
define('PATH_ROOT', $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/');
define('DOMAIN', 'http://' . $_SERVER['SERVER_NAME']);
define('PATH_UPLOAD', PATH_ROOT . 'app/webroot/uploads/');

//ERRORS
define('ERRORS', true);

?>