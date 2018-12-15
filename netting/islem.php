<?php 
	
	
	ob_start();
	session_start();
	include 'baglan.php';


	if (isset($_POST['loggin'])) 
	{
		$kullanici_ad=$_POST['kullanici_ad'];
		$kullanici_password=md5($_POST['kullanici_password']);

		
		
		if ($kullanici_ad && $kullanici_password) 
		{
			$kullanicisor=$db->prepare("SELECT*from admin where admin_kadi=:kadi and admin_sifre=:sifre ");
  			$kullanicisor->execute(array(
  				'kadi'=>$kullanici_ad,
  				'sifre'=>$kullanici_password
  		));

  			 $say=$kullanicisor->rowCount();

  			

  			if ($say>0) 
  			{
  				$_SESSION['admin_kadi']=$kullanici_ad;

  				header('Location:../production/index.php?login=ok');
  			}
  			else
  			{
  				header('Location:../production/login.php?durum=no');
  			}
		}
	}


	if (isset($_POST['genelayarkaydet'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE ayarlar set 
			ayar_siteurl=:url, 
			ayar_title=:title, 
			ayar_description=:description,
			ayar_keywords=:keywords,
			ayar_author=:yazar
			where ayar_id=0");

		$update=$ayarkaydet->execute(array(
		'url'=> $_POST['ayar_siteurl'],
		'title'=> $_POST['ayar_title'],
		'description'=>$_POST['ayar_description'],
		'keywords'=>$_POST['ayar_keywords'],
		'yazar'=>$_POST['ayar_author']
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/genel-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/genel-ayar.php?durum=no");
		}
	}

	if (isset($_POST['iletisimayarkaydet'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE ayarlar set 
			ayar_tel=:tel, 
			ayar_gsm=:gsm, 
			ayar_faks=:faks,
			ayar_mail=:mail,
			ayar_adres=:adres,
			ayar_ilce=:ilce,
			ayar_il=:il,
			ayar_mesai=:mesai
			where ayar_id=0");

		$update=$ayarkaydet->execute(array(
		'tel'=> $_POST['ayar_tel'],
		'gsm'=> $_POST['ayar_gsm'],
		'faks'=>$_POST['ayar_faks'],
		'mail'=>$_POST['ayar_mail'],
		'adres'=>$_POST['ayar_adres'],
		'ilce'=>$_POST['ayar_ilce'],
		'il'=>$_POST['ayar_il'],
		'mesai'=>$_POST['ayar_mesai']
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/iletisim-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/iletisim-ayar.php?durum=no");
		}
	}

	if (isset($_POST['apiayarkaydet'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE ayarlar set 
			ayar_recapctha=:recap, 
			ayar_googlemap=:googlemap, 
			ayar_analiz=:analiz
			
			where ayar_id=0");

		$update=$ayarkaydet->execute(array(
		'recap'=> $_POST['ayar_recapctha'],
		'googlemap'=> $_POST['ayar_googlemap'],
		'analiz'=>$_POST['ayar_analiz']
		
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/api-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/api-ayar.php?durum=no");
		}
	}

	if (isset($_POST['sosyalayarkaydet'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE ayarlar set 
			ayar_facebook=:facebook, 
			ayar_twitter=:twitter 
			where ayar_id=0");

		$update=$ayarkaydet->execute(array(
		'facebook'=> $_POST['ayar_facebook'],
		'twitter'=> $_POST['ayar_twitter']
		
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/sosyal-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/sosyal-ayar.php?durum=no");
		}
	}

	if (isset($_POST['mailayarkaydet'])) 
	{
		$ayarkaydet=$db->prepare("UPDATE ayarlar set 
			ayar_smtphost=:host, 
			ayar_smtpuser=:user, 
			ayar_smtppassword=:sifre,
			ayar_smtpport=:port
			where ayar_id=0");

		$update=$ayarkaydet->execute(array(
		'host'=> $_POST['ayar_smtphost'],
		'user'=> $_POST['ayar_smtpuser'],
		'sifre'=>$_POST['ayar_smtppassword'],
		'port'=>$_POST['ayar_smtpport']
		
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/mail-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/mail-ayar.php?durum=no");
		}
	}

	if (isset($_POST['hakkimizdakaydet'])) 
	{

	


		$ayarkaydet=$db->prepare("UPDATE hakkimizda set 
			hakkimizda_baslik=:baslik, 
			hakkimizda_icerik=:icerik,
			hakkimizda_misyon=:misyon,
			hakkimizda_vizyon=:vizyon
			where hakkimizda_id=0");

		$update=$ayarkaydet->execute(array(
		'baslik'=> $_POST['hakkimizda_baslik'],
		'icerik'=> $_POST['hakkimizda_icerik'],
		'misyon'=>$_POST['hakkimizda_misyon'],
		'vizyon'=>$_POST['hakkimizda_vizyon']
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/hakkimizda.php?durum=ok");
		}
		else
		{
			header("Location:../production/hakkimizda.php?durum=no");
		}
	}


	if (isset($_POST['sliderkaydet'])) 
	{

	$resim_kaynagi = $_FILES["slider_resimyol"]["tmp_name"];
	$resim_ismi = $_FILES["slider_resimyol"]["name"];
	$resim_turu = $_FILES["slider_resimyol"]["type"];
	$resim_boyutu = $_FILES["slider_resimyol"]["size"];

	//resim ismini değiştiriyoruz çünkü aynı isimle başka bir dosya yüklenebilir.Bu durumda eski dosyamızı kaybederiz.

	$resim_uzantisi = substr($resim_ismi, -4);
	$rasgeleisim = substr(md5(uniqid(rand())), 0, 12);
	$resim_yeniismi = $rasgeleisim.$resim_uzantisi ;

	//gonderdiğimiz dosyanın bilgilerini ekrana yazıyoruz

	

	//dosyayı daha once sunucuda manuel olarak olusturduğumuz gonderilen_resimler adlı klasöre  gönderiyoruz.

	$dosya_hedef = "../../assets/img/slider";
	$dosya_yukle = move_uploaded_file($resim_kaynagi, $dosya_hedef.'/'.$resim_yeniismi);

	//Yüklediğimiz resmin küçük halini oluşturoruz.

	$kucuk_resim = imagecreatefromjpeg($dosya_hedef.'/'.$resim_yeniismi);
	$boyut = getimagesize($dosya_hedef.'/'.$resim_yeniismi);
	$yenien="1920";

	$yeniyukseklik = "650";

	$yeniresim = imagecreatetruecolor($yenien,$yeniyukseklik);
	imagecopyresampled($yeniresim, $kucuk_resim, 0, 0, 0, 0, $yenien, $yeniyukseklik, $boyut[0], $boyut[1]);
	$hedefdosya = $dosya_hedef."/".$rasgeleisim."_kucuk".$resim_uzantisi;

	imagejpeg($yeniresim,$hedefdosya,100);
	$dosya_yukle2 = move_uploaded_file($resim_kaynagi, $hedefdosya);
	$kucuk_yeniisim = $rasgeleisim."_kucuk".$resim_uzantisi ;

		$kaydet=$db->prepare("INSERT into slider set 
			
			slider_ad=:ad, 
			slider_link=:link, 
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol
			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['slider_ad'],
		'link'=> $_POST['slider_link'],
		'sira'=>$_POST['slider_sira'],
		'durum'=>$_POST['slider_durum'],
		'resimyol'=>$kucuk_yeniisim
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/slider-ekle.php?durum=ok");
		}
		else
		{
			header("Location:../production/slider-ekle.php?durum=no");
		}
	}

	if (($_GET['slidersil']=="ok")) 
	{
		$slidersil=$db->prepare("DELETE from slider where slider_id=:id");

		$sil=$slidersil->execute(array('id'=>$_GET['slider_id']));

		if ($sil) 
		{
			$resimsil=$_GET['sliderresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/slider.php?durum=ok");
		}
		else
		{
			header("Location:../production/slider.php?durum=no");
		}
	}

	if (isset($_POST['sliderduzenle'])) 
	{
		$kontrol=$_POST['slider_id'];

		

		if ($_FILES['slider_resimyol']["size"]>0) 
		{
			
			$resim_kaynagi = $_FILES["slider_resimyol"]["tmp_name"];
			$resim_ismi = $_FILES["slider_resimyol"]["name"];
			$resim_turu = $_FILES["slider_resimyol"]["type"];
			$resim_boyutu = $_FILES["slider_resimyol"]["size"];

			//resim ismini değiştiriyoruz çünkü aynı isimle başka bir dosya yüklenebilir.Bu durumda eski dosyamızı kaybederiz.

			$resim_uzantisi = substr($resim_ismi, -4);
			$rasgeleisim = substr(md5(uniqid(rand())), 0, 12);
			$resim_yeniismi = $rasgeleisim.$resim_uzantisi ;

			//gonderdiğimiz dosyanın bilgilerini ekrana yazıyoruz

			

			//dosyayı daha once sunucuda manuel olarak olusturduğumuz gonderilen_resimler adlı klasöre  gönderiyoruz.

			$dosya_hedef = "../../assets/img/slider";
			$dosya_yukle = move_uploaded_file($resim_kaynagi, $dosya_hedef.'/'.$resim_yeniismi);

			//Yüklediğimiz resmin küçük halini oluşturoruz.

			$kucuk_resim = imagecreatefromjpeg($dosya_hedef.'/'.$resim_yeniismi);
			$boyut = getimagesize($dosya_hedef.'/'.$resim_yeniismi);
			$yenien="1920";

			$yeniyukseklik = "650";

			$yeniresim = imagecreatetruecolor($yenien,$yeniyukseklik);
			imagecopyresampled($yeniresim, $kucuk_resim, 0, 0, 0, 0, $yenien, $yeniyukseklik, $boyut[0], $boyut[1]);
			$hedefdosya = $dosya_hedef."/".$rasgeleisim."_kucuk".$resim_uzantisi;

			imagejpeg($yeniresim,$hedefdosya,100);
			$dosya_yukle2 = move_uploaded_file($resim_kaynagi, $hedefdosya);
			$kucuk_yeniisim = $rasgeleisim."_kucuk".$resim_uzantisi ;

			$duzenle=$db->prepare("UPDATE slider set 
			slider_ad=:ad, 
			slider_link=:link, 
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol
			where slider_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['slider_ad'],
			'link'=> $_POST['slider_link'],
			'sira'=>$_POST['slider_sira'],
			'durum'=>$_POST['slider_durum'],
			'resimyol'=>$kucuk_yeniisim
		
		));


		if ($update) 
		{

			$yoket=$_POST['slider_resimyol'];
			unlink("../../$yoket");
			header("Location:../production/slider.php?$slider_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/slider.php?$slider_id=$kontrol&durum=no");
		}
		}

		else
		{

		$duzenle=$db->prepare("UPDATE slider set 
			slider_ad=:ad, 
			slider_link=:link, 
			slider_sira=:sira,
			slider_durum=:durum
			where slider_id=$kontrol");

		$update=$duzenle->execute(array(
		'ad'=> $_POST['slider_ad'],
		'link'=> $_POST['slider_link'],
		'sira'=>$_POST['slider_sira'],
		'durum'=>$_POST['slider_durum']
		
		));
		if ($update) 
		{
			header("Location:../production/slider.php?$slider_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/slider.php?$slider_id=$kontrol&durum=no");
		}

		
		}
		
	}


	if (isset($_POST['icerikkaydet'])) 
	{

	$zaman=date('Y-m-d H+3:i');

	$uploads_dir = '../../assets/img/haber';

	@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];

	@$name = $_FILES['icerik_resimyol']["name"];

	$benzersizsayi1=rand(20000,32000);

	$benzersizsayi2=rand(20000,32000);

	$benzersizsayi3=rand(20000,32000);

	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kaydet=$db->prepare("INSERT into icerik set 
			
			
			icerik_ad=:ad, 
			icerik_detay=:detay, 
			icerik_keyword=:keyword,
			icerik_sira=:sira,
			icerik_durum=:durum,
			icerik_zaman=:zaman,
			icerik_resimyol=:resimyol

			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['icerik_ad'],
		'detay'=> $_POST['icerik_detay'],
		'keyword'=>$_POST['icerik_keyword'],
		'sira'=>$_POST['icerik_sira'],
		'durum'=>$_POST['icerik_durum'],
		'zaman'=>$zaman,
		'resimyol'=>$refimgyol
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/icerik-ekle.php?durum=ok");
		}
		else
		{
			header("Location:../production/icerik-ekle.php?durum=no");
		}
	}

	if (($_GET['iceriksil']=="ok")) 
	{
		$iceriksil=$db->prepare("DELETE from icerik where icerik_id=:id");

		$sil=$iceriksil->execute(array('id'=>$_GET['icerik_id']));

		if ($sil) 
		{
			$resimsil=$_GET['icerikresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/icerik.php?durum=ok");
		}
		else
		{
			header("Location:../production/icerik.php?durum=no");
		}
	}


	if (isset($_POST['icerikduzenle'])) 
	{
		$kontrol=$_POST['icerik_id'];
		$zaman=date("Y-m-d H:i");
		

		if ($_FILES['icerik_resimyol']["size"]>0) 
		{
			
			$uploads_dir = '../../assets/img/haber';

			@$tmp_name = $_FILES['icerik_resimyol']["tmp_name"];

			@$name = $_FILES['icerik_resimyol']["name"];

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

			$duzenle=$db->prepare("UPDATE icerik set 
			icerik_ad=:ad, 
			icerik_detay=:detay,
			icerik_sira=:sira,
			icerik_durum=:durum,
			icerik_resimyol=:resimyol,
			icerik_zaman=:zaman
			where icerik_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['icerik_ad'],
			'detay'=> $_POST['icerik_detay'],
			'sira'=>$_POST['icerik_sira'],
			'durum'=>$_POST['icerik_durum'],
			'resimyol'=>$refimgyol,
			'zaman'=>$zaman
		
		));


		if ($update) 
		{

			$yoket=$_POST['icerik_resimyol'];
			unlink("../../$yoket");
			header("Location:../production/icerik.php?$icerik_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/icerik.php?$icerik_id=$kontrol&durum=no");
		}
		}

		else
		{

		
			$duzenle=$db->prepare("UPDATE icerik set 
			icerik_ad=:ad, 
			icerik_detay=:detay,
			icerik_sira=:sira,
			icerik_durum=:durum,
			
			icerik_zaman=:zaman
			where icerik_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['icerik_ad'],
			'detay'=> $_POST['icerik_detay'],
			'sira'=>$_POST['icerik_sira'],
			'durum'=>$_POST['icerik_durum'],
			
			'zaman'=>$zaman
		
		));
		if ($update) 
		{
			header("Location:../production/icerik.php?$icerik_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/icerik.php?$icerik_id=$kontrol&durum=no");
		}

		
		}
		
	}


	if (isset($_POST['menukaydet'])) 
	{

	

		$kaydet=$db->prepare("INSERT into menu set 
			
			
			menu_ad=:ad, 
			menu_detay=:detay, 
			menu_ust=:ust,
			menu_url=:url,
			menu_durum=:durum,
			menu_sira=:sira
			

			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['menu_ad'],
		'detay'=> $_POST['menu_detay'],
		'ust'=>$_POST['menu_ust'],
		'url'=>$_POST['menu_url'],
		'durum'=>$_POST['menu_durum'],
		'sira'=>$_POST['menu_sira']
		
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/menu.php?durum=ok");
		}
		else
		{
			header("Location:../production/menu.php?durum=no");
		}
	}

	if (isset($_POST['menuduzenle'])) 
	{

	
		$kontrol=$_POST['menu_id'];

		$duzenle=$db->prepare("UPDATE menu set 
			menu_ad=:ad, 
			menu_detay=:detay, 
			menu_ust=:ust,
			menu_url=:url,
			menu_durum=:durum,
			menu_sira=:sira
			where menu_id=$kontrol");

		$update=$duzenle->execute(array(
		'ad'=> $_POST['menu_ad'],
		'detay'=> $_POST['menu_detay'],
		'ust'=>$_POST['menu_ust'],
		'url'=>$_POST['menu_url'],
		'durum'=>$_POST['menu_durum'],
		'sira'=>$_POST['menu_sira']
		));

		if ($update) 
		{
			header("Location:../production/menu-duzenle.php?$menu_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/menu-duzenle.php?$menu_id=$kontrol&durum=no");
		}
	}

	if (($_GET['menusil']=="ok")) 
	{
		$iceriksil=$db->prepare("DELETE from menu where menu_id=:id");

		$sil=$iceriksil->execute(array('id'=>$_GET['menu_id']));

		if ($sil) 
		{
			
			header("Location:../production/menu.php?durum=ok");
		}
		else
		{
			header("Location:../production/menu.php?durum=no");
		}
	}






	if (isset($_POST['logoduzenle'])) 
	{

		
			$uploads_dir = '../../dimg';

			@$tmp_name = $_FILES['ayar_logo']["tmp_name"];

			@$name = $_FILES['ayar_logo']["name"];

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

			$duzenle=$db->prepare("UPDATE ayarlar set 
			ayar_logo=:logo
			
			where ayar_id=0");

			$update=$duzenle->execute(array(
			
			
			'logo'=>$refimgyol
		
		));

			
		if ($update) 
		{

			$yoket=$_POST['logo_resimyol'];
			unlink("../../$yoket");
			header("Location:../production/genel-ayar.php?durum=ok");
		}
		else
		{
			header("Location:../production/genel-ayar.php?durum=no");
		}
		
		
	}


	if (isset($_POST['kresimduzenle'])) 
	{

		
			$uploads_dir = '../../dimg/kullanici';

			@$tmp_name = $_FILES['admin_resim']["tmp_name"];

			@$name = $_FILES['admin_resim']["name"];

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

			$duzenle=$db->prepare("UPDATE admin set 
			kullanici_resim=:kresim
			
			where admin_id={$_POST['admin_id']}");

			$update=$duzenle->execute(array(
			
			
			'kresim'=>$refimgyol
		
		));

			
		if ($update) 
		{

			$yoket=$_POST['admin_resim'];
			unlink("../../$yoket");
			header("Location:../production/kullanici-profile.php?durum=ok");
		}
		else
		{
			header("Location:../production/kullanici-profile.php?durum=no");
		}
		
		
	}

	if (isset($_POST['kprofilkaydet'])) 
	{

		$kullanicisifre=md5($_POST['admin_sifre']);
		$ayarkaydet=$db->prepare("UPDATE admin set 
			admin_adsoyad=:adsoyad, 
			admin_sifre=:sifre
			where admin_id={$_POST['admin_id']}");

		$update=$ayarkaydet->execute(array(
		'adsoyad'=> $_POST['admin_ad'],
		'sifre'=> $kullanicisifre
		));

		if ($ayarkaydet) 
		{
			header("Location:../production/kullanici-profile.php?durum=ok");
		}
		else
		{
			header("Location:../production/kullanici-profile.php?durum=no");
		}
	}

	if (isset($_POST['urunkaydet'])) 
	{

	

	$uploads_dir = '../../assets/img/urunler';

	@$tmp_name = $_FILES['urun_resim']["tmp_name"];

	@$name = $_FILES['urun_resim']["name"];

	$benzersizsayi1=rand(20000,32000);

	$benzersizsayi2=rand(20000,32000);

	$benzersizsayi3=rand(20000,32000);

	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kaydet=$db->prepare("INSERT into urunler set 
			
			
			urun_ad=:ad, 
			urun_detay=:detay, 
			urun_keywords=:keyword,
			urun_sira=:sira,
			urun_durum=:durum,
			urun_resim=:resimyol

			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['urun_ad'],
		'detay'=> $_POST['urun_detay'],
		'keyword'=>$_POST['urun_keywords'],
		'sira'=>$_POST['urun_sira'],
		'durum'=>$_POST['urun_durum'],
		'resimyol'=>$refimgyol
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/urunler.php?durum=ok");
		}
		else
		{
			header("Location:../production/urunler.php?durum=no");
		}
	}

	if (isset($_POST['urunduzenle'])) 
	{
		$kontrol=$_POST['urun_id'];
		
		

		if ($_FILES['urun_resim']["size"]>0) 
		{
			

			


			$uploads_dir = '../../assets/img/urunler';

			@$tmp_name = $_FILES['urun_resim']["tmp_name"];

			@$name = $_FILES['urun_resim']["name"];

			

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
			


			$duzenle=$db->prepare("UPDATE urunler set 
			urun_ad=:ad, 
			urun_detay=:detay, 
			urun_keywords=:keyword,
			urun_sira=:sira,
			urun_durum=:durum,
			urun_resim=:resimyol
			where urun_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['urun_ad'],
			'detay'=> $_POST['urun_detay'],
			'keyword'=>$_POST['urun_keywords'],
			'sira'=>$_POST['urun_sira'],
			'durum'=>$_POST['urun_durum'],
			'resimyol'=>$refimgyol
		
		));


		if ($update) 
		{

			$yoket=$_POST['urun_resim'];
			unlink("../../$yoket");
			header("Location:../production/urunler.php?$urun_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/urunler.php?$urun_id=$kontrol&durum=no");
		}
		}

		else
		{

		
			$duzenle=$db->prepare("UPDATE urunler set 
			urun_ad=:ad, 
			urun_detay=:detay, 
			urun_keywords=:keyword,
			urun_sira=:sira,
			urun_durum=:durum
			where urun_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['urun_ad'],
			'detay'=> $_POST['urun_detay'],
			'keyword'=>$_POST['urun_keywords'],
			'sira'=>$_POST['urun_sira'],
			'durum'=>$_POST['urun_durum']
		
		));
		if ($update) 
		{
			header("Location:../production/urunler.php?$urun_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/urunler.php?$urun_id=$kontrol&durum=no");
		}

		
		}
		
	}

	if (($_GET['urunsil']=="ok")) 
	{
		$urunsil=$db->prepare("DELETE from urunler where urun_id=:id");

		$sil=$urunsil->execute(array('id'=>$_GET['urun_id']));

		if ($sil) 
		{
			$resimsil=$_GET['urunresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/urunler.php?durum=ok");
		}
		else
		{
			header("Location:../production/urunler.php?durum=no");
		}
	}





		if (isset($_POST['projekaydet'])) 
	{

	

	$resim_kaynagi = $_FILES["proje_resim"]["tmp_name"];
	$resim_ismi = $_FILES["proje_resim"]["name"];
	$resim_turu = $_FILES["proje_resim"]["type"];
	$resim_boyutu = $_FILES["proje_resim"]["size"];

	//resim ismini değiştiriyoruz çünkü aynı isimle başka bir dosya yüklenebilir.Bu durumda eski dosyamızı kaybederiz.

	$resim_uzantisi = substr($resim_ismi, -4);
	$rasgeleisim = substr(md5(uniqid(rand())), 0, 12);
	$resim_yeniismi = $rasgeleisim.$resim_uzantisi ;

	//gonderdiğimiz dosyanın bilgilerini ekrana yazıyoruz

	

	//dosyayı daha once sunucuda manuel olarak olusturduğumuz gonderilen_resimler adlı klasöre  gönderiyoruz.

	$dosya_hedef = "../../assets/img/projeler/kucukfoto";
	$dosya_yukle = move_uploaded_file($resim_kaynagi, $dosya_hedef.'/'.$resim_yeniismi);

	//Yüklediğimiz resmin küçük halini oluşturoruz.

	$kucuk_resim = imagecreatefromjpeg($dosya_hedef.'/'.$resim_yeniismi);
	$boyut = getimagesize($dosya_hedef.'/'.$resim_yeniismi);

	$yeniyukseklik = "240";
	
	$yenien="378";

	

	$yeniresim = imagecreatetruecolor($yenien,$yeniyukseklik);
	imagecopyresampled($yeniresim, $kucuk_resim, 0, 0, 0, 0, $yenien, $yeniyukseklik, $boyut[0], $boyut[1]);
	$hedefdosya = $dosya_hedef."/".$rasgeleisim."_kucuk".$resim_uzantisi;

	imagejpeg($yeniresim,$hedefdosya,100);
	$dosya_yukle2 = move_uploaded_file($resim_kaynagi, $hedefdosya);
	$kucuk_yeniisim = $rasgeleisim."_kucuk".$resim_uzantisi ;

		$kaydet=$db->prepare("INSERT into projeler set 
			
			
			proje_ad=:ad, 
			
			proje_sira=:sira,
			proje_durum=:durum,
			proje_resim=:resimyol

			
			");



		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['proje_ad'],
		
		'sira'=>$_POST['proje_sira'],
		'durum'=>$_POST['proje_durum'],
		'resimyol'=>$kucuk_yeniisim
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/projeler.php?durum=ok");
		}
		else
		{
			header("Location:../production/projeler.php?durum=no");
		}
	}

	if (isset($_POST['projeduzenle'])) 
	{
		$kontrol=$_POST['proje_id'];
		
		

		if ($_FILES['proje_resim']["size"]>0) 
		{
			
			$resim_kaynagi = $_FILES["proje_resim"]["tmp_name"];
			$resim_ismi = $_FILES["proje_resim"]["name"];
			$resim_turu = $_FILES["proje_resim"]["type"];
			$resim_boyutu = $_FILES["proje_resim"]["size"];

			//resim ismini değiştiriyoruz çünkü aynı isimle başka bir dosya yüklenebilir.Bu durumda eski dosyamızı kaybederiz.

			$resim_uzantisi = substr($resim_ismi, -4);
			$rasgeleisim = substr(md5(uniqid(rand())), 0, 12);
			$resim_yeniismi = $rasgeleisim.$resim_uzantisi ;

			//gonderdiğimiz dosyanın bilgilerini ekrana yazıyoruz

			

			//dosyayı daha once sunucuda manuel olarak olusturduğumuz gonderilen_resimler adlı klasöre  gönderiyoruz.

			$dosya_hedef = "../../assets/img/projeler/kucukfoto";
			$dosya_yukle = move_uploaded_file($resim_kaynagi, $dosya_hedef.'/'.$resim_yeniismi);
			

			//Yüklediğimiz resmin küçük halini oluşturoruz.

			$kucuk_resim = imagecreatefromjpeg($dosya_hedef.'/'.$resim_yeniismi);
			$boyut = getimagesize($dosya_hedef.'/'.$resim_yeniismi);
			$yenien="378";

			$yeniyukseklik = "240";

			$yeniresim = imagecreatetruecolor($yenien,$yeniyukseklik);
			imagecopyresampled($yeniresim, $kucuk_resim, 0, 0, 0, 0, $yenien, $yeniyukseklik, $boyut[0], $boyut[1]);
			$hedefdosya = $dosya_hedef."/".$rasgeleisim."_kucuk".$resim_uzantisi;

			imagejpeg($yeniresim,$hedefdosya,100);
			$dosya_yukle2 = move_uploaded_file($resim_kaynagi, $hedefdosya);
			$kucuk_yeniisim = $rasgeleisim."_kucuk".$resim_uzantisi ;
			$duzenle=$db->prepare("UPDATE projeler set 
			proje_ad=:ad, 
			
			proje_sira=:sira,
			proje_durum=:durum,
			proje_resim=:resimyol
			where proje_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['proje_ad'],
			
			'sira'=>$_POST['proje_sira'],
			'durum'=>$_POST['proje_durum'],
			'resimyol'=>$kucuk_yeniisim
		
		));


		if ($update) 
		{

			$yoket=$_POST['proje_resim'];
			unlink("../../$yoket");
			header("Location:../production/projeler.php?$proje_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/projeler.php?$proje_id=$kontrol&durum=no");
		}
		}

		else
		{

		
			$duzenle=$db->prepare("UPDATE projeler set 
			proje_ad=:ad, 
			
			proje_sira=:sira,
			proje_durum=:durum
			where proje_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['proje_ad'],
			
			'sira'=>$_POST['proje_sira'],
			'durum'=>$_POST['proje_durum']
		
		));
		if ($update) 
		{
			header("Location:../production/projeler.php?$proje_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/projeler.php?$proje_id=$kontrol&durum=no");
		}

		
		}
		
	}

	if (($_GET['projesil']=="ok")) 
	{
		$projesil=$db->prepare("DELETE from projeler where proje_id=:id");

		$sil=$projesil->execute(array('id'=>$_GET['proje_id']));

		if ($sil) 
		{
			$resimsil=$_GET['projeresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/projeler.php?durum=ok");
		}
		else
		{
			header("Location:../production/projeler.php?durum=no");
		}
	}


	if (isset($_POST['hizmetkaydet'])) 
	{

	

	$uploads_dir = '../../assets/img/hizmetler';

	@$tmp_name = $_FILES['hizmet_resim']["tmp_name"];

	@$name = $_FILES['hizmet_resim']["name"];

	$benzersizsayi1=rand(20000,32000);

	$benzersizsayi2=rand(20000,32000);

	$benzersizsayi3=rand(20000,32000);

	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kaydet=$db->prepare("INSERT into hizmetler set 
			
			
			hizmet_ad=:ad, 
			hizmet_detay=:detay,
			hizmet_sira=:sira,
			hizmet_durum=:durum,
			hizmet_resim=:resim

			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['hizmet_ad'],
		'detay'=> $_POST['hizmet_detay'],
		'sira'=>$_POST['hizmet_sira'],
		'durum'=>$_POST['hizmet_durum'],
		'resim'=>$refimgyol
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/hizmet-ekle.php?durum=ok");
		}
		else
		{
			header("Location:../production/hizmet-ekle.php?durum=no");
		}
	}

	if (isset($_POST['hizmetduzenle'])) 
	{
		$kontrol=$_POST['hizmet_id'];
	
		

		if ($_FILES['hizmet_resim']["size"]>0) 
		{
			
			$uploads_dir = '../../assets/img/hizmetler';

			@$tmp_name = $_FILES['hizmet_resim']["tmp_name"];

			@$name = $_FILES['hizmet_resim']["name"];

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

			$duzenle=$db->prepare("UPDATE hizmetler set 
			hizmet_ad=:ad, 
			hizmet_detay=:detay,
			hizmet_sira=:sira,
			hizmet_durum=:durum,
			hizmet_resim=:resim
			
			where hizmet_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['hizmet_ad'],
			'detay'=> $_POST['hizmet_detay'],
			'sira'=>$_POST['hizmet_sira'],
			'durum'=>$_POST['hizmet_durum'],
			'resim'=>$refimgyol
		
		));


		if ($update) 
		{

			$yoket=$_POST['hizmet_resim'];
			unlink("../../$yoket");
			header("Location:../production/hizmetler.php?$hizmet_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/hizmetler.php?$hizmet_id=$kontrol&durum=no");
		}
		}

		else
		{

		
			$duzenle=$db->prepare("UPDATE hizmetler set 
			hizmet_ad=:ad, 
			hizmet_detay=:detay,
			hizmet_sira=:sira,
			hizmet_durum=:durum
			where hizmet_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['hizmet_ad'],
			'detay'=> $_POST['hizmet_detay'],
			'sira'=>$_POST['hizmet_sira'],
			'durum'=>$_POST['hizmet_durum']
		
		));
		if ($update) 
		{
			header("Location:../production/hizmetler.php?$hizmet_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/hizmetler.php?$hizmet_id=$kontrol&durum=no");
		}

		
		}
		
	}

	if (($_GET['hizmetsil']=="ok")) 
	{
		$hizmetsil=$db->prepare("DELETE from hizmetler where hizmet_id=:id");

		$sil=$hizmetsil->execute(array('id'=>$_GET['hizmet_id']));

		if ($sil) 
		{
			$resimsil=$_GET['hizmetresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/hizmetler.php?durum=ok");
		}
		else
		{
			header("Location:../production/hizmetler.php?durum=no");
		}
	}



	if (isset($_POST['tedarikcikaydet'])) 
	{

	

	$uploads_dir = '../../assets/img/tedarikciler';

	@$tmp_name = $_FILES['tedarikci_resim']["tmp_name"];

	@$name = $_FILES['tedarikci_resim']["name"];

	$benzersizsayi1=rand(20000,32000);

	$benzersizsayi2=rand(20000,32000);

	$benzersizsayi3=rand(20000,32000);

	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$kaydet=$db->prepare("INSERT into tedarikciler set 
			
			
			tedarikci_ad=:ad,
			tedarikci_sira=:sira,
			tedarikci_resim=:resim

			
			");

		$insert=$kaydet->execute(array(
		
		'ad'=> $_POST['tedarikci_ad'],
		'sira'=>$_POST['tedarikci_sira'],
		'resim'=>$refimgyol
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/tedarikci-ekle.php?durum=ok");
		}
		else
		{
			header("Location:../production/tedarikci-ekle.php?durum=no");
		}
	}

	if (isset($_POST['tedarikciduzenle'])) 
	{
		$kontrol=$_POST['tedarikci_id'];
		
		

		if ($_FILES['tedarikci_resim']["size"]>0) 
		{
			
			$uploads_dir = '../../assets/img/tedarikciler';

			@$tmp_name = $_FILES['tedarikci_resim']["tmp_name"];

			@$name = $_FILES['tedarikci_resim']["name"];

			$benzersizsayi1=rand(20000,32000);

			$benzersizsayi2=rand(20000,32000);

			$benzersizsayi3=rand(20000,32000);

			$benzersizsayi4=rand(20000,32000);

			$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

			$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;

			@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

			$duzenle=$db->prepare("UPDATE tedarikciler set 
			tedarikci_ad=:ad,
			tedarikci_sira=:sira,
			tedarikci_resim=:resim
			
			where tedarikci_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['tedarikci_ad'],
			'sira'=>$_POST['tedarikci_sira'],
			'resim'=>$refimgyol
			
			
		
		));


		if ($update) 
		{

			$yoket=$_POST['tedarikci_resim'];
			unlink("../../$yoket");
			header("Location:../production/tedarikciler.php?$tedarikci_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/tedarikciler.php?$tedarikci_id=$kontrol&durum=no");
		}
		}

		else
		{

		
			$duzenle=$db->prepare("UPDATE tedarikciler set 
			tedarikci_ad=:ad,
			tedarikci_sira=:sira
			where tedarikci_id=$kontrol");

			$update=$duzenle->execute(array(
			'ad'=> $_POST['tedarikci_ad'],
			'sira'=>$_POST['tedarikci_sira']
		
		));
		if ($update) 
		{
			header("Location:../production/tedarikciler.php?$tedarikci_id=$kontrol&durum=ok");
		}
		else
		{
			header("Location:../production/tedarikciler.php?$tedarikci_id=$kontrol&durum=no");
		}

		
		}
		
	}

	if (($_GET['tedarikcisil']=="ok")) 
	{
		$tedarikcisil=$db->prepare("DELETE from tedarikciler where tedarikci_id=:id");

		$sil=$tedarikcisil->execute(array('id'=>$_GET['teadarikci_id']));

		if ($sil) 
		{
			$resimsil=$_GET['tedarikciresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/tedarikciler.php?durum=ok");
		}
		else
		{
			header("Location:../production/teadrikciler.php?durum=no");
		}
	}

	if (isset($_POST['yeniresimekle'])) 
	{

	$urun_sira=$_POST['urun_sira'];
	

	$resim_kaynagi = $_FILES["ekstra_resim"]["tmp_name"];
	$resim_ismi = $_FILES["ekstra_resim"]["name"];
	$resim_turu = $_FILES["ekstra_resim"]["type"];
	$resim_boyutu = $_FILES["ekstra_resim"]["size"];

	//resim ismini değiştiriyoruz çünkü aynı isimle başka bir dosya yüklenebilir.Bu durumda eski dosyamızı kaybederiz.

	$resim_uzantisi = substr($resim_ismi, -4);
	$rasgeleisim = substr(md5(uniqid(rand())), 0, 12);
	$resim_yeniismi = $rasgeleisim.$resim_uzantisi ;

	//gonderdiğimiz dosyanın bilgilerini ekrana yazıyoruz

	

	//dosyayı daha once sunucuda manuel olarak olusturduğumuz gonderilen_resimler adlı klasöre  gönderiyoruz.

	$dosya_hedef = "../../assets/img/urunler/ekstralar/kucukfoto";
	$dosya_yukle = move_uploaded_file($resim_kaynagi, $dosya_hedef.'/'.$resim_yeniismi);

	//Yüklediğimiz resmin küçük halini oluşturoruz.

	$kucuk_resim = imagecreatefromjpeg($dosya_hedef.'/'.$resim_yeniismi);
	$boyut = getimagesize($dosya_hedef.'/'.$resim_yeniismi);
	$yenien="360";

	$yeniyukseklik = "260";

	$yeniresim = imagecreatetruecolor($yenien,$yeniyukseklik);
	imagecopyresampled($yeniresim, $kucuk_resim, 0, 0, 0, 0, $yenien, $yeniyukseklik, $boyut[0], $boyut[1]);
	$hedefdosya = $dosya_hedef."/".$rasgeleisim."_kucuk".$resim_uzantisi;

	imagejpeg($yeniresim,$hedefdosya,100);
	$dosya_yukle2 = move_uploaded_file($resim_kaynagi, $hedefdosya);
	$kucuk_yeniisim = $rasgeleisim."_kucuk".$resim_uzantisi ;

		$kaydet=$db->prepare("INSERT into ekstralar set 
			
			
			ekstra_sira=:sira,
			ekstra_yol=:yol

			
			");

		$insert=$kaydet->execute(array(
		
		'sira'=>$urun_sira,
		'yol'=>$kucuk_yeniisim
		
		
		
		));

		if ($insert) 
		{
			header("Location:../production/urunler.php?durum=ok");
		}
		else
		{
			header("Location:../production/urunler.php?durum=no");
		}
	}

	if (($_GET['ekstrasil']=="ok")) 
	{
		$ekstrasil=$db->prepare("DELETE from ekstralar where ekstra_id=:id");

		$sil=$ekstrasil->execute(array('id'=>$_GET['ekstra_id']));

		if ($sil) 
		{
			$resimsil=$_GET['ekstraresimsil'];
			unlink("../../$resimsil");
			header("Location:../production/urunresimler.php?durum=ok");
		}
		else
		{
			header("Location:../production/urunresimler.php?durum=no");
		}
	}
	
 ?>