<?php
echo $this->banner;
?>
<section class="">
    <?php
    echo $this->contenido;
    ?>
</section>
<div class="container">
    <div class="row">
        <?php foreach ($this->reorganizacion as $key => $reor) { ?>

            <div class="modal fade modalreorganizacion" id="modalreor<?php echo $reor->reor_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-dialog-centered">
                    <div class="modal-content bg-transparent" style="border: none;">
                        <div class="modal-header px-0 bg-transparent border-0">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
                        </div>
                        <div class="modal-body  bg-white  pb-1">


                            <div class="list">
                                <h2><i class="fa-solid fa-file"></i> Documentos</h2>
                                <ul>
                                    <?php foreach ($reor->archivos as $key => $value) { ?>
                                        <li> <a href="/files/<?php echo $value->archivo ?>" target="_blank">
                                                <?php if ($value->archivo) { ?>
                                                    <i class="fas fa-file-upload"></i>
                                                <?php } ?>
                                                <?php echo $value->titulo ?></a></li>
                                    <?php } ?>


                                </ul>
                            </div>

                        </div>
                        <div class="modal-footer  bg-white border-0 pt-0 rounded-0">
                            <button type="button" class="btn btn-secondary px-4 " data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php foreach ($this->reorganizacion as $key => $reor) { ?>

            <div class="col-6 col-lg-4 ">


                <article class="card_r w-100 shadow">

                    <div class="temporary_text">
                        <?php if ($reor->reor_imagen) { ?>
                            <img src="/images/<?php echo $reor->reor_imagen ?>" alt="Imagen de <?php echo $reor->reor_titulo ?>">
                        <?php } else { ?>
                            <img src="/assets/service.jpg" alt="Imagen en blanco">
                        <?php } ?>

                    </div>
                    <div class="card_content">

                        <span class="card_date"><?php echo $reor->fecha ?></span>

                        <span class="card_title"><?php echo $reor->reor_titulo ?></span>
                        <span class="card_subtitle"><?php echo $reor->reor_desc ?>
                        </span>
                        <div class="card_description">
                            <?php if (count($reor->archivos) >= 1) { ?>

                                <button class="btn-blue  w-100 p-2 d-inline-block h-100 fs-6 rounded text-center" data-bs-toggle="modal" data-bs-target="#modalreor<?php echo $reor->reor_id ?>">Documentos</button>

                            <?php } ?>


                            <?php if ($reor->reor_enlace) { ?>

                                <a class="btn-orange  w-100 p-2 d-inline-block h-100 rounded text-center fs-6" target="_blank" href="<?php echo $reor->reor_enlace ?>">Baranda Virtual</a>

                            <?php } ?>
                        </div>
                    </div>
                </article>
            </div>

        <?php } ?>
    </div>
</div>

<style>
    .main-general {
        z-index: auto;
    }
</style>