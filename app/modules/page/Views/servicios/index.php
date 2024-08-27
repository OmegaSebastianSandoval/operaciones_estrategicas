<?php
echo $this->banner;
?>
<section class="">
    <?php
    echo $this->contenido;
    ?>
</section>

<div class="container contenedor-tab pb-4">

    <div class="contenedor-pestanas d-flex align-items-start">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <?php foreach ($this->services as $key =>  $service) { ?>
                <button class="nav-link <?= $key == 0 ? 'active' : '' ?>" id="v-pills-<?php echo $service->contenido_id; ?>-tab" data-bs-toggle="pill" data-bs-target="#v-pills-<?php echo $service->contenido_id; ?>" type="button" role="tab" aria-controls="v-pills-<?php echo $service->contenido_id; ?>" aria-selected="<?= $key == 0 ? 'true' : 'false' ?>"><img src="/images/<?php echo $service->contenido_fondo_imagen; ?>" alt="Icono tab"> <?php echo $service->contenido_titulo; ?> </button>
            <?php } ?>

        </div>
        <div class="tab-content px-3 px-md-5" id="v-pills-tabContent">
            <?php foreach ($this->services as $key =>  $service) { ?>
                <div class="tab-pane fade <?= $key == 0 ? 'show active' : '' ?>" id="v-pills-<?php echo $service->contenido_id; ?>" role="tabpanel" aria-labelledby="v-pills-<?php echo $service->contenido_id; ?>-tab" tabindex="0">
                    <div class="contenido-servicio">
                        <div class="header-service">
                            <img src="/images/<?php echo $service->contenido_imagen; ?>" alt="<?php echo $service->contenido_titulo; ?>" class="image-header-service">
                            <div class="title-service">
                                <img src="/images/<?php echo $service->contenido_icono; ?>" alt="Icono tab">
                                <h2><?php echo $service->contenido_titulo; ?></h2>
                            </div>

                        </div>
                        <div class="content-service-info">
                            <p><?php echo $service->contenido_introduccion; ?></p>
                            <p><?php echo $service->contenido_descripcion; ?></p>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="tab-pane fade show active" id="v-pills-quienessomos" role="tabpanel" aria-labelledby="v-pills-quienessomos-tab" tabindex="0">
                <?php echo $this->contenidoQuienesSomos; ?>

            </div>
            <div class="tab-pane fade" id="v-pills-organigrama" role="tabpanel" aria-labelledby="v-pills-organigrama-tab" tabindex="0">
                <div class="contenido-organigrama">


                    <?php echo $this->contenidoOrganigrama; ?>

                </div>
            </div>
            <!-- <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">...</div> -->
            <div class="tab-pane fade" id="v-pills-nuestrahistoria" role="tabpanel" aria-labelledby="v-pills-nuestrahistoria-tab" tabindex="0">
                <?php echo $this->contenidoNuestraHistoria; ?>
            </div>
            <div class="tab-pane fade" id="v-pills-normatividad" role="tabpanel" aria-labelledby="v-pills-normatividad-tab" tabindex="0">
                <div class="w-100">

                    <?php echo $this->contenidoNormatividad;
                    ?>

                </div>


            </div>

        </div>
    </div>

</div>


<style>
    .main-general {
        background-color: #f7f7f7;
        z-index: unset;

    }

    h2 {

        font-weight: 900 !important;
        font-size: 2rem !important;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {


        // Función para activar la pestaña basada en el hash de la URL
        function activateTabFromHash() {
            const hash = window.location.hash;
            console.log('Hash:', hash); // Verificar el valor de hash
            if (hash) {
                const targetTab = document.querySelector(hash + '-tab[data-bs-toggle="pill"]');
                console.log('Target Tab:', targetTab); // Verificar el elemento encontrado
                if (targetTab) {
                    const tab = new bootstrap.Tab(targetTab);
                    tab.show();
                } else {
                    console.log('No se encontró el tab correspondiente al hash.');
                }
            }
        }

        // Activar la pestaña correcta al cargar la página
        activateTabFromHash();

        // Re-activar la pestaña correcta cuando se cambia el hash de la URL
        window.addEventListener('hashchange', activateTabFromHash);


        // AOS.init({
        //   disabled: true,
        // });
    });
</script>

<!-- Array ( [0] => stdClass Object ( [contenido_id] => 39 [contenido_seccion] => 3 [contenido_tipo] => 5 [contenido_padre] => 38 [contenido_columna_alineacion] => 0 [contenido_columna] => [contenido_columna_espacios] => 0 [contenido_disenio] => 0 [contenido_borde] => 0 [contenido_estado] => 1 [contenido_fecha] => 0000-00-00 [contenido_titulo] => Auditoria y Aseguramiento [contenido_titulo_ver] => 1 [contenido_imagen] => servicio11.jpg [contenido_archivo] => [contenido_fondo_imagen] => icono-1.png [contenido_fondo_imagen_tipo] => 0 [contenido_fondo_color] => [contenido_introduccion] =>
En nuestro trabajo de auditoría y de aseguramiento de la información nos enfocamos en la aplicación de procedimientos que le permitan al auditor concluir y asegurar a los usuarios, mediante la emisión de informes, que la información y los procesos utilizados en la compañía son confiables, útiles, eficaces, eficientes y creíbles, permitiéndoles la toma de decisiones oportunas y acertadas.

[contenido_descripcion] =>
Nuestros Servicios

• Auditoría Externa
• Auditoría Estatutaria (Revisoría Fiscal)
• Procesos de Aseguramiento
• Auditoría de Control Interno
• Debida Diligencia (due diligence contable)
• Auditoria de proyectos

[contenido_enlace] => [contenido_enlace_abrir] => 0 [contenido_vermas] => [orden] => 39 ) -->