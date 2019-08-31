<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?=base_url('application/views/asset/css/bootstrap.min.css');?>">
</head>
<body>
<h1 class="text-center">Daxil ol</h1>
<hr>
<div class="container">
	<div class="row">
		<div class="col-md-6 well col-md-offset-3">
<form action="<?=base_url("daxil_ol");?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Post Adres</label>
    <input type="email" class="form-control" name="eposta"   placeholder="E-posta">

<!--========================================//===========================================-->
  <!--kontrol sehifesinden gelen xeta mesajini burada goster yeni forum'da-->

    <?php if (isset($form_error)) { ?>
    	<small class="pull-right" style="color:red"><?=form_error("eposta");?></small>
   <?php } ?>
<!-- kontrol sehifesinden gelen xeta mesajini burada goster-->
<!--========================================//===========================================-->
  </div>

  <div class="form-group">
    <label>Sifre</label>
    <input type="password" class="form-control" name="sifre"   placeholder="Shifre">

<!--========================================//===========================================-->
  <!-- kontrol sehifesinden gelen xeta mesajini burada goster  forum'da-->
    <?php if (isset($form_error)) { ?>
    	<small class="pull-right" style="color:red"><?=form_error("sifre");?></small>
   <?php } ?>
   <!-- kontrol sehifesinden gelen xeta mesajini burada goster-->
   <!--========================================//===========================================-->


  </div>
  <button type="submit" class="btn btn-primary btn-block">Giris</button>
</form>
		</div>
	</div>
</div>
</body>
</html>