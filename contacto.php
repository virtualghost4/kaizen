<?php include 'partials/navbar.php';?>

    <!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h2>Contáctanos</h2>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBlsgqVnhyRZdXaT8HjdAuHy1vg4mQqVG8 
    &q=concepcion, chile"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4 informacion">
          
          <p>
            <h4><a href=""><i class="fa fa-phone-square fa-1x" aria-hidden="true"> +569 662 06 752</i></a></h4>

          <p>
            <h4><a href=""><i class="fa fa-phone-square fa-1x" aria-hidden="true"> +569 81290556</i></a></h4>
          </p>          <p>
            <h4><a href=""><i class="fa fa-facebook-official fa-1x" aria-hidden="true"> Kaizen Delivery</i></a></h4>
          </p>
          <p>
            <h4><a href=""><i class="fa fa-map-marker" aria-hidden="true">Zona de Reparto</i></a></h4>
            <ul>
              <li type="circle">Concepción Centro</li>
              <li type="circle">Pedro de Valdivia</li>
              <li type="circle">Chiguayante</li>
              <li type="circle">Lomas de San Andrés</li>
              <li type="circle">Lomas de San Sebastián</li>
              <li type="circle">Talcahuano</li>
              <li type="circle">San Pedro</li>
            </ul>
          </p>
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Envíanos un mensaje</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Nombre:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Ingresa tu nombre">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Telefono:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Ingresa tu teléfono.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Correo electrónico</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Ingresa tu mail.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Mensaje:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Ingresa tu mensaje." maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Enviar mensaje</button>
          </form>
        </div>

      </div>

    </div>
   
    <br>
      <?php include 'partials/footer.php'; ?>