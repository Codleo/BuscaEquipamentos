<?php
session_start();

include("connection.php");

if(isset($_SESSION['use_id']))
{
	unset($_SESSION['use_id']);
}

header("Location: index.php");
die;