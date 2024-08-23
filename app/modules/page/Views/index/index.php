<script>
    $(document).ready(function() {
        <?php if ($this->popup->publicidad_estado == 1) { ?>
            $("#popup").modal("show");
        <?php } ?>

    });
</script>
<?php echo $this->banner; ?>


<section class="content-us">
    <?php echo $this->quienessomos; ?>
</section>

<?php echo $this->contenido; ?>

<?php echo $this->formulario; ?>