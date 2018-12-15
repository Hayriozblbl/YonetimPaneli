<?php 
  include 'header.php';
  include '../netting/baglan.php';
  $hakkimizdasor=$db->prepare("SELECT*from hakkimizda where hakkimizda_id=?");
  $hakkimizdasor->execute(array(0));
  $hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);
      
 ?>
 <head>
   
   <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
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
                    <h2>Hakkımızda Sayfa Düzenleme<small>
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

                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="../netting/islem.php" method="POST">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Başlık<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="hakkimizda_baslik" required="required" value="<?php echo $hakkimizdacek['hakkimizda_baslik']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hakkımızda<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          <textarea class="ckeditor" id="editor1" name="hakkimizda_icerik" ><?php echo $hakkimizdacek['hakkimizda_icerik']; ?></textarea>
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Misyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          <textarea class="ckeditor" id="editor2" name="hakkimizda_misyon" ><?php echo $hakkimizdacek['hakkimizda_misyon']; ?></textarea>
                        </div>
                      </div>
                      <script type="text/javascript">
                        CKEDITOR.replace('editor2',
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Vizyon<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          

                          <textarea class="ckeditor" id="editor3" name="hakkimizda_vizyon" ><?php echo $hakkimizdacek['hakkimizda_vizyon']; ?></textarea>
                        </div>
                      </div>
                      <script type="text/javascript">
                        CKEDITOR.replace('editor3',
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
                      

                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-danger">İptal</button>
                          <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Güncelle</button>
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