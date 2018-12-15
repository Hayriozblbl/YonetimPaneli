<?php 
  include 'header.php';
  include '../netting/baglan.php';
  $ayarsor=$db->prepare("SELECT*from ayarlar where ayar_id=?");
  $ayarsor->execute(array(0));
  $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
      
 ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ayarlar</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Anahtar Kelimeniz">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Ara</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Genel Ayarlar <small>
                    <?php 
                      if ($_GET['durum']=='ok') 
                      { ?>
                       <p style="color:green;">İşlem Basarıyla Güncellendi...</p>
                      <?php }
                      elseif($_GET['durum']=='no')
                      { ?>
                       <p style="color:red;">"İşlem Başarısız Oldu...</p>
                      <?php }
                      else
                      {
                        echo "";
                      }

                     ?>
                    </small></h2>

                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                     <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Logo<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200"  src="../../<?php echo $ayarcek['ayar_logo']; ?>">
                        </div>
                      </div>
                       <input type="hidden" name="logo_resimyol" value="<?php echo $ayarcek['ayar_logo']; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="ayar_logo" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>



                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button name="logoduzenle" type="submit" class="btn btn-primary">Güncelle</button>
                      </div>


                    </form>
                      <hr>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_siteurl" required="required" value="<?php echo $ayarcek['ayar_siteurl']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Başlığı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_title" required="required" value="<?php echo $ayarcek['ayar_title']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Açıklaması<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_description" required="required" value="<?php echo $ayarcek['ayar_description']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Keywords<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_keywords" required="required" value="<?php echo $ayarcek['ayar_keywords']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Site Yazarı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="ayar_author" required="required" value="<?php echo $ayarcek['ayar_author']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-danger">İptal</button>
                          <button name="genelayarkaydet" type="submit" class="btn btn-primary">Güncelle</button>
                      </div>


                    </form>


                    
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php'; ?>