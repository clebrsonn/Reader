<?php

/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 22/08/2015
 * Time: 22:40
 */

$connection = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'reader',
    'host' => 'localhost',
    'port' => '3306'
);

$config = array(
    "app.title" => 'Mangá Reader',
    "app.description" => 'An awesome manga site',
    "app.language" => 'pt-br',
    "app.appName" => 'Manga Reader',
    "email.from" => 'admin@yourdomain.com',
//$config["app.theme" => 'default' ,
    "app.cookiePrefix" => 'wot',
//$config["app.randomInit" => 'lvh4asd' ,
    "app.version" => '0.1',
//$config["app.minifyJs" => '1' ,
//$config["app.minifyCss" => '0' ,
    "app.dateFormat" => 'd/m/Y',
//$config["app.timeFormat" => 'g:i a' ,
//$config["app.timezone" => 'Asia/Ho_Chi_Minh' ,
//$config["app.dateFormatCustom" => 'd/m/Y' ,
//$config["app.timeFormatCustom" => 'g:i a' ,
    "app.usernameRegex" => '/^[a-zA-Z0-9_-]{3,16}$/',
//$config["app.remoteVersion" => 'http://huykhong.com/wasd/version/phpmanga/version.txt' ,
    "app.startDate" => 'Tue, 28 Oct 2014 20:30:48 +0700',
    "app.installed" => '0'
);

