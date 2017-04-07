<?php include '../configAdmin.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html;" charset="utf8" />
        <title>Javeriana Educación Continua - Administrador</title>
        <link href="Olds/css/generales.css" rel="stylesheet" type="text/css" />
        <script src="js/jquery-2.1.3.min.js"></script>
        <script src="js/customAdmin.js"></script>
    </head>
    <body>
        <div class="container_all">
            <div class="total_width">
                <div class="programas">
                    <div class="seleccion">
                        <?php if (!empty($_SESSION)) { ?>
                            <h2>Reportes</h2>
                            <ul>
                                <li><a href="../views/reporteFacultades.php">Listado de Facultades</a></li>
                                <li><a href="../views/reporteCategorias.php">Listado de Categor&iacute;as</a></li>
                                <li><a href="../views/reporteProgramas.php">Listado de Programas</a></li>
                                <li><a href="../views/reporteRegistrados.php">Listado de Registrados</a></li>
                            </ul>
                            <h2>Administración</h2>
                            <ul>
                                <li><a href="listEntities.php?entidad=facultad">Configuración de Facultades</a></li>
                                <li><a href="listEntities.php?entidad=categoria">Configuración de Categor&iacute;as</a></li>
                                <li><a href="listEntities.php?entidad=programa">Configuración de Programas</a></li>
                                <li><a href="listEntities.php?entidad=usuario">Configuración de Usuarios</a></li>
                            </ul>
                        <?php } ?>
                    </div>
                    <div class="programa">
                        <?php if (!empty($_SESSION)) { ?>
                            <h3>Generador Links</h3>
                            <div class="combos">
                                <div class="un_campo">
                                    <select id="sfacultades" onchange="getCategorias()">
                                        <option>Facultad</option>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <select id="scategorias" onchange="getProgramas()">
                                        <option>Categor&iacute;a</option>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <select id="sprogramas" onchange="getPrograma()">
                                        <option value=''>Programa</option>
                                    </select>
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">

                                    <input type="text" id="origen" name="origen" class="origen" placeholder="Origen" />
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <br/>
                                    <input type="button" value="Generar Link" class="btnlink"
                                           onclick="createLink()" />
                                    <div class="clear"></div>
                                </div>
                                <div class="un_campo">
                                    <div class="clear"></div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                            <div class="porque">
                                <p id="link" class="link"></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="formulario">
                    <?php if (empty($_SESSION)) { ?>
                        <div class="un_campo">
                            <input type="text" size="60" id="Email" name="" value=""
                                   placeholder="Email" maxlength="128" />
                            <div class="clear"></div>
                        </div>
                        <div class="un_campo">
                            <input type="password" size="60" id="Password" name="" value=""
                                   placeholder="Password" maxlength="128" />
                            <div class="clear"></div>
                        </div>
                        <div class="un_campo">
                            <input type="button" value="Ingresar" class="submit"
                                   onclick="login()" />
                            <div class="clear"></div>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="un_campo">
                            <h4 class='saludo'>Bienvenid@ <?php echo $_SESSION['nombre'] ?> </h4>
                            <input type="button" value="Salir" class="submit"
                                   onclick="logout()" />
                            <div class="clear"></div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="container_all_footer">
            <div class="total_width">
                <p class="footer">Pontificia Universidad Javeriana Bogot&aacute;</p>
            </div>
            <div class="clear"></div>
        </div>
    </body>
</html>