<?php
echo $this->banner;
?>
<section class="">
    <?php
    echo $this->contenido;
    ?>
</section>

<style>
    iframe {
        width: 100%;
        height: 100%;
        aspect-ratio: 16 / 9;
        /* matches YouTube player */
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        gap: 1em;
       
        background-color: #000;
        color: #fff;
        text-decoration: none;
    }
</style>