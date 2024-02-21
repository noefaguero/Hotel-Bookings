<?php

/**
 * Clase abstracta que representa una vista en una aplicación web.
 */
abstract class View {
    
    /**
     * @var string|null $meta Elementos meta adicionales.
     */
    public $meta;

    /**
     * @var string|null $styleSheets Elementos link para las hojas de estilo adicionales.
     */
    public $styleSheets;

    /**
     * @var string|null $scripts Elementos script para los scripts de la página.
     */
    public $scripts;

    /**
     * @var string $title Título de la página.
     */
    public $title;

    /**
     * @var bool $header Indica si se debe mostrar el encabezado.
     */
    public $header;

    /**
     * @var string $main Contenido principal de la página.
     */
    public $main;
    
    /**
     * Inicializa las propiedades por defecto.
     */
    public function __construct() {
        $this->metadata = null;
        $this->styleSheets = null;
        $this->scripts = null;
        $this->header = false; // En la página de inicio de sesión no aparece
        $this->main = "";
    }

    /**
     * Establece los elementos meta de la página.
     *
     * @param array $meta Array asociativo de cada elemennto meta con nombre y contenido.
     */
    public function setMeta($meta) {
        $output;
        foreach ($meta as $name => $content) {
            $output .= '<meta name="' . $name . '" content="' . $content . '">';
        }
        $this->meta = $output;
    }

    /**
     * Establece los elementos link para las hojas de estilo.
     *
     * @param array $styleSheets Array con las rutas de las hojas de estilo.
     */
    public function setStyleSheet($styleSheet) {
        $output="";
        foreach ($styleSheets as $styleSheet) {
            $output .= '<link rel="styleSheet" href="' . $styleSheet . '">';
        }
        $this->stylesheet = $output;
    }

    /**
     * Establece los elementos script de la página.
     *
     * @param array $scripts Array con las rutas de los scripts.
     */
    public function setScript($scripts) {
        $output="";
        foreach ($scripts as $script) {
            $output .='<script defer src="' . $script . '"></script>';
        }
        $this->scripts = $output;
    }

    /**
     * Establece el título de la página.
     *
     * @param string $title Título de la página.
     */
    public function setTitle($title) {
        $this->title = 'HEAVEN ROOMS | ' . $title;
    }
    
}