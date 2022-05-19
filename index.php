<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//pregunta si el archivo existe
if(file_exists("tareas.txt")){
    //si el archivo existe, cargo los clientes en la variable aClientes
    $strJson = file_get_contents("tareas.txt");
    $aTareas = json_decode($strJson, true);
}else{
    //si el archivo no existe es porque no hay clientes
    $aTareas = array();
}


if($_POST){
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

    $fechaInsercion = date("h:i:s | d/m/Y");
     

    $aTareas [] = array("fechaInsercion" => $fechaInsercion,
                        "titulo" => $titulo,
                        "prioridad" => $prioridad,
                        "usuario" => $usuario,
                        "estado" => $estado,
                        "descripcion" => $descripcion
                    );

    //convertir el array de clientes en json
    $strJson = json_encode($aTareas);
    
    //Almacenar en un archivo txt el json
    file_put_contents("tareas.txt", $strJson);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome/css/fontawesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-12 py-1">
                    <div>
                        <label for="txtTitulo">Título</label>
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 py-1">
                    <div>
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Alta">Alta</option>
                            <option value="Medio">Medio</option>
                            <option value="Baja">Baja</option>
                        </select>
                    </div>
                </div>
                <div class="col-4 py-1">
                    <div>
                        <label for="lstUsuario">Usuario</label>
                        <select name="lstUsuario" id="lstUsuario" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Edwin">Edwin</option>
                            <option value="Paola">Paola</option>
                            <option value="Sofia">Sofia</option>
                        </select>
                    </div>
                </div>
                <div class="col-4 py-1">
                    <div>
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Sin asignar">Sin asignar</option>
                            <option value="Asignado">Asignado</option>
                            <option value="En proceso">En proceso</option>
                            <option value="Terminado">Terminado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-1">
                    <div>
                        <label for="txtDescripcion">Descripción</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"></textarea>
                    </div>
                    <div class="text-center py-1">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary text-center">ENVIAR</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12 py-2">
                <table class="table table-hover border">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Fecha de inserción</th>
                            <th>Título</th>
                            <th>Prioridad</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($aTareas as $pos => $tarea): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $tarea["fechaInsercion"];?></td>
                            <td><?php echo $tarea["titulo"];?></td>
                            <td><?php echo $tarea["prioridad"];?></td>
                            <td><?php echo $tarea["usuario"];?></td>
                            <td><?php echo $tarea["estado"];?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>