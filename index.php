<?php include_once 'includes/templates/header.php'; ?>

  <section class="seccion contenedor">
    <h2> FIESA Mar del Plata 2021</h2>
      <p>
        La Feria Internacional de Educación Superior Argentina (FIESA) es un encuentro internacional de Instituciones de Educación Superior que tendrá a la Universidad Nacional de Mar del Plata y a la Ciudad de Mar del Plata como anfitrionas y reunirá a referentes de todo el mundo.
      </p>
  </section> <!--seccion-->

  <section id="programa" class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video> 
    </div><!--contenedor video-->

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del Evento</h2>
          
          <?php
             try{
                require_once('includes/funciones/conexionBDD.php');
                $sql="
                SELECT DISTINCT nombre, icono
                FROM categoria_act c, actividad a
                WHERE c.id_categoria=a.id_categoria";
                $tuplas_cat= $db->query($sql);
             }
             catch (Exception $e){
               $error= $e->getMessage();
             }
          ?>
          
          <nav class="menu-programa">

             <?php
                while ($categorias = $tuplas_cat->fetch_assoc()){
                  ?>
                  <a href="#<?php echo $categorias['nombre']; ?>"><i class="fa <?php echo $categorias['icono']; ?>">
                  </i><?php echo $categorias['nombre']; ?></a>
                <?php }
             ?>
            
          </nav>
          <div id="Charla" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3> Modelos Internacionales de Gestión de Calidad</h3>
              <p><i class="fa fa-clock"></i>10:00 hs </p>
              <p><i class="fa fa-calendar"></i>16 de Marzo </p>
              <p><i class="fa fa-user"></i> JOSÉ ARNAEZ VADILLO (ANECA, España)</p>
            </div>
            <div class="detalle-evento">
              <h3> Competencias Internacionales e Inserción Laboral </h3>
              <p><i class="fa fa-clock"></i>15:00 hs </p>
              <p><i class="fa fa-calendar"></i>17 de Marzo</p>
              <p><i class="fa fa-user"></i> FLORENCIA INCAUGARAT (UNMDP, Argentina)</p>
            </div>
            <a href="#" class="button float-right">Ver Todos</a>

          </div><!--#charlas-->
          <div id="Seminario" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3> Facultad de Ingenieria</h3>
              <p><i class="fa fa-clock"></i>13:00 hs </p>
              <p><i class="fa fa-calendar"></i>16 de Marzo </p>
              <p><i class="fa fa-user"></i> Felipe Evans UNMDP</p>
            </div>
            <div class="detalle-evento">
              <h3> Universidad Caece </h3>
              <p><i class="fa fa-clock"></i>16:00 hs </p>
              <p><i class="fa fa-calendar"></i>17 de Marzo</p>
              <p><i class="fa fa-user"></i> Maria Perez </p>
            </div>
            <a href="#" class="button float-right">Ver Todos</a>

          </div><!--#stands-->
        </div><!--programa evento-->
      </div><!--contenedor-->
    </div><!--contenido-programa-->

  </section><!--programa-->

  <?php include_once 'includes/templates/oradores.php'; ?> 
  <!-- <section id="invitados" class="invitados contenedor seccion">
    <h2>Nuestros Oradores</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="imagen invitado">
          <p> Juan Sanchez </p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="imagen invitado">
          <p> Maria Garcia </p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="imagen invitado">
          <p> Facundo Perez </p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="imagen invitado">
          <p> Fernanda Lopez </p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="imagen invitado">
          <p> Franco Rossi </p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="imagen invitado">
          <p> Mirta Gonzales </p>
        </div>
      </li>
    </ul>
  </section> -->


<!-- CONTADOR EVENTO -->
 <!--  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li><p class="numero"></p>Participantes</li>
        <li><p class="numero"></p>Univeridades</li>
        <li><p class="numero"></p>Países</li>
        <li><p class="numero"></p>Stands</li>
      </ul>
    </div>
  </div> -->

<!-- <section class="precios seccion">
  <h2> Precios </h2>
  <div class="contenedor">
    <ul class="lista-precios clearfix">
      <li>
        <div class="tabla-precio">
          <h3>Estudiante</h3>
          <p class="numero">$0</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Docente</h3>
          <p class="numero">$0</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
      <li>
        <div class="tabla-precio">
          <h3>Externo</h3>
          <p class="numero">$500</p>
          <ul>
            <li>Bocadillos gratis</li>
            <li>Todas las conferencias</li>
            <li>Todos los talleres</li>
          </ul>
          <a href="#" class="button hollow">Comprar</a>
        </div>
      </li>
    </ul>
  </div>
</section> -->


  
  <div id="mapa" class="mapa">
    
  </div>


  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p>dias</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
      </ul>
    </div>
  </section>


  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p> Registrate al newsletter</p>
      <h3>FIESA UNMDP</h3>
      <a href="#" class="button transparente">Registro</a>
    </div><!--contenido-->
  </div><!--newsletter-->
  

  <?php include_once 'includes/templates/footer.php'; ?>