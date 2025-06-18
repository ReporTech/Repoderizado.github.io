<?php

header('Content-Type: application/json'); // Asegúrate de que el tipo de contenido sea JSON

// Manejo de errores en PHP
try {
    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];

        $chistes = [
            "Jorge" => "¿Qué tienen en común un niño y un globo? - Los dos estallan cuando los pinchas.",
            "Miguel" => "¿Cuántos hombres hacen falta para abrir una cerveza? - Ninguno. Debería estar abierta para cuando ella la traiga.",
            "Roberto" => "Mi novia, hablando de astronomía, me preguntó cómo mueren las estrellas. - Normalmente por sobredosis, le dije.",
            "Chula" => "¿Qué tienen en común Miguel Ángel y Kurt Cobain? - Que los dos usaros sus cerebros para pintar el techo.",
            "Balbuena" => "El humor negro es como los esclavos, hoy en día muy pocos tenemos uno.",
            "Gael" => "Su humor era tan negro que le disparaba la policía.",
            "Josue" => "¿Qué es peor que seis niños colgados de un árbol? - Un niño colgado de seis árboles."
            
        ];

        if (array_key_exists($nombre, $chistes)) {
            $chiste = $chistes[$nombre];
        } else {
            $chiste = "No hay chistes.";
        }

        // Responder con JSON
        echo json_encode(["chiste" => $chiste]);
    } else {
        // Si no se envió el nombre
        echo json_encode(["error" => "No se envió ningún nombre."]);
    }
} catch (Exception $e) {
    // En caso de error, responder con el error en JSON
    echo json_encode(["error" => "Ocurrió un error en el servidor.", "details" => $e->getMessage()]);
}
?>