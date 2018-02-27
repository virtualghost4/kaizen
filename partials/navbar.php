<!DOCTYPE html>
<html lang="xyz">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Productos Congelados | Kaizen</title>

    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/extralayers.css" rel="stylesheet">
    <link href="css/settings.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/jquery.mmenu.all.css" rel="stylesheet">
    <link href="css/style.css?v=2" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <script src="vendor/jquery/jquery.min.js"></script>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css?v=2" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
  * {
    font-family:arial;
    margin:0;
    padding:0;
}

.logo, .intro, .menu, .content {
    padding:10px;
    
}
.menu {
/*   
    background:#428bca;
    color:#fff;
    height:50px;
    line-height:30px;
    letter-spacing:1px;
    
    */
   width:100%;
}
.content {
    margin-top:10px;
}
.menu-padding {
    padding-top:40px;
}
.content p {
    margin-bottom:20px;
}
.sticky {
    position:fixed;
    top:0;
}
.nav-link:hover{
    border-bottom: 3px solid #01bdbe;
}
</style>

<script type="text/javascript">
  $(document).ready(function () {

    var menu = $('.menu');
    var origOffsetY = menu.offset().top;

    function scroll() {
        if ($(window).scrollTop() >= origOffsetY) {
            $('.menu').addClass('sticky');
            $('.content').addClass('menu-padding');
            $('.logo-small').addClass('show');
        } else {
            $('.menu').removeClass('sticky');
            $('.content').removeClass('menu-padding');
            $('.logo-small').removeClass('show');
        }


    }

    document.onscroll = scroll;

});
</script>

  </head>
   <div class="container-fluid container-logo heading wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="1500ms">
        
            <a href="index.php"><img class="logo" src="images/logo.svg" alt="logo"></a>

    </div>
  <body>
    <!-- <div id="pre-loader">
         <div class="loader-holder">
             <div class="frame">
                 <img src="images/cargando.gif" alt="cargando"/>                
             </div>
         </div>
     </div>  -->
     <!--
    <header class="loader">
      <nav class="navbar navbar-expand-lg navbar-custom navbar-fixed-top" data-wow-duration="1000ms" data-wow-delay="2000ms"">
        <div class="container">
            <a class="navbar-brand" href="index.php"></a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nosotros.php">Nosotros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Productos
              </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="productos3.php">Pescados</a>
                            <a class="dropdown-item" href="productos3.php">Mariscos</a>
                            <a class="dropdown-item" href="productos3.php">Congelados</a>
                            <a class="dropdown-item" href="productos4.php">Otro</a>
                            <a class="dropdown-item" href="productos4.php">Otro</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    -->

  <header style="background-color:rgba(255, 255, 255, 0.5);">
    <div class="menu" style="z-index: 9999">
      
    <header class="loader">
      <nav id="menu" class="navbar navbar-expand-lg navbar-custom navbar-fixed-top" data-wow-duration="1000ms" data-wow-delay="2000ms"">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img class="logo-small"  src="images/logo.svg" alt="logo"> </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><strong>Inicio</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nosotros.php"><strong>Nosotros</strong></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <strong>Productos</strong>
              </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                            <a class="dropdown-item" href="pescados.php"><strong>Pescados</strong></a>
                            <a class="dropdown-item" href="mariscos.php"><strong>Mariscos</strong></a>
                            <a class="dropdown-item" href="otros.php"><strong>Otro</strong></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php"><strong>Contacto</strong></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>

    </div>
  </header>