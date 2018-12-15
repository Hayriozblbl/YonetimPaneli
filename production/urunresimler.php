<?php include 'header.php'; 
include '../netting/baglan.php';

  $ekstrasor=$db->prepare("SELECT*from ekstralar  order by ekstra_sira asc limit 25");
  $ekstrasor->execute();
  $say=$ekstrasor->rowCount();

?>

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Ürün Resimleri</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                  
                  <form action="" method="POST">
                  <div class="input-group">
                    
                    <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelimeyi Giriniz...">
                    
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit" name="arama">Ara!</button>
                    </span>
                  </div>
                  </form>

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
                    <h2>Resim İşlemleri<br><small style="color: purple;"><?php echo $say." Kayıt"; echo " Getirildi..."; ?></small>
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
                   
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            
                            <th class="text-center">Resim</th>
                            <th class="text-center">Ürün Sıra </th>
                            <th width="80" class="text-center"></th>
                            
                            </th>
                            
                          </tr>
                        </thead>

                        <tbody>

                          <?php 


                            while ($ekstracek=$ekstrasor->fetch(PDO::FETCH_ASSOC)) 
                              { ?>
                                
                                <tr class="odd pointer">
                                  <td class="text-center"><img style="width: 150px; height: 100px;" src="../../assets/img/urunler/ekstralar/kucukfoto/<?php echo $ekstracek['ekstra_yol']; ?>"> </td>
                                  <td class="text-center"><?php echo $ekstracek['ekstra_sira']; ?></td>

                                  <td class="text-center"><a href="../netting/islem.php?ekstra_id=<?php echo $ekstracek['ekstra_id']; ?>&ekstrasil=ok&ekstraresimsil=<?php echo $ekstracek['ekstra_yol']; ?>"><button style="width: 80px;" class="btn btn-danger btn-xs"><i class="fa fa-trash" ariahidden="true"></i>Sil</button></a></td>
                                </tr>
                           <?php }
                           ?>
                          
                          
                          
                        </tbody>
                      </table>
                    </div>
                    
                  </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <?php include 'footer.php'; ?>