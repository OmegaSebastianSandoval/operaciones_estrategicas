<div class="row">
  <?php
  // print_r($columna);
  if ($columna->contenido_titulo_ver == 1) {
    echo '<h2>' . $columna->contenido_titulo . '</h2>';
  }
  ?>
  <?php echo $columna->contenido_descripcion; ?>
  <div id="slider_<?php echo $columna->contenido_id; ?>" class="slider_<?php echo $columna->contenido_id; ?> col-sm-12 sliderCont w-100 ">
    <?php foreach ($slidercontent as $slider) : ?>
      <?php $slider = $slider["nietos"];
      // print_r($slider->contenido_descripcion);
      ?>


      <div class="row">
        <div class="col-12">
          <?php if ($slider->contenido_enlace) { ?>
            <a
              href="<?php echo $slider->contenido_enlace ?>" <?php if ($slider->contenido_enlace_abrir == '1') {
                                                                echo 'target="_blank"';
                                                              } ?>
              class="slider-link">

            <?php } ?>
            <i class="fa-solid fa-arrow-right-long"></i>

            <?php echo $slider->contenido_vermas ?>


            <?php if ($slider->contenido_enlace) { ?>

            </a>
          <?php } ?>


        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<script>
  console.log(<?php echo $columna->contenido_id; ?>);

  $('#slider_<?php echo $columna->contenido_id; ?>').slick({
    infinity: false,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: false,

    responsive: [{
        breakpoint: 900,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false
        }
      },
    ]
  });
</script>