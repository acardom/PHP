<?php
    session_name("juego");
    session_start();
    require_once("validaciones.php");

    $accion  = obtenerValorCampo("accion");

    $jugador1 = "X";
    $jugador2 = "0";

    if (!isset($_SESSION["casilla1"]) or !isset($_SESSION["casilla2"]) or !isset($_SESSION["casilla2"]) 
    or !isset($_SESSION["casilla4"]) or !isset($_SESSION["casilla5"]) or !isset($_SESSION["casilla6"])
    or !isset($_SESSION["casilla7"]) or !isset($_SESSION["casilla8"]) or !isset($_SESSION["casilla9"])){
        $_SESSION["casilla1"] = "casilla.png";
	    $_SESSION["casilla2"] = "casilla.png";
	    $_SESSION["casilla3"] = "casilla.png";
        $_SESSION["casilla4"] = "casilla.png";
	    $_SESSION["casilla5"] = "casilla.png";
	    $_SESSION["casilla6"] = "casilla.png";
        $_SESSION["casilla7"] = "casilla.png";
	    $_SESSION["casilla8"] = "casilla.png";
	    $_SESSION["casilla9"] = "casilla.png";
        $_SESSION["win"] = false;
    }

    if ($accion == "inicio"){
        header("Location:index.php");
    }

    if ($accion == "reinicio" or !isset($_SESSION["empezado"])){
        $_SESSION["win"] = false;
        $contador = 0;
        $win_jugador1 = 0;
        $win_jugador2 = 0;
        $_SESSION["winpj1"] = $win_jugador1;
        $_SESSION["winpj2"] = $win_jugador2;
        $_SESSION["ronda"] = $contador;
        $_SESSION["empezado"] = true;
        $_SESSION["casilla1"] = "casilla.png";
	    $_SESSION["casilla2"] = "casilla.png";
	    $_SESSION["casilla3"] = "casilla.png";
        $_SESSION["casilla4"] = "casilla.png";
	    $_SESSION["casilla5"] = "casilla.png";
	    $_SESSION["casilla6"] = "casilla.png";
        $_SESSION["casilla7"] = "casilla.png";
	    $_SESSION["casilla8"] = "casilla.png";
	    $_SESSION["casilla9"] = "casilla.png";
        header("Location:juego.php");
    }

    if ($accion == "jugar"){
        $_SESSION["casilla1"] = "casilla.png";
	    $_SESSION["casilla2"] = "casilla.png";
	    $_SESSION["casilla3"] = "casilla.png";
        $_SESSION["casilla4"] = "casilla.png";
	    $_SESSION["casilla5"] = "casilla.png";
	    $_SESSION["casilla6"] = "casilla.png";
        $_SESSION["casilla7"] = "casilla.png";
	    $_SESSION["casilla8"] = "casilla.png";
	    $_SESSION["casilla9"] = "casilla.png";
        $_SESSION["empezado"] = true;
        $_SESSION["win"] = false;
        $contador = 0;
        $_SESSION["ronda"] = $contador;
        header("Location:juego.php");
    }

    if (($accion == 1 or $accion == 2 or $accion == 3
    or $accion == 4 or $accion == 5 or $accion == 6
    or $accion == 7 or $accion == 8 or $accion == 9)
    and ($_SESSION["win"] == false or !isset($_SESSION["win"]))){
        if ($_SESSION["casilla$accion"] != "X.png" and $_SESSION["casilla$accion"] != "0.png"){
            switch ($accion) {
                case 1:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla1"] = "X.png";
                    }else{
                        $_SESSION["casilla1"] = "0.png";
                    }
                    break;
                case 2:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla2"] = "X.png";
                    }else{
                        $_SESSION["casilla2"] = "0.png";
                    }
                    break;
                case 3:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla3"] = "X.png";
                    }else{
                        $_SESSION["casilla3"] = "0.png";
                    }
                    break;
                case 4:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla4"] = "X.png";
                    }else{
                        $_SESSION["casilla4"] = "0.png";
                    }
                    break;
                case 5:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla5"] = "X.png";
                    }else{
                        $_SESSION["casilla5"] = "0.png";
                    }
                    break;
                case 6:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla6"] = "X.png";
                    }else{
                        $_SESSION["casilla6"] = "0.png";
                    }
                    break;
                case 7:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla7"] = "X.png";
                    }else{
                        $_SESSION["casilla7"] = "0.png";
                    }
                    break;
                case 8:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla8"] = "X.png";
                    }else{
                        $_SESSION["casilla8"] = "0.png";
                    }
                    break;
                case 9:
                    if ($_SESSION["ronda"]%2==0){
                        $_SESSION["casilla9"] = "X.png";
                    }else{
                        $_SESSION["casilla9"] = "0.png";
                    }
                    break;
            }

        $_SESSION["ronda"]++;

        }

        if (($_SESSION["casilla1"] == "X.png" && $_SESSION["casilla2"] == "X.png" && $_SESSION["casilla3"] == "X.png")
        or ($_SESSION["casilla4"] == "X.png" && $_SESSION["casilla5"] == "X.png" && $_SESSION["casilla6"] == "X.png")
        or ($_SESSION["casilla7"] == "X.png" && $_SESSION["casilla8"] == "X.png" && $_SESSION["casilla9"] == "X.png")
        or ($_SESSION["casilla1"] == "X.png" && $_SESSION["casilla4"] == "X.png" && $_SESSION["casilla7"] == "X.png")
        or ($_SESSION["casilla2"] == "X.png" && $_SESSION["casilla5"] == "X.png" && $_SESSION["casilla8"] == "X.png")
        or ($_SESSION["casilla3"] == "X.png" && $_SESSION["casilla6"] == "X.png" && $_SESSION["casilla9"] == "X.png")
        or ($_SESSION["casilla1"] == "X.png" && $_SESSION["casilla5"] == "X.png" && $_SESSION["casilla9"] == "X.png")
        or ($_SESSION["casilla7"] == "X.png" && $_SESSION["casilla5"] == "X.png" && $_SESSION["casilla3"] == "X.png")){

            $_SESSION["ganador"] = "ganador jugador1 (X)";
            $_SESSION["winpj1"]++;
            $_SESSION["win"] = true;

        }

        if (($_SESSION["casilla1"] == "0.png" && $_SESSION["casilla2"] == "0.png" && $_SESSION["casilla3"] == "0.png")
        or ($_SESSION["casilla4"] == "0.png" && $_SESSION["casilla5"] == "0.png" && $_SESSION["casilla6"] == "0.png")
        or ($_SESSION["casilla7"] == "0.png" && $_SESSION["casilla8"] == "0.png" && $_SESSION["casilla9"] == "0.png")
        or ($_SESSION["casilla1"] == "0.png" && $_SESSION["casilla4"] == "0.png" && $_SESSION["casilla7"] == "0.png")
        or ($_SESSION["casilla2"] == "0.png" && $_SESSION["casilla5"] == "0.png" && $_SESSION["casilla8"] == "0.png")
        or ($_SESSION["casilla3"] == "0.png" && $_SESSION["casilla6"] == "0.png" && $_SESSION["casilla9"] == "0.png")
        or ($_SESSION["casilla1"] == "0.png" && $_SESSION["casilla5"] == "0.png" && $_SESSION["casilla9"] == "0.png")
        or ($_SESSION["casilla7"] == "0.png" && $_SESSION["casilla5"] == "0.png" && $_SESSION["casilla3"] == "0.png")){

            $_SESSION["ganador"] = "ganador jugador2 (0)";
            $_SESSION["winpj2"]++;
            $_SESSION["win"] = true;

        }
    }

    if ($_SESSION["ronda"]%2 == 0){
        $_SESSION["turno"] = $jugador1;
    }else{
        $_SESSION["turno"] = $jugador2;
    }

            
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="juego.css">
        <meta charset="UTF-8">
        <title>Juego</title>
    </head>
    <body>
        <nav class="todo">
            <div id='cabecera'>
                <h1><u>3 en raya</u></h1>
                <h3>Turno : <?php print "  <class=\"aviso\">$_SESSION[turno]</p>\n"; ?> </h3>
                <h3>Ronda : <?php print "  <class=\"aviso\">$_SESSION[ronda]</p>\n"; ?></h3>
                <h3>Victorias jugador1 (X) : <?php print "  <class=\"aviso\">$_SESSION[winpj1]</p>\n"; ?></h3>
                <h3>Victorias jugador2 (0) : <?php print "  <class=\"aviso\">$_SESSION[winpj2]</p>\n"; ?></h3>
                
                <form action="juego.php" method="post">
                <?php
                    echo "<button type=submit name=accion value=1><img src='img/$_SESSION[casilla1]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=2><img src='img/$_SESSION[casilla2]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=3><img src='img/$_SESSION[casilla3]' width=100 height=100></button></p>";

                    echo "<button type=submit name=accion value=4><img src='img/$_SESSION[casilla4]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=5><img src='img/$_SESSION[casilla5]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=6><img src='img/$_SESSION[casilla6]' width=100 height=100></button></p>";

                    echo "<button type=submit name=accion value=7><img src='img/$_SESSION[casilla7]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=8><img src='img/$_SESSION[casilla8]' width=100 height=100></button>";
                    echo "<button type=submit name=accion value=9><img src='img/$_SESSION[casilla9]' width=100 height=100></button></p>";

                    echo "<p><button type=\"submit\" name=\"accion\" value=\"reinicio\">Reiniciar</button>";
                    echo "<button type=\"submit\" name=\"accion\" value=\"jugar\">Jugar</button>";
                    echo "<button type=\"submit\" name=\"accion\" value=\"inicio\">Volver al inicio</button></p>";

                    if (isset($_SESSION["ganador"])){
                        print "<h1>$_SESSION[ganador]</h1>\n";
                        $_SESSION["ganador"] = "";
                        $accion = "jugar";
                    }

                ?>
                </form>
            </div>
            </div>
        </nav>
    </body>
</html>