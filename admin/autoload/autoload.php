<?php
session_start();
if (! isset($_SESSION['admin_id']))
{
	header("location:/store/login/");
}

define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."/store/public/uploads/");
?>