<?php 
include("../../php/conexion.php");
include("../../php/provedor.php");

$conect = new Conexion();
$prov = new provedor();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../../css/estilos_inventario.css">
    <title>
      Provedor
    </title>

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
        <a class="nav-link text-light" href="../../facturacion/create_invoice.php">facturacion</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="verClientes.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Clientes
          </a>
          <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
            

            <li><a class="dropdown-item text-light" href="../../clientes/Barrios/barrios.php">Barrios</a></li>
            <li><a class="dropdown-item text-light" href="../../clientes/verClientes.php">Clientes</a></li>

    
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-light" href="inventario/producto/inventario.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Inventario
          </a>
          <ul class="dropdown-menu bg-secondary" aria-labelledby="navbarDropdown">
            

            <li><a class="dropdown-item text-light" href="../lote/verLotes.php">Lote</a></li>
            <li><a class="dropdown-item text-light" href="verProvedor.php">Provedor</a></li>
            <li><a class="dropdown-item text-light" href="../producto/inventario.php">Productos</a></li>
          </ul>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="../../php/cerrarsesion.php">Cerrar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
        <script scr="./js/boostrap.bundlee.min.js"></script>

<form class="row g-0" action="buscar.php" method="get">

<input class="form-control " type="text" name="buscar" id="buscar" placeholder="buscar" >
<input class="btn btn-primary mb-1" type="submit" value="buscar"> 
</form>

<form class="row g-0" action="ingresarProve.php">

<input type="submit" class="btn btn-secondary" value="Ingresar Provedor">
</form>
<table class="table table-hover">
   
   
      <tr>
    
        <td>Id lote</td>
        <td>Fecha vencimiento</td>
        <td>ID provedor</td>
        <td>Stock</td>
        <td>Id producto</td>
        <td>Operacion</td>
      </tr>
 
    
    <?php 
    
$consul = $prov->readProvedor();

$resultado = $conect->Mostrar($consul);
 
    While ($row=Mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
   
    <td> <?php echo $row["NiT_provedor"];  ?></td>
    <td> <?php echo $row["Nombre"];  ?></td>
    <td> <?php echo $row["Telefono"];   ?></td>
    <td> <?php echo $row["Correo"];  ?></td>
    <td> <?php echo $row["Dirrecion"];  ?></td>
    <td> <a  class="btn btn-secondary" href="actualizarProve.php? id=<?php echo $row["NiT_provedor"] ?>"> Editar</a>
    <a  onclick=" return borrar()" class="btn btn-secondary eliminar" href="procesoEliminar.php?id=<?php echo $row["NiT_provedor"]  ?>" > Eliminar</a></td>

    
    </tr> 
    </center>
    <?php 
    
    } mysqli_free_result($resultado);
    ?>

<script type="text/javascript">
  
  
  function borrar() {
    
    if(confirm("Realmente desea eliminar?"))
    {
        return true;
    }
    return false;
}

</script>
    </body>
</html>