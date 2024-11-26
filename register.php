	<?php include 'header.php'; ?>


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
						<div class="title">Personal Details</div>
					</div>
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