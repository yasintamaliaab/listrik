<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pembayaran Listrik | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">

  <style>
  .label-text{
    font-size: 14px;
  }

  input[type="checkbox"], input[type="radio"]{
  	position: absolute;
  	right: 9000px;
  }

  /*Check box*/
  input[type="checkbox"] + .label-text:before{
  	content: "\f096";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 5px;
  }

  input[type="checkbox"]:checked + .label-text:before{
  	content: "\f14a";
  	color: #2980b9;
  	animation: effect 250ms ease-in;
  }

  input[type="checkbox"]:disabled + .label-text{
  	color: #aaa;
  }

  input[type="checkbox"]:disabled + .label-text:before{
  	content: "\f0c8";
  	color: #ccc;
  }

  /*Radio box*/

  input[type="radio"] + .label-text:before{
  	content: "\f10c";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 5px;
  }

  input[type="radio"]:checked + .label-text:before{
  	content: "\f192";
  	color: #8e44ad;
  	animation: effect 250ms ease-in;
  }

  input[type="radio"]:disabled + .label-text{
  	color: #aaa;
  }

  input[type="radio"]:disabled + .label-text:before{
  	content: "\f111";
  	color: #ccc;
  }

  /*Radio Toggle*/

  .toggle input[type="radio"] + .label-text:before{
  	content: "\f204";
  	font-family: "FontAwesome";
  	speak: none;
  	font-style: normal;
  	font-weight: normal;
  	font-variant: normal;
  	text-transform: none;
  	line-height: 1;
  	-webkit-font-smoothing:antialiased;
  	width: 1em;
  	display: inline-block;
  	margin-right: 10px;
  }

  .toggle input[type="radio"]:checked + .label-text:before{
  	content: "\f205";
  	color: #16a085;
  	animation: effect 250ms ease-in;
  }

  .toggle input[type="radio"]:disabled + .label-text{
  	color: #aaa;
  }

  .toggle input[type="radio"]:disabled + .label-text:before{
  	content: "\f204";
  	color: #ccc;
  }


  @keyframes effect{
  	0%{transform: scale(0);}
  	25%{transform: scale(1.3);}
  	75%{transform: scale(1.4);}
  	100%{transform: scale(1);}
  }
  </style>

<div class="login-box">
  <div class="login-logo">
    <a href="<?=base_url()?>home/login"><b>Pembayaran</b> Listrik</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login Untuk Melanjutkan</p>
      <center><font color="red" size="3"><b><?= $this->session->flashdata('pesan_gagal'); ?></font><font color="green" size="3"><?= $this->session->flashdata('pesan_sukses'); ?></font></b></center><br />
    <form action="<?=base_url('user/proses_login')?>" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
      <input placeholder="Password" type="password" id="sp" name="password" required="required" class="form-control">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>


        <label>
            <input type="checkbox" name="check" type="checkbox" onclick="FPassword()"> <span class="label-text">Lihat Password</span>
        </label><br /><br />

      <div class="row">

        <!-- /.col -->
        <div class="col-xs-12">
          <input name="submit" id="submit "type="submit" class="btn btn-primary btn-block btn-flat" value="Masuk">
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
    <br>
    Belum Punya Akun ?<a href="<?=base_url()?>user/register" class="text-center"> Daftar Disini</a>

  </div>
  <!-- /.login-box-body -->
</div>
<script>
  function FPassword() {
    var x = document.getElementById("sp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
  }
</script>

<!-- jQuery 3 -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>
