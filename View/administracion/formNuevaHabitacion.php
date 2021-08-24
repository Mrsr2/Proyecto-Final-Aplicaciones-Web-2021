<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<div class="panel panel-primary">
    <div class="panel-heading cabeceraDivForm">Nueva habitación</div>
    <div class="cuadroForm">
        <form action="" class="formCentrado" id="formNuevaHabitacion" method="post">
            <div class="form-group">
                <label for="codHabitacionNuevo">codHabitacion:</label>
                <input type="text" name="codHabitacion" id="codHabitacionNuevo" class="form-control" disabled value="">
            </div>

            <div class="form-group">
                <label for="tipoNuevo">Tipo:</label>
                <input type="text" name="tipo" id="tipoNuevo" class="form-control">
            </div>

            <div class="form-group">
                <label for="capacidadNuevo">Capacidad:</label>
                <input type="text" name="capacidad" id="capacidadNuevo" class="form-control">
            </div>

            <div class="form-group">
                <label for="plantaNuevo">Planta:</label>
                <input type="text" name="planta" id="plantaNuevo" class="form-control">
            </div>

            <div class="form-group">
                <label for="tarifaNuevo">Tarifa:</label>
                <input type="text" name="tarifa" id="tarifaNuevo" class="form-control">
            </div>
        </form>
    </div>
</div>
<?php
    }else{
        //Error, mensaje, redirección...
        echo "Zona Inaccesible. Requiere Inicio de sesión"; //Mensaje de prueba
    }