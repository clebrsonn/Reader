<?php
/**
 * Created by PhpStorm.
 * User: cleberson
 * Date: 22/08/2015
 * Time: 22:40
 */

$conn = array(
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'reader',
    'host' => 'localhost',
    'port' => '3306'
);


$config["app.title"] = 'PHP Manga';
$config["app.description"] = 'An awesome manga site';
$config["app.language"] = 'pt-br';
$config["app.appName"] = 'Manga Reader';
$config["email.from"] = 'admin@yourdomain.com';
//$config["app.theme"] = 'default';
$config["app.cookiePrefix"] = 'wot';
//$config["app.randomInit"] = 'lvh4asd';
$config["app.version"] = '0.1';
//$config["app.minifyJs"] = '1';
//$config["app.minifyCss"] = '0';
$config["app.dateFormat"] = 'd/m/Y';
//$config["app.timeFormat"] = 'g:i a';
//$config["app.timezone"] = 'Asia/Ho_Chi_Minh';
//$config["app.dateFormatCustom"] = 'd/m/Y';
//$config["app.timeFormatCustom"] = 'g:i a';
$config["app.usernameRegex"] = '/^[a-zA-Z0-9_-]{3,16}$/';
//$config["app.remoteVersion"] = 'http://huykhong.com/wasd/version/phpmanga/version.txt';
$config["app.startDate"] = 'Tue, 28 Oct 2014 20:30:48 +0700';
$config["app.installed"] = '0';