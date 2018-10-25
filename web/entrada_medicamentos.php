<?php
include '../include/dbconnect.php';
session_start();


      if (!empty($_SESSION['user']))
        {


        $query = "
        SELECT IdMedicamento as IDMEDICAMENTO, NombreMedicamento as NOMBRE FROM medicamentos ORDER BY IdMedicamento asc
        ";
        $resultado = $mysqli->query($query);
        $id = $_SESSION['IdUsuario'];


?>

<!DOCTYPE html>
<html>
<head>
</head>
<?php  include '../include/asset.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<?php include '../include/header.php'; ?>
<?php include '../include/aside.php'; ?>

    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
    </section>

    <!-- Main content -->
    <section class="content">
         <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title">Entrada de Nuevos Lotes</h3>
                    </div>
                  <div class="box-body">

                     <form  method="post" id="demo-form" action="guardar_entradas.php" >

                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Medicamento
                                    </label>
                                    <div class="col-sm-4">
                                       <select class="form-control select2" style="width: 100%;" name = "id_medicamento">
                                          <option value = '' selected>Elija... </option>
                                                <?php
                                                while ($row = $resultado->fetch_assoc()) {
                                                echo "<option value = '".$row['IDMEDICAMENTO']."'>".$row['NOMBRE']."</option>";
                                                                                                      }
                                                ?>
                                          </select>
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Codigo 
                                    </label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="codigo_medicamento" ">
                                    </div>
                                    
                                  </div>

                                </div>
                              </div>
                              <div class="col-md-6">
                              <div class="form-horizontal" role="form">
                              <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Fecha de Vencimiento
                                    </label>
                                    <div class="col-sm-4">
                                    <input type="text" class="form-control"  data-inputmask="'alias': 'yyyy/mm/dd'" data-mask name="fecha_vencimiento" >
                                    </div>
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Cantidad
                                    </label>
                                    <div class="input-group col-sm-2">
                                      <input type="text" class="form-control"  name="cantidad" >
                                    </div>
                            </div>
                            <div class="form-group">
                              <div class="form-group hidden">
                                <div class="col-sm-5"><input type="text"  name="txtid" value="<?php echo $id ?>">  </div>
                              </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-horizontal" role="form">
                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">
                                    Costo
                                    </label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control" name="costo_unitario" ">
                                    </div>
                                    <div class="col-sm-2">
                                    </div>
                                    <div class="col-sm-4">
                                      <button type="submit" class="btn btn-success" >Guardar </button>
                                    </div>    
                                    
                                  </div>

                                </div>
                              </div>
                            </div>

                            
                        </form>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
         
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>

  <?php include '../include/footer.php'; ?>
  </section>
  </body>
  <!-- Main content -->
  </html>

<?php
}
else{
  echo "
  <script>
    alert('No ha iniciado sesion');
    document.location='../index.php';
  </script>
  ";
}
?>