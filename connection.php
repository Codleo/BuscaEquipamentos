<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Winscp()1";
$dbname = "cadastrarequipamentos";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
	
