<!DOCTYPE html>
<html>
  <head>
    <title>Crear Programa</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="div1" class="container">
        <br>
        <div id="div2">
           <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?> <img src="img/descarga.jpg"> <?php } ?>
           <div id="div3">
           <?php
             if($_SESSION['Tipo_usuario']=='ADMINISTRADOR')
             {
             ?>
             <form id="formulario" role="form" method="post" action="guardado_programa.php">
             <div class="cold-md-12">
               <strong class="lgris">Cree el programa</strong>
               <br>
               <label class="lgris">Nombre:</label>
               <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre" required/>

               <label class="lgris">Tipo Programa:</label>
                <div class="form-group col-xs-2">
                <?php 
                                include('funciones.php');
                                $miconexion=conectar_bd('','sena_bd');
                                $consulta = "SELECT * FROM tiposprograma";
                                $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                ?>
                  <select class="form-control" name="otipo">
                    <option value="" selected></option>
                    <?php while ($opcion = $resultado -> fetch_object()) { ?>
                    <option value="<?php echo $opcion->tiposp_id;?>"><?php echo $opcion->tipos;?></option>
                                    <?php } ?>
                  </select>
                </div>              
                  <br>
               <input class="btn btn-primary" type="submit" value="Guardar">
               <input style="width: 40%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
             </div>
             </form>
            <?php
             }
             else
             {
                 echo "No tiene permisos para realizar esta acción";
             }
            ?> 
            <br>
           </div>
        </div>
    </div>
  </body>
</html>