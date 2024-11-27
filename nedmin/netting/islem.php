<?php

ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';


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


// KULLANICI DÜZENLEME İSLEMLERİ BASLANGIC
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
// KULLANICI DÜZENLEME İSLEMLERİ BASLANGIC


// KULLANICI "SİL"ME İSLEMLERİ BASLANGIC
if($_GET['kullanicisil'] == "ok")  // get kullanırken isset kullanmayız
{
	$kullanicisil=$db->prepare("DELETE FROM kullanici WHERE kullanici_id=:kullanici_id");
	$kontrol=$kullanicisil->execute([
		'kullanici_id' => $_GET['kullanici_id']
	]); 

	if($kontrol)
	{
		header("Location: ../production/kullanici.php?sil=ok");
	}
	else
	{
		header("Location: ../production/kullanici.php?sil=no");
	}
}
// KULLANICI SİLME İSLEMLERİ BİTİS


// MENU GUNCELLEME İSLEMİ BASLANGIC
	if(isset($_POST['menu_duzenle']))
	{
		$menu_id = $_POST['menu_id'];
		$menu_seourl = seo($_POST['menu_ad']);

		$menuguncelle=$db->prepare("UPDATE menu SET
			menu_ad=:menu_ad,
			menu_detay=:menu_detay,
			menu_url=:menu_url,
			menu_sira=:menu_sira,
			menu_seourl=:menu_seourl,
			menu_durum=:menu_durum
			WHERE menu_id = {$_POST['menu_id']}
		");

		$update=$menuguncelle->execute([
			'menu_ad' => $_POST['menu_ad'],
			'menu_detay' => $_POST['menu_detay'],
			'menu_url' => $_POST['menu_url'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_seourl' => $menu_seourl,
			'menu_durum' => $_POST['menu_durum']
		]);

		if($update)
		{
			header("Location: ../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");
		}
		else
		{
			header("Location: ../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
		}
	}
// MENU GUNCELLEME İSLEMİ BİTİS


// MENU SİLME İSLEMİ BASLANGIC
	if($_GET['menusil'] == "ok")
	{
		$menusil=$db->prepare("DELETE FROM menu WHERE menu_id=:menu_id");
		$kontrol=$menusil->execute([
			'menu_id' => $_GET['menu_id']
		]);

		if($kontrol)
		{
			header("Location: ../production/menu.php?sil=ok");
		}
		else
		{
			header("Location: ../production/menu.php?sil=no");
		}
	}
// MENU SİLME İSLEMİ BİTİS


// MENU EKLEME İSLEMİ BASLANGIC
	if(isset($_POST['menukaydet']))
	{
		$menu_seourl = seo($_POST['menu_ad']);

		$menuekle=$db->prepare("INSERT INTO menu SET
			menu_ad=:menu_ad,
			menu_detay=:menu_detay,
			menu_url=:menu_url,
			menu_sira=:menu_sira,
			menu_seourl=:menu_seourl,
			menu_durum=:menu_durum
		");

		$kaydet=$menuekle->execute([
			'menu_ad' => $_POST['menu_ad'],
			'menu_detay' => $_POST['menu_detay'],
			'menu_url' => $_POST['menu_url'],
			'menu_sira' => $_POST['menu_sira'],
			'menu_seourl' => $menu_seourl,
			'menu_durum' => $_POST['menu_durum']
		]);

		if($kaydet)
		{
			header("Location: ../production/menu.php?durum=ok");
		}
		else
		{
			header("Location: ../production/menu.php?durum=no");
		}
	}
// MENU EKLEME İSLEMİ BITIS


// LOGO KAYDETME İSLEMİ BASLANGIC
	if(isset($_POST['logoduzenle']))
	{
		$uploads_dir = '../../dimg';

		$tmp_name = $_FILES['ayar_logo']["tmp_name"];
		$name = $_FILES['ayar_logo']["name"];

		$benzersizsayi4=rand(20000,32000);
		$refimgyol=substr($uploads_dir, 6) ."/". $benzersizsayi4.$name;

		move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

		$logokaydet=$db->prepare("UPDATE ayar SET
			ayar_logo=:ayar_logo
			WHERE ayar_id=0");

		$update=$logokaydet->execute([
			'ayar_logo' => $refimgyol
		]);

		if($update)
		{
			$resimsilunlink= $_POST['eski_yol']; //unlink eski resimi silmek icin kullanılır
			unlink("../../$resimsilunlink");

			header("Location: ../production/genel-ayar.php?durum=ok");
		}
		else
		{
			header("Location: ../production/genel-ayar.php?durum=no");
		}
	}
// LOGO KAYDETME İSLEMİ BITIS


// SLIDER KAYDETME İSLEMİ BASLANGIC
	if(isset($_POST['sliderkaydet']))
	{
		$uploads_dir = '../../dimg/slider';

		$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		$name = $_FILES['slider_resimyol']["name"];

		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);

		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

		move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


		$sliderkaydet=$db->prepare("INSERT INTO slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_link=:slider_link,
			slider_resimyol=:slider_resimyol,
			slider_durum=:slider_durum
		");

		$update=$sliderkaydet->execute([
			'slider_ad' => $_POST['slider_ad'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_link' => $_POST['slider_link'],
			'slider_resimyol' => $refimgyol,
			'slider_durum' => $_POST['slider_durum']
		]);

		if($update)
		{
			header("Location: ../production/slider.php?durum=ok");
		}
		else
		{
			header("Location: ../production/slider.php?durum=no");
		}
	}
// SLIDER KAYDETME İSLEMİ BITIS


// SLIDER RESIM DUZENLEME İSLEMİ BASLANGIC
	if(isset($_POST['slider_resim_duzenle']))
	{
		$slider_id = $_POST['slider_id'];

		$uploads_dir = '../../dimg/slider';

		$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		$name = $_FILES['slider_resimyol']["name"];

		$benzersizsayi1=rand(20000, 32000);
		$benzersizsayi2=rand(20000, 32000);
		$benzersizsayi3=rand(20000, 32000);
		$benzersizsayi4=rand(20000, 32000);

		$benzersizad = $benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol = substr($uploads_dir, 6)."/".$benzersizad.$name;

		move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$sliderresim = $db->prepare("UPDATE slider SET
			slider_resimyol=:slider_resimyol
			WHERE slider_id={$_POST['slider_id']} 
		");

		$update=$sliderresim->execute([
			'slider_resimyol' => $refimgyol
		]);	

		if($update)
		{
			$sliderresimsilunlink= $_POST['slidereskiresim_yol']; 
			unlink("../../$sliderresimsilunlink");

			header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		}
		else
		{
			header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
		}
	}	
// SLIDER RESİM DUZENLEME İSLEMİ BİTİS


// SLIDER DUZENLEME İSLEMİ BASLANGIC
	if(isset($_POST['slider_duzenle']))
	{
		$slider_id = $_POST['slider_id'];

		$sliderduzenle=$db->prepare("UPDATE slider SET
			slider_ad=:slider_ad,
			slider_sira=:slider_sira,
			slider_link=:slider_link,
			slider_durum=:slider_durum
			WHERE slider_id={$_POST['slider_id']}
		");

		$update=$sliderduzenle->execute([
			'slider_ad' => $_POST['slider_ad'],
			'slider_sira' => $_POST['slider_sira'],
			'slider_link' => $_POST['slider_link'],
			'slider_durum' => $_POST['slider_durum']
		]);

		if($update)
		{
			header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");
		}
		else
		{
			header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&durum=no");
		}
	}
// SLIDER DUZENLEME İSLEMİ BITIS


// SLIDER SİLME İSLEMİ BASLANGIC
	if($_GET['slidersil']=="ok")
	{
		$slidersil=$db->prepare("DELETE FROM slider WHERE slider_id=:slider_id");
		$delete=$slidersil->execute([
			'slider_id' => $_GET['slider_id']
		]);

		if($delete)
		{
			header("Location: ../production/slider.php?durum=ok");
		}
		else
		{
			header("Location: ../production/slider.php?durum=no");
		}
	}
// SLIDER SİLME İSLEMİ BASLANGIC


// KULLANICI KAYIT OLMA İŞLEMİ BAŞLANGIÇ
	if(isset($_POST['kullanicikaydet']))
	{
		// htmlspecialchars fonksiyonu postlardan gelen zararlı kodları temizliyor
		$kullanici_adsoyad = htmlspecialchars($_POST['kullanici_adsoyad']); 
		$kullanici_mail = htmlspecialchars($_POST['kullanici_mail']);

		$kullanici_passwordone = htmlspecialchars($_POST['kullanici_passwordone']);
		$kullanici_passwordtwo = htmlspecialchars($_POST['kullanici_passwordtwo']);

		if($kullanici_passwordone==$kullanici_passwordtwo)
		{
			if(strlen($kullanici_passwordone)>=6) // strlen fonksiyonunu kullanmadan büyük kücük sorgulaması yapılamaz!!
			{
				$kullanicikontrol=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:kullanici_mail");
				$kullanicikontrol->execute([
					'kullanici_mail'  => $kullanici_mail
				]);

				$say=$kullanicikontrol->rowCount();				

				if($say==0)
				{
					// artık tüm kontrollerden gectiği icin kullanıcı kayıt zamanı geldi

					$password=md5($kullanici_passwordone);
					$kullanici_yetki=1;

					//md5 fonksiyonu şifreyi md5 sifreli hale getirir

					$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
						kullanici_adsoyad=:kullanici_adsoyad,
						kullanici_mail=:kullanici_mail,
						kullanici_password=:kullanici_password,
						kullanici_yetki=:kullanici_yetki
					");

					$kaydet=$kullanicikaydet->execute([
						'kullanici_adsoyad' => $kullanici_adsoyad,
						'kullanici_mail' => $kullanici_mail,
						'kullanici_password' => $password,
						'kullanici_yetki' => $kullanici_yetki
					]);

					if($kaydet)
					{
						echo "kayıt basarili";
						header("Location: ../../index.php?durum=loginbasarili");
					}
					else
					{
						header("Location: ../../register.php?durum=basarisiz");
					}
				}
				else
				{
					header("Location: ../../register.php?durum=kullanicivar");
				}
			}
			else
			{
				header("Location: ../../register.php?durum=karakterhatasi");
				exit;
			}
		}
		else
		{
			header("Location: ../../register.php?durum=farklisifre");
			exit;
		}
	}
// KULLANICI KAYIT OLMA İŞLEMİ BITIS	


// USER KULLANICI GİRİS İSLEMİ BASLANGIC
	if(isset($_POST['kullanicigiris']))
	{
		$kullanici_mail=htmlspecialchars($_POST['kullanici_mail']);
		$kullanici_password=md5($_POST['kullanici_password']);

		$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE
			kullanici_mail=:kullanici_mail AND
			kullanici_yetki=:kullanici_yetki AND
			kullanici_password=:kullanici_password AND
			kullanici_durum=:kullanici_durum");

		$kullanicisor->execute([
			'kullanici_mail' => $kullanici_mail,
			'kullanici_yetki' => 1,
			'kullanici_password' => $kullanici_password,
			'kullanici_durum' => 1
		]);

		$say=$kullanicisor->rowCount();

		if($say==1)
		{
			echo $_SESSION['userkullanici_mail']=$kullanici_mail;
			header("Location: ../../");
			exit;
		}
		else
		{
			header("Location: ../../?durum=basarisizgiris");
		}
	}
// USER KULLANICI GİRİS İSLEMİ BASLANGIC


// USER KULLANICI BİLGİ DÜZENLEME İSLEMİ BASLANGIC
	if(isset($_POST['userkullaniciduzenle']))
	{
		$userkullanici_id=$_POST['userkullanici_id'];

		$userkullaniciduzenle=$db->prepare("UPDATE kullanici SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_gsm=:kullanici_gsm,
			kullanici_tc=:kullanici_tc,
			kullanici_adres=:kullanici_adres,
			kullanici_il=:kullanici_il,
			kullanici_ilce=:kullanici_ilce
			WHERE kullanici_id={$_POST['userkullanici_id']}
		");

		$duzenle=$userkullaniciduzenle->execute([
			'kullanici_adsoyad' => $_POST['userkullanici_adsoyad'],
			'kullanici_gsm' => $_POST['userkullanici_gsm'],
			'kullanici_tc' => $_POST['userkullanici_tc'],
			'kullanici_adres' => $_POST['userkullanici_adres'],
			'kullanici_il' => $_POST['userkullanici_il'],
			'kullanici_ilce' => $_POST['userkullanici_ilce']
		]);

		if($duzenle)
		{
			header("Location: ../../hesabim.php?kullanici_id=$userkullanici_id&durum=ok");
		}
		else
		{
			header("Location: ../../hesabim.php?kullanici_id=$userkullanici_id&durum=no");
		}
	}
// USER KULLANICI BİLGİ DÜZENLEME İSLEMİ BASLANGIC
 ?>



