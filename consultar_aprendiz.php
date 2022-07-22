<!doctype  html>
<html>
<head>
<title>Consulta  de  Aprendices</title>
<meta  http-equiv="Content-Type"  content="text/html;  charset=utf-8">
<meta  name="viewport"  content="width=device-width,  initial-scale=1, shrink-to-fit=no">
<link  href="css/bootstrap.min.css"  rel="stylesheet"/>
<link  href="miscss/estilos.css"  rel="stylesheet"/>
<script  src="js/bootstrap.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<div  id="divconsulta"  class="container">
<br>
<div id="div2">
<div  id="div4"  >
<form  name="formulario"  role="form"  method="post"">
<div  class="col-md-12">
<strong  class="lgris">Ingrese  busqueda</strong>
 

<br> <br>
<div  class="form-row">
<div  class="form-group  col-md-3">
 
<input  class="form-control"  type="number"  name="numid" min="9999"  max="9999999999999"  value=""  placeholder="IDENTIFICACIÓN"  />
</div>
<div  class="form-group  col-md-3">
<input  class="form-control"  style="text-transform: uppercase;"  type="text"  name="nombres"  value=""  placeholder="Nombres"  />
</div>
<div  class="form-group  col-md-3">
<input  class="form-control"  style="text-transform: uppercase;"  type="text"  name="apellidos"  value=""  placeholder="Apellidos"  />
</div>
<div  class="form-group  col-md-3">
<input  class="btn  btn-primary"  type="submit"
 
value="Consultar"  >
 

</div>
</div>
<br>
 
</div>
</form>
<br>
</div>

<div  id="divconsulta2">
<?php
if  ($_SERVER['REQUEST_METHOD']==='POST')
{
include('funciones.php');
$vnumid=$_POST['numid'];
$vnombres=$_POST['nombres'];
$vapellidos=$_POST['apellidos'];
$miconexion=conectar_bd('',  'sena_bd');
$resultado=consulta($miconexion,"select  *  from  aprendices  where trim(Apre_Numid)  like  '%{$vnumid}%'  and  (trim(Apre_Nombres)  like '%{$vnombres}%'
and  trim(Apre_Apellidos)  like  '%{$vapellidos}%')"); if($resultado->num_rows>0)
{
while  ($fila  =  $resultado->fetch_object())
{
echo  $fila->Apre_id."  ".$fila->Apre_tipoid."  ".$fila->Apre_numid."  ".$fila->Apre_nombres."  ".
$fila->Apre_apellidos."  ".$fila->Apre_direccion." ".$fila->Apre_telefono."  ".$fila->Apre_ficha."<br>";
}
}
 
else{
    echo "<script>
    alert('NO EXISTEN REGISTROS');
    window.location= 'url.php'
</script>";
}
$miconexion->close();
}?>
<div id="navbar" class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
               <li ><a href="menu.php">ATRAS</a></li>
              
           </div>
<br>
</div>
</div>
</div>
</body>
</html>
</div>
</div>
</div>
</body>
</html>


