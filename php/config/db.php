<?php

//connection variable
define("HOSTNAME", "localhost");
define("USER", "root");
define("PASS", "");
define("DATABASE", "stock");

$conn = mysqli_connect(HOSTNAME, USER, PASS, DATABASE);
if (!$conn) {
	echo "error on database";
	die;
} else {
	//echo "Success in connection database";
}
