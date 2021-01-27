<!DOCTYPE html>
<head>
	<meta charset=UTF-8>
	<title>WEBSITE PHP</title>
	<link rel=stylesheet type=text/css href=css/styles.css/>
  <link rel=stylesheet href=bootstrap/css/bootstrap.min.css>
  <link rel=stylesheet href=bootstrap/font-awesome/css/font-awesome.min.css>  
  <style>
    .container{margin-top:100px}
  </style>
</head>
<body >
  <h1 align="center">WEBSITE PHP</h1>
<div class=container>
      <form class=form-horizontal action=# method=post>
        <div class=form-group>
          <label  class=col-sm-2 control-label>Email</label>
          <div class=col-sm-10>
            <input type=email class=form-control name="email"  placeholder=Email required>
          </div>
        </div>
        <div class=form-group>
          <label class=col-sm-2 control-label>Password</label>
          <div class=col-sm-10>
            <input type=password class=form-control name="password"  placeholder=Password required>
          </div>
        </div>
        <div class=form-group align="center">
          <div class=col-sm-offset-2 col-sm-10 >
            <button type=submit class=btn btn-default name="login">Sign in</button>
          </div>
          </form>
          <form>
          <div class=col-sm-offset-2 col-sm-10>      
            <a href="registro.php">REGISTER</a>
          </div>
          </form>
        </div>
      
    </div>
<footer class=ft><p>Desarrollado por Jose Alfredo Angeles Hernandez</p></footer>
<script src=bootstrap/js/jquery.js></script>
<script src=bootstrap/js/bootstrap.min.js></script>
</body>
<?php
   function conectar(){
    $host="localhost";
    $user="root";
    $db="sitioweb";
    $pwd="12345";
    $cnn=new mysqli($host,$user,$pwd,$db);
    if ($cnn->connect_error) {
      echo $cnn->connect_error;
      exit();
    }
    return $cnn;
  }
  if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
  
  $cnn=conectar();
  $qry="select *from usuario where mail_usu='$email' and  pass_usu='$password'";
  $consul= $cnn->query($qry);
  $ren=$consul->fetch_array(MYSQL_ASSOC);
  if (sizeof($ren)>0) {
    session_start();
    $_SESSION["sesion_usuario"]=$email;
    $_SESSION["session_pass"]=$password;
    header("Location:modificar.php");
}else{
  echo "<div class='alert alert-danger' role='alert'> Ese usuario no existe en los registros </div>";
}

  }
?>
</html><!DOCTYPE html>