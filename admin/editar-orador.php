<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
try {
  include_once 'funciones/funciones.php';
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

$permiso = $_SESSION['permiso'];
$id_orador =  $_GET['id'];
$id_evento = $_SESSION['id_evento'];

if (!filter_var($id_orador,FILTER_VALIDATE_INT)){
  die("Error");
}
?>


<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <?php
    include_once 'templates/barra.php';
    ?>

    <!-- =============================================== -->
    <?php
    include_once 'templates/navegacion.php';
    ?>
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Editar orador
        </h1>
      </section>

      <div class="centrar-contenido">
        <!-- Main content -->
        <div class="row col-md-6">
          <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Edite la información</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                <!-- CUERPO -->
                <?php
                  try {
                    $sql = "
                      SELECT o.id_orador, o.nombre, o.apellido, o.dni, o.biografia, o.imagen
                      FROM orador o
                      WHERE o.id_orador=" . $id_orador;
                    $tuplas = $db->query($sql);
                    $orador = $tuplas->fetch_assoc();
                  } catch (Exception $e) {
                    echo "Error: " . $e->getMessage();
                  }
                ?>
                <div class="box box-info">
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" name="editar-orador" id="editar-orador" method="post" action="control-evento.php" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="nombre" class="control-label">Nombre</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $orador['nombre']; ?>">
                        <label for="apellido" class="control-label">Apellido</label>
                        <input name="apellido" type="text" class="form-control" id="apellido" placeholder="Apellido" value="<?php echo $orador['apellido'];?>">
                      </div>
                      <div class="form-group">
                        <label for="dni" class="control-label">DNI</label>
                        <input name="dni" type="number" class="form-control" id="dni" placeholder="DNI" value="<?php echo $orador['dni'];?>">
                      </div>
                      <div class="form-group">
                        <label for="biografia" class="control-label">Biografía</label>
                        <textarea name="biografia" type="text" class="form-control" rows="3" id="biografia" placeholder="Biografía del orador"><?php echo $orador['biografia'];?></textarea>
                      </div>
                      <div class="form-group">
                        <label>Actividades dictadas</label>
                        <select name="actividades[]" id="actividades" class="form-control select2" multiple="multiple" data-placeholder="Selecciones las actividades" style="width: 100%;">
                          <?php
                          try {
                            //actividades actuales del orador
                            $sql_act = "
                            SELECT a.nombre_act, a.id_actividad
                            FROM dicta d INNER JOIN actividad a ON a.id_actividad=d.id_actividad
                            WHERE d.id_orador=" . $id_orador . "
                            ORDER BY a.nombre_act";
                            $tuplas_act = $db->query($sql_act);


                            $sql = "
                            SELECT a.id_actividad, a.nombre_act
                            FROM actividad a
                            WHERE a.id_evento=" . $id_evento . "
                            ORDER BY a.nombre_act";
                            $tuplas = $db->query($sql);
                          } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                          }

                          while ($actividades = $tuplas->fetch_assoc()) {
                            $act= $tuplas_act->fetch_assoc();
                            if ($act && $actividades['id_actividad'] == $act['id_actividad']) {
                              ?>
                                  <option value="<?php echo $actividades['id_actividad']; ?>" selected><?php echo $actividades['nombre_act']; ?></option>
                                <?php
                            } else {
                                ?>
                                  <option value="<?php echo $actividades['id_actividad']; ?>"><?php echo $actividades['nombre_act']; ?></option>
                              <?php
                             } //if
                            } //while
                              ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="imagen">Foto actual</label>
                        <br>
                        <img src="../img/oradores/<?php echo $orador['imagen'];?>" width="40%" alt=" Foto del orador">
                      </div>
                      <div class="form-group">
                        <label for="imagen">Actualizar foto</label>
                        <input type="file" id="imagen" name="imagen">
                      </div>
                      <div id="error" style="display: none"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="hidden" name="editar-orador" value="1">
                      <input type="hidden" name="id_orador" value="<?php echo $id_orador?>">
                      <button type="submit" class="btn btn-info pull-right">Guardar</button>
                    </div>
                    <!-- /.box-footer -->
                  </form>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </section>
          <!-- /.content -->
        </div> <!-- row -->

      </div>


    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once 'templates/footer.php';
    ?>