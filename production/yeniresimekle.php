<?php 
  include 'header.php';
  $urun_id=$_GET['urun_id'];
  $urunsor=$db->prepare("SELECT * from urunler where urun_id=?");
  $urunsor->execute(array($urun_id));
  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);  
      
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
                <h3><?php echo $uruncek['urun_ad']; ?></h3>
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
                      

                      
                       <input type="hidden" name="urun_sira" value="<?php echo $uruncek['urun_sira']; ?>">
                       <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']; ?>">

                      

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="first-name" name="ekstra_resim" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Sıra<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" disabled="" name="urun_sira" required="required" value="<?php echo $uruncek['urun_sira']; ?>" class="form-control col-md-7 col-xs-12"  >
                        </div>
                      </div>


                      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <button name="yeniresimekle" type="submit" class="btn btn-success">Ekle</button>
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