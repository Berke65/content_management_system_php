<?php
error_reporting(0); // hata gösterimini kapatmak icin kullanılır
include 'header.php'; 



$menusor=$db->prepare("SELECT * FROM menu WHERE menu_id=:menu_id");
$menusor->execute([
  'menu_id' => $_GET['menu_id'] 
]);
$menucek=$menusor->fetch(PDO::FETCH_ASSOC);

?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Menü Düzenleme İşlemleri <small>
                      
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
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />

                    <!-- / => en kök dizine çık -->
                    <form method="POST" action="../netting/islem.php" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                     
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sayfa Linki <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="" id="first-name" name="kullanici_tc" disabled="" value="<?php echo $ayarcek['ayar_url'] ?>/sayfa-<?php echo seo($menucek['menu_ad']) ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                        <!-- id alma islemi -->  <input type="hidden" id="first-name" required="required" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_ad" value="<?php echo $menucek['menu_ad']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                     <!-- Ck Editör Başlangıç -->

                                  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="editor1" name="menu_detay"><?php echo $menucek['menu_detay']; ?></textarea>
                        </div>
                    </div>

                    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
                    <script type="text/javascript">
                        ClassicEditor
                            .create(document.querySelector('#editor1'), {
                                ckfinder: {
                                    uploadUrl: '/path/to/your/upload/handler'
                                }
                            })
                            .catch(error => {
                                console.error(error);
                            });
                    </script>

            <!-- Ck Editör Bitiş -->

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_url" value="<?php echo $menucek['menu_url']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" name="menu_sira" value="<?php echo $menucek['menu_sira']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="heard" name="menu_durum" required>

                            <option value="1" <?php echo $menucek['menu_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo $menucek['menu_durum'] == '0' ? 'selected=""' : ''; ?>>Pasif</option>

                          </select>
                        </div>
                      </div>
                                   
                      <div class="form-group">
                        <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success" name="menu_duzenle">Güncelle</button>
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