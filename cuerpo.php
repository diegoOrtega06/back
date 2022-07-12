<?php 


include ("conexion.php");


session_start();
//$_SESSION['matricula'] = "matri";
//echo $_SESSION ['matricula'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script>



<title>Insertar Datos</title>
</head>
<body>



<div class="container m-5">


 <?php 
//valida
$con=conexion();
if (isset($_POST["nombres"])){
$sql = 'INSERT INTO alumnos (nombres, apellidoP, apellidoM, matricula, telefonoF, telefonoC, telefonoT, correoP, correoI, programaE, añoI, añoE, sexo, fechaN, lugarN, estadoC, idiomaN, otroI, discapacidadN)
VALUES(\''.$_POST["nombres"].'\',\''.$_POST["apellidoP"].'\',\''.$_POST["apellidoM"].'\',\''.$_POST["matricula"].'\',\''.$_POST["telefonoF"].'\',\''.$_POST["telefonoC"].'\',\''.$_POST["telefonoT"].'\',\''.$_POST["correoP"].'\',\''.$_POST["correoI"].'\',\''.$_POST["programaE"].'\',\''.$_POST["añoI"].'\',\''.$_POST["añoE"].'\',\''.$_POST["sexo"].'\',\''.$_POST["fechaN"].'\',\''.$_POST["lugarN"].'\',\''.$_POST["estadoC"].'\',\''.$_POST["idiomaN"].'\',\''.$_POST["otroI"].'\',\''.$_POST["discapacidadN"].'\')';
$query=mysqli_query($con,$sql);


$_SESSION['matricula'] = $_POST["matricula"];
 var_dump ($_SESSION['matricula']);
 echo $_SESSION ['matricula'];

 ?>
  <div class="card p-3">
  <p class="text-success">
  <?php if ($query){
  echo 'Los datos se han insertado correctamente!';
  }else{
  echo 'Algo ha salido mal!!!!';
   }
   }
  ?>
  
  </p>
  </div>
  
  

 


<form class="row g-3 needs-validation" action="alumnos.php" method="POST" novalidate>

  <div class="col-md-6">
    <label for="validationCustom01" class="form-label">1.- Nombre(s)</label>
    <input type="text" class="form-control" id="validationCustom01" name="nombres"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su nombre.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">2.- Apellido Paterno</label>
    <input type="text" class="form-control" id="validationCustom02" name="apellidoP"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte sus apellidos.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">3.- Apellido Materno</label>
    <input type="text" class="form-control" id="validationCustom02" name="apellidoM"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte sus apellidos.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">4.- Matricula</label>
    <input maxlength="10" minlength="10" type="text" class="form-control" id="validationCustom02" name="matricula"  required="" pattern="[0-9]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Matricula.
      </div>
  </div>

  <div class="col-md-6">
    <label class="form-label">5.- Telefono Fijo</label>
    <input maxlength="10" minlength="10" type="text" class="form-control" id="validationCustom02" name="telefonoF" pattern="[0-9]+" >
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">6.- Telefono Celular</label>
    <input maxlength="10" minlength="10" type="text" class="form-control" id="validationCustom02" name="telefonoC"  required="" pattern="[0-9]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Telefono Celular.
      </div>
  </div>

  <div class="col-md-6">
    <label class="form-label">7.- Telefono del Trabajo</label>
    <input  maxlength="10" minlength="10" type="text" class="form-control" id="validationCustom02" name="telefonoT" pattern="[0-9]+">
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">8.- Correo Personal</label>
    <input type="email" class="form-control" id="validationCustom02" name="correoP" required="" style="text-align: center;" value placeholder="ejemplo@eje.com">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Correo Personal.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">9.- Correo Institucional</label>
    <input style="text-align: center;" type="email" class="form-control" id="validationCustom02" name="correoI"  required="" value placeholder="ejemplo@eje.com">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte sus Correo Institucional.
      </div>
  </div>

    <div>
      <label>10.- Programa educativo:</label>
      <select name="programaE"> 
        <?php
         $con=conexion();
         #consulta de los programas educativos
         $sql='SELECT * FROM programa_educativo';
         $query=mysqli_query($con,$sql);
         while($row=mysqli_fetch_array($query)){
           $idprograma=$row['id_programa'];
           $nombreedu=$row['nombreP'];
          ?>
           <option value="<?php echo $idprograma?>"><?php echo $nombreedu ?></option>
        <?php
         }
        ?>
    </select>
  </div>
  
       
    

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">11.- Año de ingreso a la universidad</label>
    <input maxlength="4" minlength="4" type="text" class="form-control" id="validationCustom02" name="añoI"  required="" pattern="[0-9]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Estado.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">12.- Año de egreso </label>
    <input maxlength="4" minlength="4" type="text" class="form-control" id="validationCustom02" name="añoE" required="" pattern="[0-9]+" >
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Municipio.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">13.- Sexo</label>
    <input type="text" class="form-control" id="validationCustom02" name="sexo"  required="" pattern="[a-z A-Z]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Localidad.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">14.- Fecha de nacimiento</label>
    <input type="date" class="form-control" id="validationCustom02" name="fechaN"  required>
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Calle.
      </div>
  </div>


  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">15.- Lugar de nacimiento</label>
    <input type="text" class="form-control" id="validationCustom02" name="lugarN"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Numero Exterior.
      </div>
  </div>


  <div class="col-md-6">
  <label>16.-Estado civil:</label>
      <select name="estadoC"> 
        <?php
         $con=conexion();
         #consulta de los programas educativos
         $sql='SELECT * FROM civil';
         $query=mysqli_query($con,$sql);
         while($row=mysqli_fetch_array($query)){
           $idprograma=$row['id_estadoC'];
           $nombreedu=$row['estadoC'];
          ?>
           <option value="<?php echo $idprograma?>"><?php echo $nombreedu ?></option>
        <?php
         }
        ?>
    </select>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">17.- Idioma Natal</label>
    <input type="text" class="form-control" id="validationCustom02" name="idiomaN"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+" >
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte su Codigo Postal.
      </div>
  </div>

  <div class="col-md-6">
    <label for="validationCustom02" class="form-label">Otro idioma</label>
    <input type="text" class="form-control" id="validationCustom02" name="otroI"  required="" pattern="[a-zA-Z á é í ó ú ñ ï ü]+">
    <div class="valid-feedback">
    Correcto!
    </div>
      <div class="invalid-feedback">
      Por favor, inserte algunas Referencias.
      </div>
 </div>

  <div class="col-md-6">
  <label>19.-Discapacidad de nacimiento:</label>
      <select name="discapacidadN"> 
        <?php
         $con=conexion();
         #consulta de los programas educativos
         $sql='SELECT * FROM discapacidad';
         $query=mysqli_query($con,$sql);
         while($row=mysqli_fetch_array($query)){
           $idprograma=$row['id_discapacidad'];
           $nombreedu=$row['discapacidad'];
          ?>
           <option value="<?php echo $idprograma?>"><?php echo $nombreedu ?></option>
        <?php
         }
        ?>
    </select>
  </div>
  

      

    <div class="col-12">
      <button class="btn btn-primary" type="submit">Enviar</button>
  </div>
</form>

<form class="row g-3 needs-validation" action="caracteristicas.php" method="POST" novalidate>
<div class="col-12">
      <button class="btn btn-primary" type="submit">Siguiente</button>
  </div>

</form>




<script>
(function () {
  'use strict'
  
  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
</script>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>

</body>
</html>
