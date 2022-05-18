<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor de tareas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <main class="container">
        <div class="row">
            <div class="col-12 text-center py-3">
                <h1>Gestor de tareas</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 py-2">
                <div>
                    <label for="txtTitulo">Titulo</label>
                    <input type="text" name="txtTitulo" id="txtTitulo" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 py-2">
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
            <div class="col-4 py-2">
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
            <div class="col-4 py-2">
                <div>
                    <label for="lstEstado">Estado</label>
                    <select name="lstEstado" id="lstEstado" class="form-control">
                        <option value="" disabled selected>Seleccionar</option>
                        <option value="asignar">Sin asignar</option>
                        <option value="Asignado">Asignado</option>
                        <option value="proceso">En proceso</option>
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
                    <button type="submit" class="btn btn-primary text-center">ENVIAR</button>
                </div>
            </div>
        </div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>