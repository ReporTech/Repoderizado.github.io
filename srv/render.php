<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Lista de personas con nombres
    $lista = [
        [
            "nombre" => "Jorge"
        ],
        [
            "nombre" => "Miguel"
        ],
        [
            "nombre" => "Roberto"
        ],
        [
            "nombre" => "Chula"
        ],
        [
            "nombre" => "Balbuena"
        ],
        [
            "nombre" => "Gael"
        ],
        [
            "nombre" => "Josue"
        ],

    ];

    $chistes = [
        "Jorge" => "¿Qué tienen en común un niño y un globo? - Los dos estallan cuando los pinchas.",
        "Miguel" => "¿Cuántos hombres hacen falta para abrir una cerveza? - Ninguno. Debería estar abierta para cuando ella la traiga.",
        "Roberto" => "Mi novia, hablando de astronomía, me preguntó cómo mueren las estrellas. - Normalmente por sobredosis, le dije.",
        "Chula" => "¿Qué tienen en común Miguel Ángel y Kurt Cobain? - Que los dos usaros sus cerebros para pintar el techo.",
        "Balbuena" => "El humor negro es como los esclavos, hoy en día muy pocos tenemos uno.",
        "Gael" => "Su humor era tan negro que le disparaba la policía.",
        "Josue" => "¿Qué es peor que seis niños colgados de un árbol? - Un niño colgado de seis árboles."
        
    ];

    // Genera el código HTML de la lista con estilo Material Design.
    $render = "";
    foreach ($lista as $modelo) {
        // Codifica el nombre para evitar inyección de código
        $nombre = htmlentities($modelo["nombre"]);
        
        // Busca el chiste correspondiente al nombre
        $chiste = isset($chistes[$nombre]) ? htmlentities($chistes[$nombre]) : "Chiste no disponible.";
        
        // Crea los elementos HTML con clases MD
        $render .=
        "<li class='md-two-line'>
            <span class='headline'>{$nombre}</span>
            <span class='supporting'>{$chiste}</span>
         </li>";
    }

    // Devuelve el HTML generado en formato JSON
    devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {
    // Manejo de errores
    devuelveErrorInterno($error);
}