<?php
$db_host = '127.0.0.1';
$db_user = 'appuser';
$db_password = 'password';
$db_name = 'cs518';
$db = mysqli_connect($db_host,$db_user,$db_password,$db_name) or ("could not connect to database");
$userTable = "users";
$passwordResetTable = "password_reset";
define("RECAPTCHA_V3_SECRET_KEY", '6Le8hq8aAAAAAF4ZDOb5oApbZIQQVsX859wYm2FR');