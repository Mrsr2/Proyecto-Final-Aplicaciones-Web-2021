<?php
  session_start();
  if ($_SESSION['logueadoAdmin']){
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title><?= $nombreHotel->nombreHotel?> - Lista de clientes</title>
    </head>
    <body>
        <?php
        $opcionesOrden = array();
        $opcionesOrden["codCliente"] = "codCliente";
        $opcionesOrden["dni"] = "DNI";
        $opcionesOrden["nombre"] = "Nombre";
        $opcionesOrden["apellido1"] = "Apellido 1";
        $opcionesOrden["apellido2"] = "Apellido 2";

        $tiposOrden = array();
        $tiposOrden["asc"] = "Ascendente";
        $tiposOrden["desc"] = "Descendente";
        ?>  
        <div class="ordenar">
            <select name="orden">
                <?php
                foreach ($opcionesOrden as $clave => $valor) {
                    $selected = "";
                    if ($clave == $orden) {
                        $selected = "selected";
                    }
                    echo "<option " . $selected . " value='" . $clave . "'>" . $valor . "</option>\n";
                }
                ?>
            </select> 

            <select name="tipoOrden">
                <?php
                foreach ($tiposOrden as $clave => $valor) {
                    $selected = "";
                    if ($clave == $tipoOrden) {
                        $selected = "selected";
                    }
                    echo "<option " . $selected . " value='" . $clave . "'>" . $valor . "</option>\n";
                }
                ?>
            </select>
            <button type="button" class="btn btn-info btn-ordenar">Ordenar</button>
        </div>
        <table id="tabladatos" class="table table-striped table-hover" data-orden="<?= $orden ?>" data-tipo-orden="<?= $tipoOrden ?>">
            <thead>
                <tr class="bg-primary">
                    <th>CodCliente</th>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Apellido 1</th>
                    <th>Apellido 2</th>
                    <th>Edici??n</th>
                    <th>Reserva</th>
                    <th>Borrado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['clientes'] as $cliente) {
                    ?>
                    <tr id="cliente_<?= $cliente->getCodCliente() ?>" data-codCliente="<?= $cliente->getCodCliente() ?>">
                        <td class="codCliente"><?= $cliente->getCodCliente() ?></td>
                        <td class="dni"><?= $cliente->getDni() ?></td>
                        <td class="nombre"><?= $cliente->getNombre() ?></td>
                        <td class="apellido"><?= $cliente->getApellido1() ?></td>
                        <td class="apellido2"><?= $cliente->getApellido2() ?></td>
                        <td>
                            <button type="button" class="btn btn-info btn-modificar">Modificar</button>
                        </td>
                        <td>
                            <!--
                          <form name="reservar" action="reservar.php" method="POST">
                            <input type="hidden"  name="codCliente" value="<?= $cliente->getCodCliente() ?>">
                            <input type="submit" class="btn btn-success" value="Reservar" />
                          </form>-->
                            <button type="button" class="btn btn-success btn-reservar">Reservar</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-eliminar">Eliminar</button>
                        </td>
                    </tr>
                    <?php } ?>
            </tbody>
        </table>
        <div class="paginacion">
            <?php
            $url = "index.php";
            if ($totalPaginas > 1) {
                if ($pagina != 1) {
                    echo '<a href data-pagina="' . ($pagina - 1) . '"> Anterior</a>';
                }
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    if ($pagina == $i) {
                        //si muestro el ??ndice de la p??gina actual, no coloco enlace
                        echo "<spam class='pagActual'> ", $pagina, " </spam>";
                    } else {
                        //si el ??ndice no corresponde con la p??gina mostrada actualmente,
                        //coloco el enlace para ir a esa p??gina
                        echo '  <a href data-pagina="' . $i . '">' . $i . ' </a>  ';
                    }
                }
                if ($pagina != $totalPaginas) {
                    echo '<a href data-pagina="' . ($pagina + 1) . '"> Siguiente</a>';
                }
            }
            ?>
        </div>
    </body>
</html>
<?php
    }else{
        //Error, mensaje, redirecci??n...
        echo "Zona Inaccesible. Requiere Inicio de sesi??n"; //Mensaje de prueba
    }