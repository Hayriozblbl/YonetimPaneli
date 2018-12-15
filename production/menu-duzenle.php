<?php 
  include 'header.php';
  include '../netting/baglan.php';
  $menusor=$db->prepare("SELECT * from menu where menu_id=:menu_id");
  $menusor->execute(array('menu_id'=>$_GET['menu_id']));
  $menucek=$menusor->fetch(PDO::FETCH_ASSOC);
      
 ?>
 <head>
        <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
        <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
 </head>

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
                    <h2>Menü Düzenle 
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
                     <a href="menu.php"><button class="btn btn-warning btn-xs"><i class="fa fa-undo" aria-hidden="true"></i>Geri Gön</button></a> 
                    </div>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST" >
                      
                      <input type="hidden" name="menu_id" value="<?php echo $menucek['menu_id']; ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Custom</label>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                          <select class="select2_single form-control" required="required" tabindex="-1" name="menu_ust">
                            <option></option>
                            <option value="0">Üst Menü</option>
                            <?php 
                              $menusor=$db->prepare("SELECT * from menu_ust=:menu_ust order by menu_ad asc");
                              $menusor->execute(array('menu_ust'=>0));

                              while ($menucek=$menusor->fetch(PDO::FETCH_ASSOC))
                               { ?>
                                <option value="<?php echo $menucek['menu_id']; ?>"><?php echo $menucek['menu_ad']; ?></option>
                              <?php }
                             ?>
                            
                            
                          </select>
                        </div>
                      </div>
                      

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Ad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_ad" required="required" value="<?php echo $menucek['menu_ad']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Detay<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          <textarea class="ckeditor" id="editor1" name="menu_detay" ><?php echo $menucek['menu_detay']; ?></textarea>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="first-name" name="menu_sira" value="<?php echo $menucek['menu_sira'];?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Url<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="menu_url" value="<?php echo $menucek['menu_url']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Menü Durum<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          
                          
                          <select id="heard" class="form-control" required="required" name="menu_durum">
                            
                                  <?php 
                                  if ($menucek['menu_durum']==1) 
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
                          
                          <button name="menuduzenle" type="submit" class="btn btn-primary">Güncelle</button>
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
        <script src="../vendors/select2/dist/js/select2.full.min.js"></script>
            <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->

        <?php include 'footer.php'; ?>