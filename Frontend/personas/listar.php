<?php
include_once $_SERVER['DOCUMENT_ROOT'] .'/EjercicioModernizacion/Frontend/frame/header.php';?>
    <div class="container">
        <table class="table table-success table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">DNI</th>
                <th scope="col">Nombre</th>
                <th scope="col">Género</th>
                <th scope="col">CP</th>
                <th scope="col">Dirección</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if (isset($personas)) {
                foreach ($personas["value"] as $persona) {
                    echo "<tr>";
                    echo "<th scope='row'>" . $persona["id"] . "</th>";
                    echo "<td>" . $persona["dni"] . "</td>";
                    echo "<td>" . $persona["razonSocial"] . "</td>";
                    echo "<td>" . $persona["genero"]["value"] . "</td>";
                    echo "<td>" . $persona["codigoPostal"]["postalID"] . "</td>";
                    echo "<td>" . $persona["domicilio"] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </div>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] .'/EjercicioModernizacion/Frontend/frame/footer.php';