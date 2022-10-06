<?php
session_start();

//declaracion de variables
$Nombre = "";
$Correo = "";
$Telefono = 0;
$arrDatos = array();

if (isset($_SESSION["arrDatos"])) {
    $arrDatos = $_SESSION["arrDatos"];
}

if (isset($_POST['btnProcesar'])) {
    $Nombre = $_POST["Nombre"];
    $Correo = $_POST["Correo"];
    $Telefono = $_POST["Telefono"];
    $dicDatos = array(
        "nombre" => $Nombre,
        "correo" => $Correo,
        "telefono" => $Telefono,
    );
    $arrDatos[] = $dicDatos;
}

$_SESSION["arrDatos"] = $arrDatos;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con tabla</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="p-3 row container-fluid">
        <form class="col-3 p-3" action="Ejercicio_2.php" method="post">
            <h1>Formulario</h1>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Correo</label>
                <input type="email" class="form-control" name="Correo" required>
            </div>
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Telefono</label>
                <input type="number" class="form-control" name="Telefono" required>
            </div>
            <button type="submit" name="btnProcesar" class="btn m-3 btn-success">Guardar</button>
        </form>
        <div class="col-9 p-4">
            <?php
            if (count($arrDatos) >= 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrDatos as $element) { ?>
                            <tr>
                                <td><?php echo $element["nombre"] ?></td>
                                <td><?php echo $element["correo"] ?></td>
                                <td><?php echo $element["telefono"] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>