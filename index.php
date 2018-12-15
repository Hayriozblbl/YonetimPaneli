<?php 

ob_start();
session_start();
if(isset($_SESSION['admin_kadi']))
{
	header("Location:production");
}
else 
{
	header("Location:production/login.php");

}
?>
