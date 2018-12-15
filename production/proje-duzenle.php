<?php 
  include 'header.php';
  include '../netting/baglan.php';
  $projesor=$db->prepare("select*from projeler where proje_id=:proje_id");
  $projesor->execute(array('proje_id'=>$_GET['proje_id']));
  $projecek=$projesor->fetch(PDO::FETCH_ASSOC);
      
 ?>
 <head><script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script></head>

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
                    <div align="left" class="col-md-6">
                    <h2>Proje İslemleri 
                      <small>
                        <?php

                    if ($_GET['durum']=="ok") { ?>


                    <p style="color:green;" class="page-subhead-line">İşlem Başarılı... </p>


                    <?php } elseif ($_GET['durum']=="no") { ?>


                    <p style="color:red;" class="page-subhead-line">İşlem Başarısız... </p>


                    <?php  } else {?>

                    <p class="page-subhead-line"></p>

                    <?php   }

                    ?>
                      </small>
                    </h2>

                     
                    </div>
                    <div class="col-md-6" align="right">
                     <a href="projeler.php"><button class="btn btn-warning btn-xs"><i class="fa fa-undo" aria-hidden="true"></i>Geri Gön</button></a> 
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id']; ?>">
                      <input type="hidden" name="proje_resim" value="<?php echo $projecek['proje_resim']; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200" height="100" src="../../assets/img/projeler/kucukfoto/<?php echo $projecek['proje_resim']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="proje_resim" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proje Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="proje_ad" required="required" value="<?php echo $projecek['proje_ad']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proje Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" name="proje_sira" value="<?php echo $projecek['proje_sira'];?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Proje Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          
                          <select id="heard" class="form-control" required="required" name="proje_durum">
                            
                                  <?php 
                                  if ($projecek['proje_durum']==1) 
                                    { ?>
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                 <?php  } 
                                 else
                                 { ?>

                                    <option value="0">Pasif</option>
                                    <option value="1">Aktif</option>

                                 <?php  } 

                                   ?>

                            
                          </select>
                        </div>
                      </div>

                       <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button name="projeduzenle" type="submit" class="btn btn-primary">Güncelle</button>
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