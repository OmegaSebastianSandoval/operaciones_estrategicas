<script>
    $(document).ready(function() {
        <?php if ($this->popup->publicidad_estado == 1) { ?>
            $("#popup").modal("show");
        <?php } ?>

    });
</script>
<?php echo $this->banner; ?>

<section class="content-home">

    <div class="content-us">
        <?php echo $this->quienessomos; ?>
    </div>

    <?php echo $this->contenido; ?>

    <section id="14"  class="id_14  contenedor-seccion  ">
        <div class="content-box container">
            <div class="row  justify-content-start text-left ">
                <?php foreach ($this->services as $service) { ?>
                    <div class="col-sm-3"  data-aos="zoom-in-up">
                        <div class="caja-contenido-simple p-0 design-four four-15 my-1">

                            <div class="imagen-contenido">
                                <img src="/images/<?= $service->contenido_imagen ?>" loading="lazy">
                            </div>


                            <div class="content-body">
                                <h2><?= $service->contenido_titulo ?></h2>
                                <div class="descripcion">
                                    <?= $service->contenido_introduccion ?>
                                </div>

                                <div class="d-flex justify-content-center">

                                    <a href="/page/servicios?service=<?= $service->contenido_id ?>" class="btn-blue rounded-0 mx-auto mt-3 p-2 px-4 d-inline-block"> LEER MÁS</a>
                                </div>

                            </div>
                        </div>

                    </div>
                <?php } ?>

            </div>
        </div>
    </section>

    <?php echo $this->formulario; ?>
</section>