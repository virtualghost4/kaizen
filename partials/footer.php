<div class="footer-part">
          <div class="footer-bottom">
            <div class="container">
              <p>
              <a href="login.php"><button type="button" class="btn btn-outline-primary">Entrar</button></a>
              © Kaizen 2018</p>

            </div>
          </div>
        </div> <!-- footer-part -->
      </div> <!-- wrapper --> 
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAf6My1Jfdi1Fmj-DUmX_CcNOZ6FLkQ4Os"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/swiper.js"></script>
    <script src="js/jquery.themepunch.plugins.min.js"></script>
    <script src="js/jquery.themepunch.revolution.min.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/jquery.mmenu.min.all.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.js"></script>
    <script src="js/script.js"></script>
    <script>
    $(document).ready(function(){
      $(document).on("click", ".btn-detalles", function(e){
        $("#myModal").modal();
        var id = $(this).data("id");
        $.ajax({
          url : "detalle_producto.php",
          method: "GET",
          data : {
            id : id
          },
          success: function(data){
            $(".modal-body").html(data);
          }
        });
        
      });
    })
    </script>
    
  </body>
</html>