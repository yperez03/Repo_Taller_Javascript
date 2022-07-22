<!doctype  html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<title>Registro  de  ficha</title>
<meta  http-equiv="Content-Type"  content="text/html;  charset=utf-8">
<meta  name="viewport"  content="width=device-width,  initial-scale=1, shrink-to-fit=no">
<link  href="css/bootstrap.min.css"  rel="stylesheet"/>
<link  href="Estilos.css"  rel="stylesheet"/>
<script  src="js/bootstrap.js"></script>
</head>
<body>
<div  id="div1"  class="container">
<br>
<div id="div2">
<?php  session_start();  if(!  empty($_SESSION['tipo_usuario']))	{  
    ?>
    <img src="img/registro.jpg" width="100" height="100" /><?php  }  ?>
<div  id="div3"  >
 
<?php

if($_SESSION['tipo_usuario']=='ADMINISTRADOR')
{
?>
<form  id="formulario"  role="form"  method="post" action="guardado_ficha.php">
<div  class="col-md-12">
<strong  class="lgris">Ingrese  los  datos  del
 
programa</strong>
 

<br>


<label  class="lgris">numero:</label>
<input  class="form-control"   type="numer"  min="9" max="9999999999999"   name="numero"  value=""  placeholder="numero" required/>

<label  class="lgris">programa:</label>
<input  class="form-control"   type="numer"  min="9" max="9999999999999"    name="programa"  value=""  placeholder="programa" required/>


<br>
<input  class="btn  btn-primary"  type="submit"
value="Guardar" >
</div>
</form>
<?php
}
else
{
echo  "No  tiene  permisos  para  realizar  esta  acción";
}
?>
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
