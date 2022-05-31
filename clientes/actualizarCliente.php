<?php 
include("../php/conexion.php");
include("../php/cliente.php");

$conect = new Conexion();
$client = new cliente();

$id = $_GET['id'];
$consul = $client->consultarCliente($id);

$resultado = $conect->Mostrar($consul);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/estilos_inventario.css">

   

    <title>Clientes</title>

</head>
<body>


        <div class="container-fuild" >
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand text-light" href="#">Pulpo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <a class="nav-link text-light" href="../facturacion/create_invoice.php">facturacion</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="verClientes.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
            

            <li><a class="dropdown-item text-light" href="Barrios/barrios.php">Barrios</a></li>
            <li><a class="dropdown-item text-light" href="verclientes.php">Clientes</a></li>

    
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="inventario/producto/inventario.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
            

            <li><a class="dropdown-item text-light" href="../inventario/lote/verLotes.php">Lote</a></li>
            <li><a class="dropdown-item text-light" href="../inventario/provedor/verProvedor.php">Provedor</a></li>
            <li><a class="dropdown-item text-light" href="../inventario/producto/inventario.php">Productos</a></li>
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="../php/cerrarsesion.php">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <script scr="./js/boostrap.bundlee.min.js"></script>


<form action="procesoActualizar.php"  method="POST">
<table class="table table-hover">

  
  <?php 

    While ($row=Mysqli_fetch_assoc($resultado)){
      ?>
      <label class="form-label" for="">Cedula</label>  <br> 
      <input class ="form-control" type="text" value="<?php echo $row["Cedula_Cliente"];  ?>" name="cedula"> 
      <br>  
      
      <label class="form-label" for="">Nombres</label> <br> 
      <input class ="form-control" type="text" value="<?php echo $row["Nombre"];  ?>" name="nombre"> 
      <br>

      <label class="form-label" for="">Apellidos</label> <br> 
      <input class ="form-control" type="text" value="<?php echo $row["Apellidos"]; ?>" name="apellido">  
      <br> 

      <label class="form-label" for="">Direccion</label>  <br> 
      <input class ="form-control" type="text" value="<?php echo $row["Direccion"]; ?>" name="direc">
      <br>  

      <label class="form-label" for="">Telefono</label><br>  
      <input class ="form-control" type="text" value="<?php echo $row["Telefono"];  ?>" name="tel">
      <br>

      <label class="form-label" for="">Barrio</label><br> 
      <?php        
$sql = "SELECT * FROM barrio";            

$query = $conect->login($sql);
                        

$result = mysqli_num_rows($query);

?>
    <Select class="form-select" name="barrio" id="barrio">
      <?php
            if($result > 0){

while ($cliente = mysqli_fetch_array($query)){
    

?>
<option value="<?php echo $cliente["ID_Barrio"];?>"><?php echo $cliente["Nombre_barrio"];?></option>

<?php
}

            }
            ?>
  
  
     
    
    
    
    

    <?php 
    
    } mysqli_free_result($resultado);
    ?>
    
    </table> 
  </form>
    <a class="btn btn-secondary" href="ingresarCliente.php"> Ver clientes</a>
    <input type="submit" value="Actualizar" class="btn btn-primary" name="actualizar">

</body>
</html>