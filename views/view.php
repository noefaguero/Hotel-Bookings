<?php

abstract class View {
    
    public $metadata;
    public $styleSheets;
    public $scripts;
    public $title;
    public $header;
    public $main;
    
    public function __construct() {
        $this->metadata = null;
        $this->styleSheets = null;
        $this->scripts = null;
        $this->header = false; // En la página de inicio de sesión no aparece
        $this->main = "";
    }

    public function setMetadata($metadata){
        $output;
        foreach ($metadata as $name => $content) {
            $output .= '<meta name="' . $name . '" content="' . $content . '">';
        }
        $this->metadata = $output;
    }

    public function setStyleSheet($styleSheet){
        $output="";
        foreach ($styleSheets as $styleSheet) {
            $output .= '<link rel="styleSheet" href="' . $styleSheet . '">';
        }
        $this->stylesheet = $output;
    }

    public function setScript($scripts){
        $output="";
        foreach ($scripts as $script) {
            $output .='<script defer src="' . $script . '"></script>';
        }
        $this->script = $output;
    }

    public function setTitle($title){
        $this->title = 'HEAVEN ROOMS | ' . $title;
    }
    
}