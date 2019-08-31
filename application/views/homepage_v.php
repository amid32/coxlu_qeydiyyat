<?php  header("Refresh:5");?>
<!DOCTYPE html>
<html lang="az">
<head>
	<meta charset="utf-8">
	<title><?=$user->full_name;?></title>
  <link rel="stylesheet" href="<?=base_url('application/views/asset/css/bootstrap.min.css');?>">
</head>
<body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><?=$user->full_name;?></a>
    </div>


    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php foreach ($user_list as $item) { ?> 

            <?php if (md5($item->email) != md5($user->email)) { ?>
              <li><a target="_blank" href="<?php echo base_url("anasehife/".md5($item->email));?>" style="color:green;"><strong><?=$item->full_name; ?></strong> Profil</a></li>
               <?php } ?>

              <?php } ?>
            
            
            <li role="separator" class="divider"></li>
            <li ><a target="_blank"  href="<?php echo base_url("daxil_ol");?>" style="color:#5758BB;"><b>Fərqli hesabla daxil olun</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url("cixis/".md5($user->email));?>" style="margin-left: 20px; font-weight: bold;">cixis</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-md-6 well col-md-offset-3">
      <h3 class="text-center" style="text-transform: uppercase;">Əlavə etdiyiniz məhsullar</h3>
      <h4 style="text-align: center;"><?=$user->full_name;?></h4>
    <table class="table table-hover table-striped table-bordered">
      <thead>
        <th>#id</th>
        <th>Məhsulun adı</th>
      </thead>
      <tbody>
        <?php foreach ($products as $product) { ?> 

<tr>
          <td>#<?=$product->user_id ;?></td>
          <td><a href="#"><?=$product->product_name; ?></a></td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
		</div>
	</div>
</div>

  <script src="<?=base_url('application/views/asset/js/jquery-3.4.1.min.js')?>"></script>
  <script src="<?=base_url('application/views/asset/js/bootstrap.min.js')?>"></script>

 


</body>
</html>