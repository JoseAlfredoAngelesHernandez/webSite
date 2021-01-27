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
session_start();
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
  $emails=$_SESSION["sesion_usuario"];
  $pas=$_SESSION["session_pass"];
  $qry="select *from usuario where mail_usu='$emails' and  pass_usu='$pas'";
  $consul= $cnn->query($qry);
  $ren=$consul->fetch_array(MYSQL_ASSOC);
?>
      <h2 align='center'>MODIFICAR CONTRASEÑA </h2>
      <form action="#" method="POST">
          <table class='table table-striped' style='width: 60%;' align='center' >
            <tr>
              <td><label>Nombre:</label></td>
              <td><label class="form-control"><?php echo $ren['nombre_usu']?></label></td>
            </tr>
            <tr>
              <td><label>Apellido Paterno:</label></td>
              <td><label class="form-control"><?php echo $ren['paterno_usu']?></label></td>
            </tr>
            <tr>
              <td><label>Apellido Materno:</label></td>
              <td><label class="form-control"><?php echo $ren['materno_usu']?></label></td>
            </tr>
            <tr>
              <td><label>Email:</label></td>
              <td><label class="form-control"><?php echo $ren['mail_usu']?></label></td>
            </tr>
             <tr>
              <td><label>Password:</label></td>
              <td><input type='text' name='contrasenia'  class='form-control'value=<?php echo $ren['pass_usu']?> /></td>
            </tr>
            <tr>
              <td><label>Dirección:</label></td>
              <td><label class="form-control"><?php echo $ren['direccion_usu']?></label></td>
            </tr>
            <tr>
              <td><label>Teléfono:</label></td>
              <td><label class="form-control"><?php echo $ren['tel_usu']?></label></td>
            </tr>
            <tr>
              <td colspan='2'><input type='submit' name='opcion' class='btn btn-sm btn-success form-control' value='Guardar Cambios' /></td>
            </tr>
          </table><br/>
          </form>
<script src=bootstrap/js/jquery.js></script>
<script src=bootstrap/js/bootstrap.min.js></script>
</body>
<?php
if (isset($_POST['opcion'])) {
$cnn=conectar();
  $qry1="select *from usuario where mail_usu='$emails' and  pass_usu='$pas'";
  $consul1= $cnn->query($qry1);
  $ren=$consul1->fetch_array(MYSQL_ASSOC);
    $nombre=$ren['nombre_usu'];
    $appat=$ren['paterno_usu'];
    $apmat=$ren['materno_usu'];
    $correo=$ren['mail_usu'];
    $direccion=$ren['direccion_usu'];
    $telefono=$ren['tel_usu'];
    $contrasenia=$_POST['contrasenia'];

  $qry="UPDATE usuario SET nombre_usu='$nombre',paterno_usu='$appat',materno_usu='$apmat',mail_usu='$correo',pass_usu='$contrasenia',direccion_usu='$direccion',tel_usu='$telefono' where mail_usu='$emails' and  pass_usu='$pas'";
  $consul=$cnn->query($qry);
    session_destroy();
    header("Location:index.php");
      $salida="registro modificado con  exito!!";
}
?>
</html><!DOCTYPE html>