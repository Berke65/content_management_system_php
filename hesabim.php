	<?php include 'header.php'; 
	error_reporting(0);

	ob_start();
	session_start();

	$userkullanicisor=$db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:kullanici_mail");
	$kullanicisor->execute([
		'kullanici_mail' => $_SESSION['userkullanici_mail']
	]);
	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

	?>


	<div class="container">
		<div class="clearfix"></div>
		<div class="lines"></div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">Hesap Bilgilerim</div>
							<div class="bread">Bilgilerinizi aşağıdaki formdan düzenleyebilirsiniz</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		
		<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kayıt Bilgileri </div>
					</div>

					<?php 

					if($_GET['durum']=="ok") { ?>

						<div class="alert alert-success">
								İşlem<strong> Başarılı.</strong>
						</div>

					<?php  } elseif($_GET['durum']=="no") {?>
							
						<div class="alert alert-danger">
								<strong>Hata! </strong>Beklenmedik bir hata oluştu. Lütfen sistem yöneticisiyle görüşün.
						</div>

					<?php } ?>


					

					<input type="hidden" class="form-control" name="userkullanici_id" required id="name" value="<?php echo $kullanicicek['kullanici_id']; ?>">

					<div class="form-group dob">
						<div class="col-sm-12">
							<label for="name">Ad Soyad:</label>
							<input type="text" class="form-control" name="userkullanici_adsoyad" required id="name" value="<?php echo $kullanicicek['kullanici_adsoyad']; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">Email:</label>
							<input type="email" class="form-control" disabled name="userkullanici_mail" id="email" value="<?php echo $kullanicicek['kullanici_mail'] ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">Telefon:</label>
							<input type="text" class="form-control" name="userkullanici_gsm" required id="email" value="<?php echo $kullanicicek['kullanici_gsm'] ?>" placeholder="Telefon Bilgisi Giriniz">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">Tc:</label>
							<input type="text" class="form-control"  name="userkullanici_tc" required id="email" value="<?php echo $kullanicicek['kullanici_tc'] ?>" placeholder="Tc Bilgisi Giriniz">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">Adres:</label>
							<input type="text" class="form-control"  name="userkullanici_adres" required id="email" value="<?php echo $kullanicicek['kullanici_adres'] ?>" placeholder="Adres Bilgisi Giriniz">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">İl:</label>
							<input type="text" class="form-control"  name="userkullanici_il" required id="email" value="<?php echo $kullanicicek['kullanici_il'] ?>" placeholder="İl Bilgisi Giriniz">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<label for="email">İlçe:</label>
							<input type="text" class="form-control"  name="userkullanici_ilce" required id="email" value="<?php echo $kullanicicek['kullanici_ilce'] ?>" placeholder="İlçe Bilgisi Giriniz">
						</div>
					</div>
					<div class="form-group dob">
							<div class="col-sm-6">
								<button type="submit" name="userkullaniciduzenle" class="btn btn-default btn-red">Bilgilerimi Güncelle</button>
							</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Şifrenizi Mi Unuttunuz?</div>
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'; ?>