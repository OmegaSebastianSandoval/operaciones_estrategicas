<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform; ?>" data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->reor_id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->reor_id; ?>" />
			<?php } ?>
			<div class="row">
				<div class="col-2 form-group d-grid">
					<label class="control-label">Activo (Si, No)</label>
					<input type="checkbox" name="estado" value="1" class="form-control switch-form " <?php if ($this->getObjectVariable($this->content, 'estado') == 1) {
																											echo "checked";
																										} ?>></input>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			<div class="row">

				<div class="col-3 form-group">
					<label for="reor_titulo" class="control-label">t&iacute;tulo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->reor_titulo; ?>" name="reor_titulo" id="reor_titulo" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="reor_imagen">imagen</label>
					<input type="file" name="reor_imagen" id="reor_imagen" class="form-control  file-image" data-buttonName="btn-primary" accept="image/gif, image/jpg, image/jpeg, image/png">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->reor_imagen) { ?>
						<div id="imagen_reor_imagen">
							<img src="/images/<?= $this->content->reor_imagen; ?>" class="img-thumbnail thumbnail-administrator" />
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminarImagen('reor_imagen','<?php echo $this->route . "/deleteimage"; ?>')"><i class="glyphicon glyphicon-remove"></i> Eliminar Imagen</button></div>
						</div>
					<?php } ?>
				</div>
				<div class="col-3 form-group">
					<label for="fecha" class="control-label">fecha</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-calendar-alt"></i></span>
						</div>
						<input type="text" value="<?php if ($this->content->fecha) {
														echo $this->content->fecha;
													} else {
														echo date('Y-m-d');
													} ?>" name="fecha" id="fecha" class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" data-date-language="es">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="reor_arch">archivo</label>
					<input type="file" name="reor_arch" id="reor_arch" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('reor_arch');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf">
					<div class="help-block with-errors"></div>
					<?php if ($this->content->reor_arch) { ?>
						<div id="archivo_reor_arch">
							<div><?php echo $this->content->reor_arch; ?></div>
							<div><button class="btn btn-danger btn-sm" type="button" onclick="eliminararchivo('reor_arch','<?php echo $this->route . "/deletearchivo"; ?>')"><i class="glyphicon glyphicon-remove"></i> Eliminar Archivo</button></div>
						</div>
					<?php } ?>
				</div>

			
				
				<div class="col-3 form-group">
					<label for="reor_enlace" class="control-label">enlace</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->reor_enlace; ?>" name="reor_enlace" id="reor_enlace" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="reor_color_fondo" class="control-label">color fondo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->reor_color_fondo; ?>" name="reor_color_fondo" id="reor_color_fondo" class="form-control colorpicker">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-3 form-group">
					<label for="reor_vermas" class="control-label">texto ver m&aacute;s</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono "><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->reor_vermas; ?>" name="reor_vermas" id="reor_vermas" class="form-control">
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="reor_arch_nom" value="<?php echo $this->content->reor_arch_nom ?>">
				<div class="col-12 form-group">
					<label for="reor_desc" class="form-label">descripci&oacute;n</label>
					<textarea name="reor_desc" id="reor_desc" class="form-control tinyeditor" rows="10"><?= $this->content->reor_desc; ?></textarea>
					<div class="help-block with-errors"></div>
				</div>
				
			</div>
		</div>
		<div class="botones-acciones">
			<a href="<?php echo $this->route; ?>" class="btn btn-cancelar">Cancelar</a>
			<button class="btn btn-guardar" type="submit">Guardar</button>
		</div>
	</form>
</div>