<div class="banner-reorganizacion">
  <?php echo $this->bannerprincipal; ?>
</div>

<div class="reorganizacion">
  <?php echo $this->reorganizacion; ?>
</div>

<div class="reorg container">
  <div class="row">
    <?php foreach ($this->reorganizacion2 as $key => $reor) { ?>
      <div class="col-sm-4">
        <div class="reor<?php echo $reor->reor_id ?>">
          <div align="center"><img src="/images/<?php echo $reor->reor_imagen ?>" alt="">
            <div class=" contenedor container">

              <div class="descrip" id="descrip<?php echo $reor->reor_id ?>">
                <div>
                  <?php echo $reor->fecha ?>
                </div>
                <div>
                  <?php echo $reor->reor_titulo ?>
                </div>
                <div class="des-secc collapse container" id="collapseExample<?php echo $reor->reor_id ?>">
                  <?php echo $reor->reor_desc ?>
                  <div class="btn-reor mb-4">
                    <a data-toggle="modal" href="#des_modal_imagen<?php echo $reor->reor_id ?>">Documentos</a>
                  </div>
                  <?php if ($reor->reor_enlace) { ?>
                    <div class="btn-reor">
                      <a href="<?php echo $reor->reor_enlace ?>">Baranda Virtual</a>
                    </div>
                  <?php } ?>
                </div>

                <div class="reor-vermas" id="reor-vermas<?php echo $reor->reor_id ?>">
                  <a class="reeor<?php echo $reor->reor_id ?>" data-toggle="collapse" id="reeor<?php echo $reor->reor_id ?>" href="#collapseExample<?php echo $reor->reor_id ?>" onclick="FbotonOn(this)" role="button">
                    <span><?php echo $reor->reor_vermas ?></span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="modal" tabindex="-1" id="des_modal_imagen<?php echo $reor->reor_id ?>" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="padding-contenedor">
                <div align="center">
                  <div class="container">
                    <div class="row">
                      <div class="col-lg-12 formatos" style="margin:auto;">
                        <ul class="titulo-formatos">
                          <li>
                            <table>
                              <tr>
                                <td>
                                  <h4>Documentos&nbsp;&nbsp;</h4>
                                </td>
                                <td align="right"><i class="fab fa-leanpub fa-2x"></i>
                                </td>
                              </tr>
                            </table>
                          </li>
                        </ul>

                        <div id="<?php echo $this->cat ?>" class="ancla">
                          <ul>
                            <?php foreach ($reor->archivos as $key => $value) { ?>

                              <li>

                                <table style="width:100%;">

                                  <tr>
                                    <td style="width: 85%;">
                                      <div class="producto-name align-self-start" style="word-break:break-word;">
                                        <h6><?php echo $value->titulo ?></h6>
                                      </div>
                                    </td>
                                    <td style="float:right;">
                                      <a href="/files/<?php echo $value->archivo ?>" target="_blank">
                                        <?php if ($value->archivo) { ?>
                                          <i class="fas fa-file-upload"></i>
                                        <?php } ?>
                                      </a>
                                    </td>
                                  </tr>

                                </table>


                              </li>

                            <?php } ?>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



    <?php } ?>
  </div>
</div>

<script>
  function FbotonOn(element) {
    //var uno = document.getElementById('reeor');
    let span = element.querySelector("span");
    if (span.innerHTML == 'Ver Menos')
      span.innerHTML = 'Ver Más';
    else span.innerHTML = 'Ver Menos';
  }
</script>