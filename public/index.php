<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content=""/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="theme-color" content="#333333">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="google-site-verification" content=""/>
    <meta name="date" content="2016" />
    <meta name="robots" content="All" />
    <meta name="keywords" content="" />

    <title>Javeriana</title>

    <link type="text/plain" rel="author" href="humans.txt" />
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" href="assets/css/javeriana.css"/>

    <script src="assets/js/lib/modernizr.min.js"></script>
    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Facebook Pixel Code -->

    <script>

        !function (f, b, e, v, n, t, s) {
            if (f.fbq)
                return;
            n = f.fbq = function () {
                n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq)
                f._fbq = n;

            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;

            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window,
            document, 'script', '//connect.facebook.net/en_US/fbevents.js');

        fbq('init', '559775344182262');

        fbq('track', "PageView");</script>

        <noscript><img height="1" width="1" style="display:none"

           src="https://www.facebook.com/tr?id=559775344182262&ev=PageView&noscript=1"

           /></noscript>

           <!-- End Facebook Pixel Code -->

       </head>
       <body>
        <script>

            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {

                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)

            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-74753185-1', 'auto');

            ga('send', 'pageview');

        </script>
        <header class="clearfix">
            <div class="wrapper"> 
                <h1><a href="index.php" title="Pontificia universidad javeriana bogotá"><img src="assets/imgs/logo.png" height="91" width="276" alt=""></a></h1>
                <div class="tel">
                    <a href="tel:0313208320" title="">
                        <small>¡Comunícate con nosotros!</small>
                        <span>3208320 ext: 2100</span>
                    </a>
                </div>        
            </div>   
        </header>

        <!--=======================Inicio Contenido=============================-->
        <section class="slide">
            <div class="wrapper flex">
                <div class="copy">
                    <h2>La Universidad Javeriana<br /> <span>presente en todo Colombia…</span></h2>
                    <h3>Programas de Educación Continua.</h3>
                </div>

                <div class="cta">
                    <div class="inscribete">
                        <strong>¡Inscríbete ya!</strong>
                        <p>Pronto serás contactado por uno de nuestros asesores.</p>
                    </div>
                    <form action="" method="get" accept-charset="utf-8">
                        <fieldset>
                            <input type="text" size="60" id="Nombre" name="" value=""
                            placeholder="Nombre" maxlength="128" />
                        </fieldset>
                        <fieldset>
                            <input type="text" size="60" id="Apellido" name="" value=""
                            placeholder="Apellido" maxlength="128" />
                        </fieldset>
                        <fieldset>
                            <input type="email" size="60" id="Mail"
                            name="direccion-correo" required value="" placeholder="Mail"
                            maxlength="128" />
                        </fieldset>
                        <fieldset>
                            <input type="text" size="60" id="Celular" name="" value=""
                            placeholder="Celular" maxlength="128" />
                        </fieldset>
                        <fieldset class="select">
                            <select id="programa" class="programa_form">
                                <option>Programa</option>
                            </select>

                        </fieldset>
                        <fieldset>
                            <div class="checkbox">
                                <input type="checkbox" name="" value="" id="check">
                                <label for="check">Autorizo ser contactado por teléfono y correo electrónico, y seguir recibiendo información académica por parte de la Universidad</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <input
                            type="hidden" id="ip" name="ip" value="" />
                            <input type="hidden" id="target" value="<?php echo @$_GET['target']; ?>"/>
                            <input type="hidden" id="programaprecargado" value="<?php echo @$_GET['programa']; ?>"/>
                            <button type="button" onclick="registro()">Enviar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>


        <div class="wrapper">
            <div class="content">
                <div class="left">
                    <h3>Elige el programa según tu interés</h3> 
                    <div id ="encabezado_visual"></div>
                    <!-- imagen -->
                    <!-- <div class="cont-img">
                      <img src="assets/imgs/img1.jpg" height="1456" width="3556" alt="">
                  </div> -->

                  <!-- video -->
                    <!-- <div class="flex">
                      <iframe width="560" height="315" src="https://www.youtube.com/embed/YzgMxqiShGU" frameborder="0" allowfullscreen></iframe>
                  </div> -->

                  <div class="selects">
                    <div>
                        <select  id="sfacultades" onchange="getCategorias()">
                            <option value="">Región</option>
                        </select>
                    </div>
                    <div>
                        <select  id="scategorias" onchange="getProgramas()">
                            <option value="">Categoría</option>
                        </select>
                    </div>
                    <div>
                        <select  id="sprogramas" onchange="getPrograma()">
                            <option value="">Programa</option>
                        </select>
                    </div>
                </div>
                <h4 id="nombre"></h4>
                <div class="boxs">
                    <div class="box">
                        <div>
                            <small>Horas</small>
                            <span  id="horas"></span>
                        </div>
                    </div>
                    <div class="box">
                        <div>
                            <small>MES INICIO</small>
                            <span id="mes"></span>
                        </div>
                    </div>
                    <div class="box">
                        <div>
                            <small>Día inicio</small>
                            <span id="dia"></span>
                        </div>
                    </div>
                    <div class="box">
                        <div>
                            <small>Inversión</small>
                            <span id="precio"></span>
                        </div>
                    </div>
                </div>
                <div class="text">
                    <strong>Temas principales</strong>
                    <p id="perfil"></p>
                </div>
                <div class="text">
                    <strong>¿En qué consiste?</strong>
                    <p id="descripcion"></p>
                </div>
                <div class="text">
                    <strong>Horario</strong>
                    <p id="detalle"></p>
                </div>
            </div>
        </div>
    </div>




    <!--=======================Inicio Footer================================-->

    <!-- <footer>
        <div class="wrapper">
            <div>
                <p>
                    <strong>4%</strong> por pronto pago en curso o diplomados (acumulable con otros descuentos) - <strong>20%</strong> para grupos de 6 personas en adelante, y en el tercer curso o diplomado realizado consecutivamente - <strong>15%</strong> para grupos de 3 a 5 participantes en el mismo curso o diplomado.
                </p>
                <p>
                    <strong>Forma de pago:</strong> Efectivo, cheque de gerencia, tarjeta de crédito (recibimos todas las tarjetas, cuenta de cobro), medios de financiación.
                </p>
            </div>
        </div>
        <div class="linea"></div>
    </footer> -->


    <!--=====Fin Google Analytics========-->

    <!--=======================Inicio Scripts===============================-->
    <script src="assets/js/lib/jquery-1.11.0.min.js"></script>
    <script src="assets/js/lib/styleSelect.js"></script>
    <script src="assets/js/funciones.js"></script>
    <!--===Fin Scripts===-->


    <!--===Fin Footer===-->

</body>
</html>