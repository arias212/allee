<?php
require_once('./controllers/Autoload.php');
$Autoload=new Autoload();

$id = isset($_GET['id'])?$_GET['id']:'';
if($id==''){
    $articulos_controller= new ArticulosController();
    $articulos=$articulos_controller->getTienda();
}else{
    $articulos_controller= new ArticulosController();
    $articulos=$articulos_controller->buscarCodigo($_GET['id']);
}
if( isset($_POST['solicitud'])){
   
    $enviar=array(
    'para'=>$_POST['email'],
    'asunto'=>'Solicitud',
    'cuerpomail'=>$contenido);
    
    $mail_controler= new PhpmailerController();
    $mail=$mail_controler->enviarEmail($enviar);
    $infor=array(
        'nombre'=>$_POST['nombre'],
        'celular'=>$_POST['celular'],
        'email'=>$_POST['email'],
        'solicitud'=>$_POST['solicitud'],
        'respuesta'=>$mail
        );
    $reporte_controller=new ArticulosController();
    $reporte = $reporte_controller->setEmailTienda($infor);
    }

?>
<!doctype html>
<html lang="es">
    <head><meta charset="gb18030">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ACEL SOPORTES TV, trabajos de calidad</title>
        <meta name="descripcion" conten="ACEL SOPORTES TV, trabajos de calidad">
        <meta name="theme-color" content="#8BC34A">
        <meta name="MobileOptimized" content="width">
        <meta name="HandheldFriendly" content="true">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta property="og:url"           content="https://www.fciempresas.com/acelsoportes/public/img/loaderacelsoportes.gif" />
          <meta property="og:url"           content="https://www.fciempresas.com/acelsoportes/public/img/loaderacelsoportes.gif" />
          <meta property="og:type"          content="website" />
          <meta property="og:title"         content="Acel soportes TV" />
          <meta property="og:description"   content="Acel soportes, servicios con calidad y excelencia" />
          <meta property="og:image"         content="https://www.fciempresas.com/acelsoportes/public/img/loaderacelsoportes.gif" />
        <link rel="apple-touch-icon" href="./public/img/favico.png">
        <link rel="apple-touch-startup-image" href="./public/img/favico.png">
        <link rel="manifest" href="./manifest.json">
        <link rel="shortcut icon" type="image/png" href="./public/img/favico.png">
        <!--<link rel="stylesheet" href="./public/css/responsimple.min.css">-->
        <link rel="stylesheet" href="./public/css/acelsoportes.css">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="./public/css/materialize.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    </head>
    <style>
        .borderRadius{
            border-radius:50%;
        }
        .flexBox{
            display:box;
            box-orient:horizontal;
            display:-webkit-box;
            -webkit-box-orient:horizontal;
            display:-moz-box;
            -moz-box-orient:horizontal;
        }
    </style>
        <figure class="">
            <div class="">
		        <img class="logo trasition cambioc" src="./public/img/loaderacelsoportes.gif" alt="Acel soportes TV"  >
		    </div>
		</figure>
		<div class="company-info">
		    
		    
		<header>
            <div class="menu-toggle" >
                <nav>
                    <ul>
                        <li><a href="#"><img src="./public/img/comprador.png" class="" tittle="Tienda"></li></a>
                        <li><a href="#" id="contacto"><img src="./public/img/contacto.png" class="" tittle="Contacto"></li></a>
                        <li><a href="https://www.facebook.com/edilsonacel/"><img src="./public/img/faceinsta.png" class="" tittle="Redes sociales"></li></a>
                    </ul>
                </nav>
                <div class="clearfix"></div>
                <script src="https://code.jquery.com/jquery-3.4.1.js"
              integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
              crossorigin="anonymous"></script>
        <script >
            $(document).ready(function(){
                $('.menu-toggle').click(function(){
                    $('.menu-toggle').toggleClass('active')
                    $('nav').toggleClass('active')
                })
            })
        </script>  
            </div>  
        
        </header>
       
    <body>
        
    
        
        <section>
        <p class="linea"></p>
        
        <div class="sombra centrar" style="margin-top:20px;">
            
            <div class="container" id="carousel">
            <div class="row">
                <div class="col s12">
                    <div class="carousel carousel-slide centrar">
                        <?php foreach($articulos as $key=>$value): ?>
                            <div class="carousel-item" style="font-size:0.8em;">
                                <img src="../app/public/img/usuarios/acelsoportes/fotos_articulos/<?php echo $articulos[$key]['foto'];?>" class="" id="" style="width:90%;">
                                <h1 class="resaltarcolor"><?php echo $articulos[$key]['descripcion']?></h1>
                                <h2 class="resaltarcolor " style="font-size:2em;">Antes <del> $ <?php echo number_format($articulos[$key]['pvpantes'],2)?> </del></h2>
                                <h2 class="titulo" style="font-size:3em;">$ <?php echo number_format($articulos[$key]['pventa'],2)?></h2>
                                <a href="https://wa.me/0573117061694/?text=Hola, me interesa hablar sobre el soporte <?php echo $articulos[$key]['descripcion']?>" data-text="COMPARTIR EN WHATSAPP" data-action="share/whatsapp/share" class="miestilo" style="border: none; margin: 0px 0; font-size: 16px;">
                                <img src="./public/img/logowhastapp.png" style="width:16px!important" title="Chat con Diani"></a>
                                <div class="centrar trasitionf" style="border-radius:6px;box-shadow:0px 2px 5px 1px rgba(0,0,0,.2);color:#FFFFFF;background:#F32424;font-size:2em;width:180px;height:40px">
                                    <a href="#" id="amodalventamm" class="amodalventamm" codigo="<?php echo $articulos[$key]['codigo']; ?>" valor="<?php echo $articulos[$key]['pventa']; ?>" style="color:#FFFFFF;"><i class="fa fa-credit-card-alt" aria-hidden="true" > Comprar</i></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <div id="respuestas" style="display:none;"></div>
                <script>
                    $(document).ready(function(){
                        $("#cerrarmodal").click(function(e){
                            e.preventDefault();
                            $("#modal").slideUp();
                            $("#carousel").slideDown();
                        });
                        $("#contacto").click(function(e){
                            e.preventDefault();
                            $("#carousel").slideUp();
                            $.ajax({
                               url:"./views/contacto.php",
                               type:"POST",
                                dataType:"html",
                               async:true,
                               success:function(response){
                                    $("#respuestas").html(response);
                               }, error: function(error){}
                            });
                        });
                    
                    });
                </script>  
            <input type="text" id="articulobus" name="articulobus" placeholder="Soporte ideal para tu TV " class="inputbuscar centrar" style="font-size:2em!important;">
            
            <div class="infoPrincipal centrar" id="divprincipal" >
                
                <?php foreach($articulos as $key=>$value): ?>
                    <div class="infoEmpresa ">
                        <div class="letras centrar divTienda"  style="margin-left:15px;">
                            <?php
                                echo $html='<img src="../app/public/img/usuarios/acelsoportes/fotos_articulos/'.$articulos[$key]['foto'].'" class="" id="" style="width:270px;height:270px;">';
                            ?>
                            <br><br>
                            <h1 class="resaltarcolor titulo "><?php echo strtoupper($articulos[$key]['descripcion']);?></h1>
                            <h1 class="titulo " style="font-size:2em;">Antes <del> $ <?php echo number_format($articulos[$key]['pvpantes'],2)?> </del></h1>
                            <h1 class="titulo" style="font-size:3em;">$ <?php echo number_format($articulos[$key]['pventa'],2)?></h1>
                            <h1 class="letras"><a href="" codigo="" class="articulodetalle"><?php echo $articulos[$key]['detalles']?></a></h1><br>
                            <a href="https://api.whatsapp.com/send?text=https://fciempresas.com/acelsoportes?id=<?php echo $articulos[$key]['codigo'];?>" data-text="COMPARTIR EN WHATSAPP" data-action="share/whatsapp/share" class="miestilo" style="border: none; margin: 10px 0; font-size: 16px;">
                                <img border="0" src="./public/img/comwhatsapp.png" width="32px" height="32px" title="Comparte con tus contactos">
                            </a><br>
                        <div class="centrar trasitionf" style="border-radius:6px;box-shadow:0px 2px 5px 1px rgba(0,0,0,.2);color:#FFFFFF;background:#F32424;font-size:2em;width:180px;height:40px">
                                <a href="#" id="amodalventamm" class="amodalventamm" codigo="<?php echo $articulos[$key]['codigo']; ?>" valor="<?php echo $articulos[$key]['pventa']; ?>" style="color:#FFFFFF;"><i class="fa fa-credit-card-alt" aria-hidden="true" > Comprar</i></a>
                            </div><br>
                            
                             <a href="https://wa.me/0573117061694/?text=Hola, me interesa hablar sobre el soporte <?php echo $articulos[$key]['descripcion']?>" data-text="COMPARTIR EN WHATSAPP" data-action="share/whatsapp/share" class="miestilo" style="border: none; margin: 10px 0; font-size: 16px;">
                                <img border="0" src="./public/img/logowhastapp.png" width="32px" height="32px" title="Chat con un experto Acel Soportes TV">
                            </a>
                            <a href="https://www.facebook.com/edilsonacel/" class="miestilo" style="border: none; margin: 10px 0; font-size: 16px;">
                                <img border="0" src="./public/img/logofacebook.png" width="32px" height="32px" title="Visita nuestro fanpage">
                            </a><br>
                        </div>
                        <!-- Load Facebook SDK for JavaScript -->
                                  <div id="fb-root"></div>
                                  <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0";
                                    fjs.parentNode.insertBefore(js, fjs);
                                  }(document, 'script', 'facebook-jssdk'));</script>
                                
                                  <!-- Your share button code -->
                                  <div class="fb-share-button" 
                                    data-href="https://www.acelsoportes.com/index" 
                                    data-layout="button_count">
                                  </div>
                        
                    </div>
                
                <?php endforeach; ?>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#articulobus").keyup(function(e){
                    //alert();
                   // $("#loader").slideDown();
                    var consulta = $(this).val();
                    $.ajax({
                       url:"./views/articulos-bus.php",
                       type:"POST",
                        dataType:"html",
                       async:true,
                       data:{consulta:consulta},
                       
                       success:function(response){
                            console.log(response);
                            $("#loader").slideUp();
                            $("#divprincipal").html(response);
                       }, error: function(error){}
                    });
                });
                
                $(".amodalventamm").click(function(e){
                    e.preventDefault();
                    //$("#modal").slideDown();
                    //$("#loader").slideDown();
                    var valor = $(this).attr("valor");
                    var codigo = $(this).attr("codigo");
                    $("#carousel").slideUp();
                    
                    $.ajax({
                       url:"./views/pagar.php",
                       type:"POST",
                        dataType:"html",
                       async:true,
                       data:{codigo:codigo,valor:valor},
                       
                       success:function(response){
                            console.log(response);
                            $("#loader").slideUp();
                            $("#respuestas").html(response);
                            $("#respuestas").slideDown();
                       }, error: function(error){}
                    });
                });
                setInterval(function(){
                    $(".carousel").carousel("next");
                },3000);
            });
        </script>
    <p class="linea"></p>
    </section>  
    </div>
    </body>
    <footer>
        <div class="letras centrar cambiod sombradiv" style="width:100%">
            
            <label class="centrar titulo resaltarcolor"><i class="fa fa-whatsapp"> 311 706 1694</i>   <br><i class="fa fa-phone" aria-hidden="true"> 032 662 2819 - 032 375 0154</i> </label><br>
            <label class="centrar titulo resaltarcolor"><i class="fa fa-map-marker" aria-hidden="true"> Calle 70 7b 37 </i></label><br>
            <label class="centrar titulo resaltarcolor">Barrio Alfonso López</label><br>
            <label class="centrar titulo resaltarcolor">Cali, Colombia</label><br>
            <p class="centrar letras ">©Todos los derechos reservado ACEL SOPORTES TV</p>
			<span></span>
		</div>
    </footer>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="./public/js/acelsoportes.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
</html>    