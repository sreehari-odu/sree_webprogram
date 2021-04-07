<?php
if(!isset($_SESSION['uname'])){
    header('location: signin.php');
}