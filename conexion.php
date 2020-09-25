 <?php
   if ($_GET["funcion"]==="leersalidas"){
        echo  leersalidas();
        exit;
    }
    if ($_GET["funcion"]==="guardar"){
        $barco = $_GET["barco"];
        $patron = $_GET["patron"];
        $destino = $_GET["destino"];
        $salida = $_GET["salida"];
        $llegada = $_GET["llegada"];
       echo guardar($barco,$patron,$destino,$salida,$llegada);
     //   echo   leersalidas();

      
       
//        echo   implode(",", $_GET);
      exit;
  }
    function conectar(){
            $enlace = mysqli_connect("127.0.0.1", "root", "", "club");

            if (!$enlace) {
                     exit;
            }
           return $enlace;
        }


        function guardar($barco,$patron,$destino,$salida,$llegada){
            $sql = "insert into salidas values(null,$barco,$patron,'$salida','$llegada','$destino')";
            $conn = conectar();
            $result =  mysqli_query($conn, $sql);
            return $sql;
        }




        function leerbarcos(){
        
            $sql = "SELECT * FROM barcos";
            $conn = conectar();
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $cad =  "<select id='barcos' class='form-control'><option>Seleccione Barco</option>";
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<option value = ". $row["matricula"] ."> " . $row["matricula"]. "  -- " . $row["nombre"]. 
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
                $cad =  "<select id='patron' class='form-control'><option>Seleccione capitan</option>";
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<option value = ". $row["id"] ." > " . $row["id"]. "  -- " . $row["nombres"].   "</option>";
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
               while($row = mysqli_fetch_assoc($result)) {
                  $cad = $cad ."<tr><td> " . $row["id"]. "</td>" .
                               "<td> " . $row["idbarco"]. "</td>" .
                               "<td> " . $row["fechasalida"]. "</td>" .
                               "<td> " . $row["fechaentrada"]. "</td>" .
                               "<td> " . $row["destino"]. "</td>" .
                               "<td> " . "Socio???". "</td>" .
                               "<td> " . "<button click='guardar(".$row['id'].")' id=".$row["id"]." class='btn btn-primary'>Opciones</button>". "</td></tr>" ;
                       }
               return $cad;
            }else {return "";}
            
        
        }


    

?>