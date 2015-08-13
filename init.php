<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 12/08/2015
 * Time: 21:11
 */


// define valores padrуo para diretivas do php.ini
ini_set('error_reporting', -1);
ini_set('display_errors', 0); // deve ser definida para zero (0) em ambiente de produчуo

// timezone
date_default_timezone_set('America/Sao_Paulo');

// tempo mсximo de execuчуo de um script
set_time_limit(60);

