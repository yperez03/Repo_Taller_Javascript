<?php
  include('funciones.php');
  session_start();
  $vide=$_SESSION['ide1'];
  $vnombre=$_POST['nombre'];
  $vtipo=$_POST['otipo'];


  $miconexion=conectar_bd('', 'sena_bd');
  $resulado=consulta($miconexion,"update programa set Progra_Nombre='{$vnombre}',Progra_tipo='{$vtipo}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>