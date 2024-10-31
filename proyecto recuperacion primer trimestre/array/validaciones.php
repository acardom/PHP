<?php

    /**
     * Método que devuelve valor de una clave del REQUEST limpia o cadena vacía si no existe
     * @param {string} - Clave del REQUEST de la que queremos obtener el valor
     * @return {string}
     */
    function obtenerValorCampo(string $campo): string{
        if (isset($_REQUEST[$campo])){
            $valor = trim(htmlspecialchars($_REQUEST[$campo], ENT_QUOTES, "UTF-8"));
        }else{
            $valor = "";
        }
        
        return $valor;
    }


    /**
     * Método que valida si un texto no esta vacío
     * @param {string} - Texto a validar
     * @return {boolean}
     */
    function validar_requerido(string $texto): bool
    {
        return !(trim($texto) == '');
    }

    /**
     * Método que valida si es un número entero 
     * @param {string} - Número a validar
     * @return {bool}
     */
    function validar_entero(string $numero): bool
    {
        return (filter_var($numero, FILTER_VALIDATE_INT) === FALSE) ? False : True;
    }

    function validar_decimal(string $numero): bool
    {
        return (filter_var($numero, FILTER_VALIDATE_FLOAT) === FALSE) ? False : True;
    }

    /**
     * Método que valida si es un número entero 
     * @param {string} - Número a validar
     * @param {int} - Límite inferior del número a validar
     * @param {int} - Límite superior del número a validar
     * @return {array}
     */
    function validar_entero_limites(string $numero, int $limiteInferior,int  $limiteSuperior): array
    {
        $info = ["validacion" => True, "error" => ""];
        if ($numero == "" || !is_numeric($numero)) {
             $info["validacion"]  = False;
             $info["error"] = "No ha escrito un número";
        } elseif (!ctype_digit($numero)) {
            $info["validacion"]  = False;
            $info["error"] = "No ha escrito un número entero";
        } elseif ($numero < $limiteInferior || $numero > $limiteSuperior) {
            $info["validacion"]  = False;
            $info["error"] = "El número debe estar entre $limiteInferior y $limiteSuperior.";
       }
        return $info;
    }

    // Función para inicializar las variables de sesión del ejercicio de Record de Dados
    function iniciarVariablesDados() {
        $_SESSION["dadosDiferentes"] = 0;
        $_SESSION["dado1"] = 1;
        $_SESSION["dado2"] = 1;
        $_SESSION["dado3"] = 1;
        $_SESSION["dado4"] = 1; 
        $_SESSION["dado5"] = 1;
        $_SESSION["record"] = 5;
    }

    // Función para inicializar las variables de sesión del ejercicio de Record de Dados
    function iniciarVariablesCartas() {
        $_SESSION["cartasDiferentes"] = 0;
        $_SESSION["carta1"] = rand(1,10);
        $_SESSION["carta2"] = rand(1,10);
        $_SESSION["carta3"] = rand(1,10);
        $_SESSION["fin"] = false;
        $_SESSION["intentos"] = 0;
        $_SESSION["trio"] = "";
    }
?>