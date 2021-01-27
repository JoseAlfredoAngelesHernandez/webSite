<!DOCTYPE html>
<head>
	<meta charset=UTF-8>
	<title>WEBSITE PHP</title>
	<link rel=stylesheet type=text/css href=css/styles.css/>
  <link rel=stylesheet href=bootstrap/css/bootstrap.min.css>
  <link rel=stylesheet href=bootstrap/font-awesome/css/font-awesome.min.css>
</head>
<body>
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
  $renglon=$_GET['renglon'];
  $cnn=conectar();
  $qry="select *from usuario where mail_usu='$email' and  pass_usu='$password'";
  $consul= $cnn->query($qry);
  $ren=$consul->fetch_array(MYSQL_ASSOC);
  ?>
    <h2 align='center'>Nuevo Usuario</h2>
        <form action="#" method="POST">
          <table class='table table-striped'  style='width: 40%;' align='center'>
            <tr>
              <td><label>Nombre:</label></td>
              <td><input class='form-control' type='text' required  name='nombre' pattern='[A-Z]{1}?[a-z]+' placeholder="Alfredo" title="Ingresa solo tu primer nombre y la primer letra debe ser mayuscula" /></td>
            </tr>
            <tr>
              <td><label>Apellido Paterno:</label></td>
              <td><input class='form-control' type='text' required  name='appat' pattern='[A-Z]{1}?[a-z]+' placeholder="Angeles" /></td>
            </tr>
            <tr>
              <td><label>Apellido Materno:</label></td>
              <td><input class='form-control' type='text' required  name='apmat' pattern='[A-Z]{1}?[a-z]+'  placeholder="Hernandez" /></td>
            </tr>
            <tr>
              <td><label>Email:</label></td>
              <td><input type=email class=form-control name=email  placeholder=jose@gmail.com required /></td>
            </tr>
            <tr>
              <td><label>Password:</label></td>
              <td><input type=password class=form-control name=password  placeholder=Password required></td>
            </tr>
            <tr>
              <td><label>Dirección:</label></td>
              <td><input type='text' name='direccion'required  class='form-control' placeholder="Morelos sur 8 Zitacuaro Michoacan" /></td>
            </tr>
            <tr>
              <td><label>Teléfono:</label></td>
              <td><input type='tel' name='telefono' class='form-control' placeholder="(Código de área) Número" pattern="\([0-9]{3}\) [0-9]{3}[ -][0-9]{4}" title="Un numero de telefono valido consiste en 3 digitos del codigo de area entre parentesis, un espacio, los 3 primeros digitos del numero, un espacio o un guion,y los ultimos 4 digitos" /></td>
            </tr>
            <tr>
              <td colspan='2'><input type='submit' name='opcion' class='btn btn-sm btn-success form-control' value='Guardar' /></td>
            </tr>
          </table>
          </form>
<script src=bootstrap/js/jquery.js></script>
<script src=bootstrap/js/bootstrap.min.js></script>
</body>
<?php
  class Persona {
    public $nombre;
    public $appat;
    public $apmat;
    public $email;
    public $password;
    public $direccion;
    public $telefono;
  }
  if (isset($_POST['opcion'])) {
    $cnn=conectar();
 $email=$_POST['email'];
    $password=$_POST['password'];
  
  $cnn=conectar();
  $qry="select *from usuario where mail_usu='$email' and  pass_usu='$password'";
  $consul= $cnn->query($qry);
  $ren=$consul->fetch_array(MYSQL_ASSOC);
  if (sizeof($ren)>0) {
     echo "<div class='alert alert-danger' role='alert'> Ese usuario ya se encuentra registrado </div>";
}else{
    $nombre=$_POST['nombre'];
    $appat=$_POST['appat'];
    $apmat=$_POST['apmat'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $qry="INSERT INTO usuario values(null,'$nombre','$appat','$apmat','$email','$password','$direccion','$telefono');";
    $ejec=$cnn->query($qry);
    header("Location:index.php");
}
  }
?>
</html><!DOCTYPE html>