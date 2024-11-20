<?php 

try
{
	$db = new PDO("mysql:host=localhost;dbname=eticaret;charset=utf8",'root','');
	//echo "Veritabanı baglantısı basarili";
}
catch (PDOException $e)
{
	echo $e->getMessage();
}
 ?>
