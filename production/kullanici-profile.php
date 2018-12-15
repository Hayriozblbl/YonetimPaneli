<?php 
  include 'header.php';

  
      
 ?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Kullanıcı Profili</h3>
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
                    <h2><?php echo $kullanicicek['admin_adsoyad']; ?><small>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Profil Resim<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200"  src="../../<?php echo $kullanicicek['kullanici_resim']; ?>">
                        </div>
                      </div>
                       <input type="hidden" name="admin_resim" value="<?php echo $kullanicicek['kullanici_resim']; ?>">
                       <input type="hidden" name="admin_id" value="<?php echo $kullanicicek['admin_id']; ?>">


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="admin_resim" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>



                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button name="kresimduzenle" type="submit" class="btn btn-primary">Güncelle</button>
                      </div>


                    </form>
                      <hr>
                      <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="admin_ad" required="required" disabled="" value="<?php echo $kullanicicek['admin_kadi']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Adı<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="admin_ad" required="required"  value="<?php echo $kullanicicek['admin_adsoyad']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                     <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kullanıcı Şifre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="first-name" name="admin_sifre" required="required"  value="<?php echo $kullanicicek['admin_sifre']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                       <input type="hidden" name="admin_id" value="<?php echo $kullanicicek['admin_id']; ?>">
                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button name="kprofilkaydet" type="submit" class="btn btn-primary">Güncelle</button>
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