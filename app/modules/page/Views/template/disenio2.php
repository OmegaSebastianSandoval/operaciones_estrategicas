<div  data-aos="" class="caja-contenido-simple design-two" style="background-color: <?php if ($contenido->contenido_fondo_color) {
																			echo  $contenido->contenido_fondo_color;
																		} else if ($colorfondo) {
																			echo $colorfondo;
																		}   ?>">

	<div class="row">
		<?php if ($contenido->contenido_imagen) { ?>
			<div class="col-12 col-md-5">
				<div class="cont-image"><img src="/images/<?php echo $contenido->contenido_imagen; ?>"></div>
			</div>
		<?php } ?>
		<div <?php if ($contenido->contenido_imagen) { ?>class="col-12 col-md-7" <?php } else { ?>class="col-12" <?php } ?>>
			<?php if ($contenido->contenido_titulo_ver == 1) { ?>
				<h2><?php echo $contenido->contenido_titulo; ?></h2>
			<?php } ?>
			<div class="descripcion">
				<?php echo $contenido->contenido_descripcion; ?>
			</div>
			<?php if ($contenido->contenido_archivo) { ?>
				<div align="center" class="archivo">
					<a href="/files/<?php echo $contenido->contenido_archivo ?>" target="blank">Descargar Archivo <i class="fas fa-download"></i></a>
				</div>
			<?php } ?>
			<div>
				<?php if ($contenido->contenido_enlace) { ?>
					<a href="" class="btn-orange" <?php if ($contenido->contenido_enlace_abrir == 1) { ?> target="blank" <?php } ?>> <?php if ($contenido->contenido_vermas) { ?><?php echo $contenido->contenido_vermas; ?><?php } else { ?>Ver Más<?php } ?></a>
				<?php } ?>
			</div>
		</div>

	</div>
</div>