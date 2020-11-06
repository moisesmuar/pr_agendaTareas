<!DOCTYPE html>
<html lang="es">
   <head> 
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="La agenda personal más innovadora y efectiva">
      <title>MI AGENDA PERSONAL®</title>
   </head>
   <!--problema, solucion, justificación-->
   <body>
      <center><header><h1>TAREAS</h1></header></center>

      <!-- En la etapa 2 de la fase 2 de nuestro proyecto vamos a crear tareas tareas pendientes desde la aplicacion web 
      para ello emos creado un formulario con los campos que requerimos, enviamos a recogida.php mediante el metodo post, 
      escribiremos los id y las tareas si cumplen los requesitos que marcamos a continuación -->

      <form method="post" action="recogida.php" enctype="application/x-www-form-urlencoded">
         <fieldset>
            <legend> Nueva Tarea </legend>
            <div><label>ingresa id: <input type=number name="id" ></label></div>
            <div><label>ingresa tarea: <input type=text name="tarea" required></label></div>
         </fieldset>
            <div><button type=submit>Agregar tarea</div>
      </form>

      <?php
      echo "<h3>PENDIENTES</h3>";

      $pendientes= fopen("pendientes.txt","rb");
         /* abro fichero solo lectura, y meto en variable.
            Genero variable contador, nos servirá como comparativa de igualdad en nuestra busqueda.
            estructura de repetición while, mientras leamos linea del fichero
            listamos, obtenemos variable id, y variable tarea, comparamos con contador aver si es la que queremos.
            si es: imprimimos, sumamos 1 a contador para buscar la siguiente, y reiniciamos fichero.
            si no es: seguimos con la siguiente cadena del fichero obtenemos id tarea, comparamos.....
         */
      $contador=0;
      while($cadena= fgets($pendientes)){
         list($id,$tarea)=explode(".","$cadena");
         /* Establezco un condición para encontrar el id que busco en el fichero.
            Sumo 1 a contador, para buscar la siguiente.
            Con fseek establezco el indicador de posición del fichero; a nueva posición, medida en bytes desde inicio,
            establezco en 0.
         */
         if($id==$contador){
            echo "id: $id   tarea: $tarea</br>";
            $contador++;
            fseek($pendientes,0);   
         }
      }
      fclose ($pendientes);
            
      echo "<h3>EN PROGRESO</h3>";
      $progreso= fopen("enprogreso.txt","rb");
      $contador=0;
      while($cadena= fgets($progreso)){
         list($id,$tarea)=explode(".","$cadena");
         if($id==$contador){
            echo "id: $id   tarea: $tarea</br>";
            $contador++;
            fseek($progreso,0);
         }
      }
      fclose ($progreso);
      
      echo "<h3>FINALIZADAS</h3>";

      $finalizadas= fopen("finalizadas.txt","rb");
      $contador=0;
      while($cadena= fgets($finalizadas)){
         list($id,$tarea)=explode(".","$cadena");
         if($id==$contador){
           echo "id: $id   tarea: $tarea</br>";
            $contador++;
            fseek($finalizadas,0);
         }
      }
      fclose ($finalizadas);
      ?>
   </body>
</html>


