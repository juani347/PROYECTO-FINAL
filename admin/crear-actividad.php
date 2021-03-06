<?php
include_once 'funciones/sesion-admin.php';
include_once 'templates/header.php';
try {
  include_once 'funciones/funciones.php';
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

$permiso = $_SESSION['permiso'];
$id_evento = $_SESSION['id_evento'];
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
          Nueva actividad
        </h1>
      </section>

      <div class="row centrar-contenido">
        <!-- Main content -->
        <div class="col-lg-6">
          <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Complete el formulario <span style="font-size: 15px;">( * campo obligatorio )</span></h3>
              </div>
              <div class="box-body">
                <!-- CUERPO -->

                <div class="box box-info">
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form class="form-horizontal" name="crear-actividad" id="crear-actividad" method="post" action="control-evento.php">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="nombre" class="control-label">Nombre *</label>
                        <input name="nombre" type="text" class="form-control" id="nombre" required placeholder="Nombre de la actividad">
                      </div>
                      <div class="form-group">
                        <label for="categoria" class="control-label">Categoría *</label>
                        <select name="categoria" class="form-control select2" id="categoria" required placeholder="categoria" style="width: 100%;">
                          <option value="">- Seleccione -</option>
                          <?php
                          try {
                            $sql = "
                          SELECT c.id_categoria, c.nombre
                          FROM categoria_act c";
                            $tuplas = $db->query($sql);
                          } catch (Exception $e) {
                            echo "Error: " . $e->getMessage();
                          }

                          while ($categoria = $tuplas->fetch_assoc()) {
                          ?>
                            <option value="<?php echo $categoria['id_categoria']; ?>"><?php echo $categoria['nombre']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="descripcion" class="control-label">Descripción *</label>
                        <textarea name="descripcion" type="text" class="form-control" rows="3" required  id="descripcion" placeholder="Descripción de la actividad"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="nombre" class="control-label">Fecha *</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" required name="fecha">
                        </div>
                      </div>
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>Hora inicio *</label>
                          <div class="input-group">
                            <input type="text" class="form-control timepicker" id="hora_inicio" required name="hora_inicio">

                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <div class="bootstrap-timepicker">
                        <div class="form-group">
                          <label>Hora fin *</label>
                          <div class="input-group">
                            <input type="text" class="form-control timepicker" id="hora_fin" required name="hora_fin">

                            <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                            </div>
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <div id="error" style="display: none"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <input type="hidden" name="crear-actividad" value="1">
                      <button type="submit" class="btn btn-info pull-right">Añadir</button>
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