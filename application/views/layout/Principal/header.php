<!DOCTYPE html">
<html>
<head>
        <title>Radio-Mautri</title>
        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
        <!-- Stylesheets -->
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/reset.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main-stylesheet.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/shortcode.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
            var iPhoneVertical = Array(null,320,"<?php echo base_url(); ?>assets/css/responsive/phoneverticald41d.css?"+Date());
            var iPhoneHorizontal = Array(321,767,"<?php echo base_url(); ?>assets/css/responsive/phonehorizontald41d.css?"+Date());
            var iPad = Array(768,1000,"<?php echo base_url(); ?>assets/css/responsive/ipadd41d.css?"+Date());
            var dekstop = Array(1001,null,"<?php echo base_url(); ?>assets/css/responsive/desktopd41d.css?"+Date());
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/orange-themes-responsive.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/scripts.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/jquery.sexyslider.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/iris.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/jscript/color-changer.js"></script>
        <script type="text/javascript">
          $(document).ready(function(){
            $('#slider').SexySlider({
              navigation: '#navigation',
              control: '#control',
              width  : 970,
              height : 285,
              strips : 5,
              delay  : 5000,
              effect : 'random',
              direction: 'random'
            });
          });
        </script>
    <!-- END head -->
    </head>
    <!-- BEGIN body -->
    <body>
        <a href="#top" class="back-to-top"><span class="icon-text">&#59231;</span>Back To Top</a>
        
        <div class="lightbox">
            <div class="lightcontent">
                <h2 class="light-title">Loading..</h2>
                <a href="#" onclick="javascript:lightboxclose();" class="light-close"><span>&#10062;</span>Close Window</a>
                <div class="loading-box">
                    <h3>Loading, Please Wait!</h3>
                    <span>This may take a second or two.</span>
                    <span class="loading-image"><img src="<?php echo base_url(); ?>assets/images/loading.gif" title="" alt="" /></span>
                </div>
            </div>
        </div>
    
        <!-- BEGIN .boxed -->
        <div class="boxed">
            <div class="header">
                
                <!-- BEGIN .wrapper -->
                <div class="wrapper">
                    
                    <div class="breaking">
                        <span class="index">Nuevas Música</span>
                        <div class="news">
                            <div>
                                <div>
                                    <a href="post.html" class="title">Presentación</a>
                                    <span>Bienvenidos a radio MAUTRI.</span>
                                </div>
                                <div>
                                    <a href="post.html" class="title">SANTUARIO NACIONAL DEL AMPAY</a>
                                    <span>La visión de radio Mautri, la nueva red de Abancay, es ser la emisora más sintonizada con aceptación masiva de oyentes en la localidad, en el país.</span>
                                </div>
                            </div>
                            <div style="margin-left: 750px;">
                              <a href="<?php echo site_url('Login/Login')?>">Login</a>  
                            </div>
                            
                        </div>
                        <a href="javascript:latestnews('left');" class="icon-text breaking-news-arrow">&#59225;</a>
                        <a href="javascript:latestnews('right');" class="icon-text breaking-news-arrow">&#59226;</a>

                    </div>
                    
                    <div class="logo-space">
                        
                        <div>
                            <a href="index-2.html" class="logo">MAUTRI</a>
                            <!--<a href="index.html" class="logo">
                                <img src="images/logo-header.png" alt="" title="" />
                            </a>-->
                            
                            <p>"MEDIO DE DIFUSIÒN MASIVA EN ESTA ENCANTADORA Y BELLA CIUDAD PRIMAVERAL"</p>
                            
                            <div class="clear-float"></div>
                        </div>
                        
                    </div>
                    
                    <ul class="navi">
                        <li><a href="<?php echo site_url('Inicio/'); ?>">INICIO</a></li>
                        <li><a href=""><span>NOSOTROS</span></a>
                            <ul class="sub-menu">
                                <li class="arrow">&nbsp;</li>
                                <li><a href="<?php echo site_url('presentacion/index'); ?>">PRESENTACION</a></li>
                                <li><a href="<?php echo site_url('MisionVision/index'); ?>">MISION Y VISIÓN</a></li>
                                <li><a href="<?php echo site_url('Memoria/index'); ?>">MEMORIA</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo site_url('galeria/index'); ?>">GALERÍA DE FOTOS</a></li>
                        <li><a href="">CONTÁCTENOS</a></li>
                        <li class="search"><form action="" method="post"><input type="text" value="" placeholder="Buscar" /><input type="submit" value="&#128269;" /></form></li>
                    </ul>
                    
                <!-- END .wrapper -->
                </div>
                
            <!-- END .header -->
            </div>
            
            <!-- BEGIN .content -->