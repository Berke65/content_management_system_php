<?php

ob_start();
session_start();

include 'baglan.php';


// ADMIN GİRİS İSLEMİ BASLANGIC
if(isset($_POST['admingiris']))
{
	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_password = md5($_POST['kullanici_password']);// md5 şifreleme

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail AND kullanici_password=:kullanici_password AND kullanici_yetki=:kullanici_yetki");
	$kullanicisor->execute([
		'kullanici_mail' => $kullanici_mail,
		'kullanici_password' => $kullanici_password,
		'kullanici_yetki' => 5
	]);

	echo $say=$kullanicisor->rowCount();

	if($say==1)
	{
		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location: ../production/index.php");

		//session -> kullanici tarayıcıyı kapatana ya da cıkıs yapana kadar kullanici orada mı degil mi bilgilerini tutar! bunun icin de obstart ve session start komutlarının yazılmıs olması gerekir!

	}
	else
	{
		header("Location: ../production/login.php?durum=no");
		exit;
	}

}
// ADMIN GİRİS İSLEMİ BITIS


// GENEL AYAR GÜNCELLEME İSLEMİ BASLANGIC
if (isset($_POST['genelayarkaydet']))
{

	$ayarkaydet=$db->prepare("UPDATE ayar SET 
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=0");

	$update=$ayarkaydet->execute([
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
	]);

	if($update)
	{
		header("Location: ../production/genel-ayar.php?durum=ok");
	}
	else
	{
		header("Location: ../production/genel-ayar.php?durum=no");
	}

}
// GENEL AYAR GÜNCELLEME İSLEMİ BİTİS


// İLETİSİM AYAR GÜNCELLEME İSLEMİ BASLANGIC
	if(isset($_POST['iletisimayarkaydet']))
	{
		$ayarkaydet=$db->prepare("UPDATE ayar SET
			ayar_tel=:ayar_tel,
			ayar_gsm=:ayar_gsm,
			ayar_faks=:ayar_faks,
			ayar_mail=:ayar_mail,
			ayar_ilce=:ayar_ilce,
			ayar_il=:ayar_il,
			ayar_adres=:ayar_adres,
			ayar_mesai=:ayar_mesai
			WHERE ayar_id=0");

		$update=$ayarkaydet->execute([
			'ayar_tel' => $_POST['ayar_tel'],
			'ayar_gsm' => $_POST['ayar_gsm'],
			'ayar_faks' => $_POST['ayar_faks'],
			'ayar_mail' => $_POST['ayar_mail'],
			'ayar_ilce' => $_POST['ayar_ilce'],
			'ayar_il' => $_POST['ayar_il'],
			'ayar_adres' => $_POST['ayar_adres'],
			'ayar_mesai' => $_POST['ayar_mesai']
	]);
		if($update)
		{
			header("Location: ../production/iletisim-ayar.php?durum=ok");
		}
		else
		{
			header("Location: ../production/iletisim-ayar.php?durum=no");
		}

	}
// İLETİSİM AYAR GÜNCELLEME İSLEMİ BİTİS


// API AYAR GÜNCELLEME İSLEMİ BASLANGIC
	if(isset($_POST['apiayarkaydet']))
	{
		$ayarkaydet=$db->prepare("UPDATE ayar SET
			ayar_maps=:ayar_maps,
			ayar_analystic=:ayar_analystic,
			ayar_zopim=:ayar_zopim
			WHERE ayar_id=0
			");

		$update=$ayarkaydet->execute([
			'ayar_maps' => $_POST['ayar_maps'],
			'ayar_analystic' => $_POST['ayar_analystic'],
			'ayar_zopim' => $_POST['ayar_zopim']
		]);		

		if($update)
		{
			header("Location: ../production/api-ayar.php?durum=ok");
		}
		else
		{
			header("Location: ../production/api-ayar.php?durum=no");
		}
	}
// API AYAR GÜNCELLEME İSLEMİ BİTİS


// SOSYAL AYAR GÜNCELLEME BASLANGIC
	if(isset($_POST['sosyalayarkaydet']))
	{
		$ayarkaydet=$db->prepare("UPDATE ayar SET
			ayar_facebook=:ayar_facebook,
			ayar_twitter=:ayar_twitter,
			ayar_google=:ayar_google,
			ayar_youtube=:ayar_youtube
			WHERE ayar_id=0
			");

		$update=$ayarkaydet->execute([
			'ayar_facebook' => $_POST['ayar_facebook'],
			'ayar_twitter' => $_POST['ayar_twitter'],
			'ayar_google' => $_POST['ayar_google'],
			'ayar_youtube' => $_POST['ayar_youtube']
		]);

		if($update)
		{
			header("Location: ../production/sosyal-ayar.php?durum=ok");
		}
		else
		{
			header("Location: ../production/sosyal-ayar.php?durum=no");
		}
	}
// SOSYAL AYAR GÜNCELLEME BİTİS


// MAIL AYAR GÜNCELLEME BASLANGIC
	if(isset($_POST['smtpayarkaydet']))
	{
		$ayarkaydet=$db->prepare("UPDATE ayar SET
			ayar_smtphost=:ayar_smtphost,
			ayar_smtpuser=:ayar_smtpuser,
			ayar_smtppassword=:ayar_smtppassword,
			ayar_smtpport=:ayar_smtpport
			WHERE ayar_id=0
			");

		$update=$ayarkaydet->execute([
			'ayar_smtphost' => $_POST['ayar_smtphost'],
			'ayar_smtpuser' => $_POST['ayar_smtpuser'],
			'ayar_smtppassword' => $_POST['ayar_smtppassword'],
			'ayar_smtpport' => $_POST['ayar_smtpport']
		]);

		if($update)
		{
			header("Location: ../production/mail-ayar.php?durum=ok");
		}
		else
		{
			header("Location: ../production/mail-ayar.php?durum=no");
		}
	}
// MAIL AYAR GÜNCELLEME BASLANGIC


// HAKKIMIZDA AYAR GÜNCELLEME BASLANGIC
	if(isset($_POST['hakkimizdakaydet']))
	{
		$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
			hakkimizda_baslik=:hakkimizda_baslik,
			hakkimizda_icerik=:hakkimizda_icerik,
			hakkimizda_video=:hakkimizda_video,
			hakkimizda_vizyon=:hakkimizda_vizyon,
			hakkimizda_misyon=:hakkimizda_misyon
			WHERE hakkimizda_id=0
		");

		$update=$hakkimizdakaydet->execute([
			'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
			'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
			'hakkimizda_video'  => $_POST['hakkimizda_video'],
			'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
			'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		]);

		if($update)
		{
			header("Location: ../production/hakkimizda.php?durum=ok");
		}
		else
		{
			header("Location: ../production/hakkimizda.php?durum=no");
		}
	}
// HAKKIMIZDA AYAR GÜNCELLEME BİTİS


	if(isset($_POST['kullanici_duzenle']))
	{
		$kullanici_id = $_POST['kullanici_id'];

		$kullaniciduzenle=$db->prepare("UPDATE kullanici SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_tc=:kullanici_tc, 
			kullanici_gsm=:kullanici_gsm,
			kullanici_durum=:kullanici_durum
			WHERE kullanici_id={$_POST['kullanici_id']}
			"); // where satırında degisken kullanılacağı icin süslü parantez icine yazdı
		// AYRICA SÜTUNLARI BİRBİRİNE ESİTLERKEN DEMEK İSTEDİGİMİ ANLADIN ARALARA ASLA BOSLUK BIRAKMA

		$update=$kullaniciduzenle->execute([
			'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
			'kullanici_tc' => $_POST['kullanici_tc'],
			'kullanici_gsm' => $_POST['kullanici_gsm'],
			'kullanici_durum' => $_POST['kullanici_durum']
		]);

		if($update)
		{
			header("Location: ../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");
		}
		else
		{
			header("Location: ../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
		}
	}
 ?>
