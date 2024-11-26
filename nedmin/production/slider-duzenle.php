<?php
error_reporting(0); // hata gösterimini kapatmak icin kullanılır
include 'header.php'; 



$slidersor=$db->prepare("SELECT * FROM slider WHERE slider_id=:slider_id");
$slidersor->execute([
  'slider_id' => $_GET['slider_id'] 
]);
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Slider Düzenleme İşlemleri <small>
                      
                      <?php 

                      if($_GET['durum']=="ok")
                      {?>

                        <b style="color:green; font-size:15px;">İşlem Başarılı...</b>

                      <?php }

                      else if($_GET['durum']=="no")
                      {?>

                        <b style="color:red; font-size:15px;">İşlem Başarısız...</b>

                      <?php }

                      ?>
                      

                      

                    </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Slider<br><span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                          <?php 
                          if (strlen($slidercek['slider_resimyol'])>0) {?>

                          <img width="200"  src="../../<?php echo $slidercek['slider_resimyol']; ?>">

                          <?php } else {?>


                          <img width="200"  src="../../dimg/logo-yok.png">


                          <?php } ?>

                          
                        </div>
                      </div>

                       <input type="hidden" id="first-name" required="required" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <input type="hidden" name="slidereskiresim_yol" value="<?php echo $slidercek['slider_resimyol']; ?>">

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" name="slider_resim_duzenle" class="btn btn-primary">Güncelle</button>
                      </div>

                    </form>

                    <br>

                    <!-- / => en kök dizine çık -->
                    <form method="POST" action="../netting/islem.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                          <input type="hidden" id="first-name" required="required" name="slider_id" value="<?php echo $slidercek['slider_id']; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad Soyad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="slider_ad" value="<?php echo $slidercek['slider_ad']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="slider_sira" value="<?php echo $slidercek['slider_sira']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Link <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="slider_link" value="<?php echo $slidercek['slider_link']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="heard" name="slider_durum" required>

                            <option value="1" <?php echo $slidercek['slider_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo $slidercek['slider_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                          </select>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="slider_duzenle">Güncelle</button>
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>

<hr>
<hr>
<hr>
            

            

            


           
          </div>
        </div>
        <!-- /page content -->

       <?php include 'footer.php'; ?>