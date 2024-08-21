<section class="bg-greenblue form-home">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <?php echo $this->infopage->info_pagina_informacion_contacto ?>

            </div>
            <div class="col-12 col-lg-6">
                <form action="/page/index/enviarmessage" id="form-contact" class="form-contact">

                    <div class="form-group">

                        <select name="service" id="service" class="form_input" required>
                            <option value="" selected disabled>Servicio en el que estás interesado/a</option>
                            <option value="Auditoría Aseguramiento">Auditoría y Aseguramiento</option>
                            <option value="Legal y Tributario">Legal y Tributario</option>
                            <option value="Solución de Impuestos">Solución de Impuestos</option>
                            <option value="Outosourcing">Outosourcing</option>
                            <option value="Finanzas Corporativas">Finanzas Corporativas</option>

                        </select>

                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" class="form_input" placeholder="Tu nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" id="phone" class="form_input" placeholder="Tu teléfono" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form_input" placeholder="Tu email" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form_input" placeholder="Déjanos tu mensaje" id="message" required></textarea>
                    </div>

                    <input type="hidden" id="lastname" name="lastname">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <input name="hash" type="hidden" value="<?php echo md5(date("Y-m-d")); ?>" />
                    <input type="hidden" name="csrf" id="csrf" value="<?php echo $this->csrf ?>">
                    <input type="hidden" name="csrf_section" id="csrf_section" value="<?php echo $this->csrf_section ?>">

                    <div class="row">
                        <div class="col-12 col-xxl-6 d-grid d-md-flex justify-content-center justify-content-md-between">
                            <div class="g-recaptcha" data-sitekey="6LfFDZskAAAAAE2HmM7Z16hOOToYIWZC_31E61Sr"></div>

                        </div>
                        <div class="col-12 col-xxl-6 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault" data-bs-toggle="modal" data-bs-target="#modalPoliticas" role="button">
                                    Aceptar términos y condiciones
                                </label>
                            </div>

                            <button class="btn-blue mt-2" id="submit-btn">Enviar ahora</button>

                        </div>
                    </div>




                </form>
            </div>
        </div>
    </div>
</section>