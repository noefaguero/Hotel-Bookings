<?php

// Elementos del encabezado comunes para todas las secciones
$elementosComunes = [
    [
        tag => "meta",
        attrs => [
            charset => "UTF-8"
        ]
    ],
    [
        tag => "meta",
        attrs => [
            name => "viewport",
            content => "width=device-width, initial-scale=1.0"
        ]
    ],
    [
        tag => "link",
        attrs => [
            rel => "stylesheet",
            href => "./css/bootstrap.min.css"
        ]
    ],
    [
        tag => "link",
        attrs => [
            rel => "stylesheet",
            href => "./css/style.css"
        ]
    ],
    [
        tag => "script",
        attrs => [
            defer => true,
            src => "./js/bootstrap.bundle.min.js"
        ],
        content => ""
    ]
];


function printHead($seccion, $elementosNuevos = []) {

    // Definir titulo de la sección
    $titulo =  [tag => "title", content => "Hoteles | " . $seccion];
    array_push($elementosComunes, $titulo);
    // Array de elementos del encabezado
    $items = count($elementos) == 0 ? $elementosComunes : array_push($elementosComunes, ...$elementosNuevos);
    
    // Abrir encabezado
    $salida = '<head>';
    // Recorrer array para construir la cadena de cada elemento
    foreach ($items as $item) {
        $elemento = ""; 
        // Abrir etiqueta
        $elemento .= '<' . $item["tag"];
        // Recorrer atributos
        if (isset($item["attrs"])) {
            foreach ($item["attrs"] as $attr => $value) $elemento .= ' ' . $attr . '="' . $value . '"';
        }
        // Añadir contenido y cerrar etiqueta
        $elemento .= !isset($item["content"]) ? '/>' : '>' . $item["content"] . '</' . $item["tag"] . '>';
        $salida .= $elemento;
    }
    // Cerrar encabezado
    $salida .= '</head>';

    echo $salida;
}
