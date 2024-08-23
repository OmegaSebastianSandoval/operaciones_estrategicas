
<h1 class="titulo-principal"><i class="fas fa-cogs"></i> <?php echo $this->titlesection; ?></h1>
<div class="container-fluid">
	<form class="text-left" enctype="multipart/form-data" method="post" action="<?php echo $this->routeform;?>"  data-bs-toggle="validator">
		<div class="content-dashboard">
			<input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
			<input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">
			<?php if ($this->content->id) { ?>
				<input type="hidden" name="id" id="id" value="<?= $this->content->id; ?>" />
			<?php }?>
			<div class="row">
				<div class="col-6 form-group">
					<label for="titulo"  class="control-label">titulo</label>
					<label class="input-group">
						<div class="input-group-prepend">
							<span class="input-group-text input-icono " ><i class="fas fa-pencil-alt"></i></span>
						</div>
						<input type="text" value="<?= $this->content->titulo; ?>" name="titulo" id="titulo" class="form-control"   >
					</label>
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-6 form-group">
					<label for="archivo" >archivo</label>
					<input type="file" name="archivo" id="archivo" class="form-control  file-document" data-buttonName="btn-primary" onchange="validardocumento('archivo');" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf" >
					<div class="help-block with-errors"></div>
				</div>
				<input type="hidden" name="pertenecea"  value="<?php if($this->content->pertenecea){ echo $this->content->pertenecea; } else { echo $this->pertenecea; } ?>">
			</div>
		</div>
		<div class="botones-acciones">
			<a href="<?php echo $this->route; ?>?pertenecea=<?php if($this->content->pertenecea){ echo $this->content->pertenecea; } else { echo $this->pertenecea; } ?>" class="btn btn-cancelar">Cancelar</a>
			<button class="btn btn-guardar" type="submit">Guardar</button>
		</div>
	</form>
</div>