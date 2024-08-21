<div class="slider-internas">

    <div id="carouselprincipal<?php echo $this->seccionbanner;  ?>" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
            <?php foreach ($this->banners as $key => $banner) { ?>
                <div class="carousel-item <?php if ($key == 0) { ?>active <?php } ?>">

                    <?php if ($this->id_youtube($banner->publicidad_video) != false) { ?>
                        <!-- <div class="fondo-video-youtube">
                            <div class="banner-video-youtube" id="videobanner<?php echo $banner->publicidad_id; ?> " data-video="<?php echo $this->id_youtube($banner->publicidad_video); ?>"></div>
                        </div> -->
                        <div class="fondo-imagen-interna fondo-imagen-interna-video">
                            <a href="<?php echo $banner->publicidad_video; ?>" data-fancybox="gallery">
                                <img class="img-banner-interna img-video" src="/images/<?php echo $banner->publicidad_imagen; ?>" />
                                <div class="play-icon">▶️</div>
                            </a>
                        </div>

                    <?php } else { ?>

                        <div class="fondo-imagen-interna d-none d-sm-flex justify-content-end align-items-center">

                            <img src="/images/<?php echo $banner->publicidad_imagen; ?>" alt="" class="img-banner-interna">
                            <!-- <h2><?php echo $banner->publicidad_nombre; ?></h2> -->

                            <?php if ($banner->mostrarinfo == 1) { ?>

                                <div class="contenido-banner">

                                    <h4><?php echo $banner->publicidad_nombre; ?></h4>
                                    <?php echo $banner->publicidad_descripcion; ?>
                                    <?php if ($banner->publicidad_enlace) { ?>
                                        <a href="<?php echo $banner->publicidad_enlace; ?>" <?php echo $banner->publicidad_tipo_enlace == 1 ? 'target="_blank"' : ''; ?> class="btn-azul">
                                            <?php echo $banner->publicidad_texto_enlace  ? $banner->publicidad_texto_enlace : 'Ver más'; ?>

                                        </a>
                                    <?php } ?>

                                </div>
                            <?php } ?>


                        </div>

                        <div class="fondo-imagen-responsive d-sm-none d-flex justify-content-center align-items-center">
                            <img src="/images/<?php echo $banner->publicidad_imagenresponsive; ?>" alt="" class="img-banner-internas w-100">
                            <h2 class="titulo-banner-internas"><?php echo $banner->publicidad_nombre; ?></h2>
                        </div>

                    <?php } ?>




                </div>
            <?php } ?>
        </div>
        <?php if (count($this->banners) > 1) { ?>

            <button type="button" class="carousel-control-prev" data-bs-target="#carouselprincipal<?php echo $this->seccionbanner;  ?>" data-bs-slide="prev">
                <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
                <i class="fa-solid fa-location-arrow carousel-control-prev-icono"></i>
            </button>

            <button type="button" class="carousel-control-next" data-bs-target="#carouselprincipal<?php echo $this->seccionbanner;  ?>" data-bs-slide="next">
                <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
                <i class="fa-solid fa-location-arrow carousel-control-next-icono"></i>
            </button>
        <?php } ?>

    </div>
</div>
