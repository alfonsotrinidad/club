 <?php
   if ($_GET["funcion"]==="leersalidas"){
        echo  leersalidas();
        exit;
    }
    function conectar(){
            $enlace = mysqli_connect("127.0.0.1", "root", "", "club");

            if (!$enlace) {
                     exit;
            }
           return $enlace;
        }





        function leerusuarios(){
        
            $sql = "SELECT * FROM barcos";
            $conn = conectar();
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $cad =  "<select class='form-control'><option>Seleccione Barco</option>";
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<option> " . $row["matricula"]. "  -- " . $row["nombre"]. 
                    "</option>";
               }
               $cad = $cad . "</select>";
               return $cad;
            } else {
               return "";
            }
        }



        function leercapitanes(){
        
            $sql = "SELECT * FROM capitanes";
            $conn = conectar();
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $cad =  "<select class='form-control'><option>Seleccione capitan</option>";
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<option> " . $row["id"]. "  -- " . $row["nombres"].   "</option>";
               }
               $cad = $cad . "</select>";
               return $cad;
            } else {
               return "";
            }
        }

        function leersalidas(){
        
            $sql = "SELECT * FROM salidas";
            $conn = conectar();
            $result = mysqli_query($conn, $sql);
            $cad="";
            if (mysqli_num_rows($result) > 0) {
                $cad =  "";
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<tr><td> " . $row["id"]. "</td>" .
                               "<td> " . $row["idbarco"]. "</td>" .
                               "<td> " . $row["fechasalida"]. "</td>" .
                               "<td> " . $row["fechaentrada"]. "</td>" .
                               "<td> " . $row["destino"]. "</td>" .
                               "<td> " . "Socio???". "</td>" .
                               "<td> " . "<button class='btn btn-primary'>Opciones</button>". "</td></tr>" ;
                       }
               return $cad;
            }else {return "";}
            
        
        }


?>
