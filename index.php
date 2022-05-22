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

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id ="";
}

//Eliminar tarea
if(isset($_GET["do"]) && $_GET["do"] == "eliminar"){
    unset($aTareas[$id]);

    //convertir aClientes en json
    $strJson = json_encode($aTareas);
    //Almacenar el json en el archivo
    file_put_contents("tareas.txt", $strJson);
    header("Location: index.php");
}

if($_POST){
    $titulo = $_POST["txtTitulo"];
    $prioridad = $_POST["lstPrioridad"];
    $usuario = $_POST["lstUsuario"];
    $estado = $_POST["lstEstado"];
    $descripcion = $_POST["txtDescripcion"];

    if($id >= 0){
        //estoy editando
        $aTareas [$id] = array("fechaInsercion" => $aTareas[$id]["fechaInsercion"],
                        "titulo" => $titulo,
                        "prioridad" => $prioridad,
                        "usuario" => $usuario,
                        "estado" => $estado,
                        "descripcion" => $descripcion
                    );

    }else{
        //Estoy creando una tarea nueva
        $aTareas [] = array("fechaInsercion" => date("h:i:s | d/m/Y"),
                        "titulo" => $titulo,
                        "prioridad" => $prioridad,
                        "usuario" => $usuario,
                        "estado" => $estado,
                        "descripcion" => $descripcion
                    );
    }
    

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
                        <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" value="<?php echo isset($aTareas[$id]["titulo"])? $aTareas[$id]["titulo"] : ""; ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 py-1">
                    <div>
                        <label for="lstPrioridad">Prioridad</label>
                        <select name="lstPrioridad" id="lstPrioridad" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Alta" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Alta"? "selected": "";?>>Alta</option>
                            <option value="Medio" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Medio"? "selected": "";?>>Medio</option>
                            <option value="Baja" <?php echo isset($aTareas[$id]) && $aTareas[$id]["prioridad"] == "Baja"? "selected": "";?>>Baja</option>
                        </select>
                    </div>
                </div>
                <div class="col-4 py-1">
                    <div>
                        <label for="lstUsuario">Usuario</label>
                        <select name="lstUsuario" id="lstUsuario" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Edwin" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Edwin"? "selected": "";?>>Edwin</option>
                            <option value="Paola" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Paola"? "selected": "";?>>Paola</option>
                            <option value="Sofia" <?php echo isset($aTareas[$id]) && $aTareas[$id]["usuario"] == "Sofia"? "selected": "";?>>Sofia</option>
                        </select>
                    </div>
                </div>
                <div class="col-4 py-1">
                    <div>
                        <label for="lstEstado">Estado</label>
                        <select name="lstEstado" id="lstEstado" class="form-control">
                            <option value="" disabled selected>Seleccionar</option>
                            <option value="Sin asignar" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Sin asignar"? "selected": "";?>>Sin asignar</option>
                            <option value="Asignado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Asignado"? "selected": "";?>>Asignado</option>
                            <option value="En proceso" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "En proceso"? "selected": "";?>>En proceso</option>
                            <option value="Terminado" <?php echo isset($aTareas[$id]) && $aTareas[$id]["estado"] == "Terminado"? "selected": "";?>>Terminado</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 py-1">
                    <div>
                        <label for="txtDescripcion">Descripción</label>
                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control"><?php echo isset($aTareas[$id]["descripcion"])? $aTareas[$id]["descripcion"] : ""; ?></textarea>
                    </div>
                    <div class="text-center py-1">
                        <button type="submit" id="btnEnviar" name="btnEnviar" class="btn btn-primary text-center">ENVIAR</button>
                        <a href="index.php" name="btnEliminar" class="btn btn-secondary text-center">CANCELAR</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12 py-2">
                <?php if(count($aTareas)): ?>
                    <table class="table table-hover border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Fecha de inserción</th>
                                <th>Título</th>
                                <th>Prioridad</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($aTareas as $pos => $tarea): ?>
                            <tr>
                                <td><?php echo $pos ?></td>
                                <td><?php echo $tarea["fechaInsercion"];?></td>
                                <td><?php echo $tarea["titulo"];?></td>
                                <td><?php echo $tarea["prioridad"];?></td>
                                <td><?php echo $tarea["usuario"];?></td>
                                <td><?php echo $tarea["estado"];?></td>
                                <td>
                                    <a href="?id=<?php echo $pos; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="?id=<?php echo $pos ; ?>&do=eliminar"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-info" role="alert">
                        Aún no se han asignado tareas
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</body>
</html>