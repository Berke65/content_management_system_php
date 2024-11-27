	<?php include 'header.php'; 
	error_reporting(0);
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
							<div class="bigtitle">Kayıt Sayfası</div>
							<div class="bread">Kayıt Olmak İçin Aşağıdaki Formu Takip Edin :)</div>
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

					if($_GET['durum']=="farklisifre") { ?>

						<div class="alert alert-danger">
								<strong>Hata! </strong>Girdiğiniz şifreler eşleşmiyor.
						</div>

					<?php  } elseif($_GET['durum']=="karakterhatasi") {?>
							
						<div class="alert alert-danger">
								<strong>Hata! </strong>Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
						</div>

					<?php } elseif($_GET['durum']=="kullanicivar") { ?>

						<div class="alert alert-danger">
								<strong>Hata! </strong>Bu kullanıcı zaten kayıtlı.
						</div>

					<?php } elseif($_GET['durum']=="basarisiz") { ?>

						<div class="alert alert-danger">
								<strong>Hata! </strong>Kayıt yaparken beklenmedik bir hata ile karşılaşıldı lütfen sistem yöneticisine danışınız.
						</div>

					<?php } ?>




					<div class="form-group dob">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kullanici_adsoyad" required id="name" placeholder="Lütfen Ad ve Soyadınızı Giriniz...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="email" class="form-control" name="kullanici_mail" required id="email" placeholder="Dikkat Mail adresiniz aynı zamanda kullanıcı adınız olacaktır!">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="text" class="form-control" name="kullanici_passwordone" required id="phone" placeholder="Şifrenizi Giriniz...">
						</div>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="kullanici_passwordtwo" required id="fax" placeholder="Şifrenizi Tekrar Giriniz...">
						</div>
						<br><br><br>
							<div class="col-sm-6">
								<button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Kayıt Ol</button>
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