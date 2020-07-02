<?php
session_start();
session_unset();
header('location:Admin_Login.php');
?>