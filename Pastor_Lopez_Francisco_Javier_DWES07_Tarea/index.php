<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if(isset($_POST['dni']) && isset($_POST['nombre']) && isset($_POST['ciudad'])){
            echo $_POST['dni'].$_POST['nombre'].$_POST['ciudad'];
        }
        
        ?>

        <form name="formulario" method="post" action="" onsubmit="return comprueba()">
            DNI: <input type="text" id="dni" name="dni" value="" placeholder="123456789a"/>
            NOMBRE:<input type="text" id="nombre" name="nombre" value="" placeholder="Nombre Apellido"/>
            CIUDAD:<input type="text" id="ciudad" name="ciudad" value="" placeholder="Ciudad"/>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
    <script>
        /***
         * Comprueba los campos con Js
         * @returns {Boolean}
         */
        const comprueba = () => {
            const dni = document.getElementById("dni");
            const nombre = document.getElementById("nombre");
            const ciudad = document.getElementById("ciudad");
            if(!validarDNI(dni.value)){
                alert("Dni incorrecto");
                return false;
            }
            if(!validarNombre(nombre.value)){
                alert('Nombre incorrecto, use "Nombre Apellido"')
                return false
            }
            if(!validarCiudad(ciudad.value)){
                alert('Ciudad incorrecta, use "Ciudad"')
                return false
            }
            return true;
        }
        
        /**
         * Valida que el nombre de la ciudad este capitalizado
         * @param {type} ciudad
         * @returns {Boolean}
         */
        const validarCiudad = (ciudad) => /^[A-Z]{1}[a-z]+$/.test(ciudad)
        
        /**
         * Valida el nombre si esta capitalizado el nombre y el apellido
         * @param {type} dni
         * @returns {Boolean}
         */
        const validarNombre = (nombre) => /^[A-Z]{1}[a-z]+\s[A-Z]{1}[a-z]+$/.test(nombre)
        
        /**
         * Comprobamos que el DNI sea valido
         * @param {type} dni
         * @returns {Boolean}
         */
        const validarDNI = (dni) => {
            const er_dni = /^\d{8}[a-zA-Z]$/;
            if (er_dni.test(dni)) {
                const dni_letra = dni.substr(dni.length-1,1);
                const dni_numero = dni.substr(0, dni.length -1);
                const dni_letras = "TRWAGMYFPDXBNJZSQVHLCKE";
                const letra = dni_letras.charAt(parseInt(dni_numero) % 23);
                if(letra === dni_letra){
                    return true;
                }
            }
                return false;
        };
    </script>
</html>
