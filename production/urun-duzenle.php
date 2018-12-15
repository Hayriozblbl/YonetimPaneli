<?php 
  include 'header.php';
  include '../netting/baglan.php';
  $urunsor=$db->prepare("select*from urunler where urun_id=:urun_id");
  $urunsor->execute(array('urun_id'=>$_GET['urun_id']));
  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
      
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
                    <h2>Ürün İslemleri 
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
                     <a href="urunler.php"><button class="btn btn-warning btn-xs"><i class="fa fa-undo" aria-hidden="true"></i>Geri Gön</button></a> 
                     <a href="yeniresimekle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button  class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i>Ekstra Resim</button>
                     </a>
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                      <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">
                      <input type="hidden" name="urun_resim" value="<?php echo $uruncek['urun_resim']; ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <img width="200" height="100" src="../../<?php echo $uruncek['urun_resim']; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="urun_resim" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="urun_ad" required="required" value="<?php echo $uruncek['urun_ad']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Detay<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          <textarea class="ckeditor" id="editor1" name="urun_detay" ><?php echo $uruncek['urun_detay']; ?></textarea>
                        </div>
                      </div>
                      <script type="text/javascript">
                        CKEDITOR.replace('editor1',
                        {
                          filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                          filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                          filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                          filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                          filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                          forcePasteAsPlainText:true


                        }
                        );

                      </script>

                     

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" name="urun_sira" value="<?php echo $uruncek['urun_sira'];?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          
                          <select id="heard" class="form-control" required="required" name="urun_durum">
                            
                                  <?php 
                                  if ($uruncek['urun_durum']==1) 
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
                          
                          <button name="urunduzenle" type="submit" class="btn btn-primary">Güncelle</button>
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