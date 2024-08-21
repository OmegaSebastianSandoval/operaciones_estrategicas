<div class="container">
    <div class="media">
        <span class="text-thin d-block text-gray">
            Síguenos en:
        </span>
        <div class="d-flex gap-3">

            <?php if ($this->infopage->info_pagina_youtube) { ?>
                <a href="<?php echo $this->infopage->info_pagina_youtube ?>" target="_blank">
                    <i class="fa-brands fa-youtube"></i>
                </a>

            <?php } ?>
            <?php if ($this->infopage->info_pagina_facebook) { ?>
                <a href="<?php echo $this->infopage->info_pagina_facebook ?>" target="_blank">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>


            <?php } ?>

            <?php if ($this->infopage->info_pagina_x) { ?>
                <a href="<?php echo $this->infopage->info_pagina_x ?>" target="_blank">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>


            <?php } ?>
            <?php if ($this->infopage->info_pagina_linkedin) { ?>
                <a href="<?php echo $this->infopage->info_pagina_linkedin ?>" target="_blank">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>


            <?php } ?>
            <?php if ($this->infopage->info_pagina_instagram) { ?>
                <a href="<?php echo $this->infopage->info_pagina_instagram ?>" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>


            <?php } ?>
            <?php if ($this->infopage->info_pagina_pinterest) { ?>
                <a href="<?php echo $this->infopage->info_pagina_pinterest ?>" target="_blank">
                    <i class="fa-brands fa-pinterest-p"></i>
                </a>


            <?php } ?>

            <?php if ($this->infopage->info_pagina_flickr) { ?>
                <a href="<?php echo $this->infopage->info_pagina_flickr ?>" target="_blank">
                    <i class="fa-brands fa-flickr"></i>
                </a>


            <?php } ?>
            <?php if ($this->infopage->info_pagina_tiktok) { ?>
                <a href="<?php echo $this->infopage->info_pagina_tiktok ?>" target="_blank">
                    <i class="fa-brands fa-tiktok"></i>
                </a>


            <?php } ?>
        </div>

    </div>

    <div class="menu">
        <ul class="d-flex justify-content-between">
            <li>
                <a href="/" class="<?php echo $this->botonactivo == 1 ? 'active' : '' ?>">Operación Estratégica</a>
            </li>
            <li>
                <div class="vr"></div>
            </li>
            <li>
                <a href="/page/nosotros" class="<?php echo $this->botonactivo == 2 ? 'active' : '' ?>">Nosotros</a>
            </li>
            <li>
                <div class="vr"></div>
            </li>
            <li>
                <a href="/page/servicios" class=" <?php echo $this->botonactivo == 3 ? 'active' : '' ?>" >Nuestros Servicios</a>
            </li>
            <li>
                <div class="vr"></div>
            </li>
            <li>
                <a href="/page/reorganizacionempresarial" class="<?php echo $this->botonactivo == 4 ? 'active' : '' ?>">Reorganización Empresarial</a>
            </li>
            <li>
                <div class="vr"></div>
            </li>
            <li>
                <a href="/page/mesadeayuda" class="<?php echo $this->botonactivo == 5 ? 'active' : '' ?>">Mesa de Ayuda</a>
            </li>
            <li>
                <div class="vr"></div>
            </li>
            <li>
                <a href="/page/contacto" class="<?php echo $this->botonactivo == 6 ? 'active' : '' ?>">Contáctenos</a>
            </li>

        </ul>
    </div>

    <div class="info-contact">
        <?php echo $this->infopage->info_pagina_informacion_contacto_footer?>
    </div>
</div>