<?php
      include("conexion.php");
      $con = conectar();
    ?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/simplex/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" />


    <title>Club Nautico</title>
</head>

<body>
    <div class="container contenido">
    
        <?php
            $enlace = mysqli_connect("localhost", "root", "", "club");
              if (!$con)
               {
                     echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                      exit;
               }
             ?>
        <div id="imgcabeza" class="container" style="width:70%">

            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label>Barco</label>
                        <?php  echo leerbarcos(); ?>
                    </div>
                </div>
                <div class="col-4">
                    <label>Destino</label>
                    <div class="form-group">
                        <input id="destino" class="form-control" type="text" placeholder="destino">
                    </div>
                </div>
                <div class="col-4">
                    <label>Patron</label>
                    <div class="form-group">
                        <?php  echo leercapitanes(); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label class="labels">Fecha Salida</label>
                        <input id="fechaout" class="form-control" type="date" name="fecha">

                    </div>
                </div>
                <div class="col-4">

                    <label>Fecha Entrada</label>
                    <input id="fechain" class="form-control" type="date" name="fecha">
                </div>
                <div class="col-4">
                    <label></label>
                    <div class="form-group">
                        <button id="btnguardar" name="btnguardar" class="btn btn-primary"> Guardar</button>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="container  mt-2">
                <table class="table table-striped ">
                    <thead>
                        <th>Matricula</th>
                        <th>N. Patron</th>
                        <th>Destino</th>
                        <th>Fecha salida</th>
                        <th>Fecha llegada</th>
                        <th>Es cio</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody id='cuerpotabla'>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    </div>
    </div>


    </div>




    <div class="foot" name="foot" id="foot">
        orale
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
    $(function() {

        $("#btnguardar").click(function(e) {
            $id = $(this).attr('id'),
            $barco = $("#barcos").val();
            $destino = $("#destino").val();
            $patron = $("#patron").val();
            $salida = $("#fechaout").val();
            $llegada = $("#fechain").val();
            $.ajax({

                url: "conexion.php",
                method: "GET",
                data: {
                    funcion: "guardar",
                    id: $id,
                    barco: $barco,
                    destino: $destino,
                    patron: $patron,
                    salida: $salida,
                    llegada: $llegada
                }

            }).done(function(data) {
                alert(data) 
                leer();

            })
        });







        leer();



        $("#btn").click(function(e) {
            e.preventDefault();
            leer()
        });
    });

    function leer() {
        $.ajax({
            url: "conexion.php",
            method: "GET",
            data: {
                funcion: "leersalidas"
            }
        }).done(function(data) {
            $("#cuerpotabla").html(data);
        })
    }
    </script>
</body>

</html>