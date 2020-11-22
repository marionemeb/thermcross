<?php

namespace App\Controller;

class Renderer{

    /**
     * Return routes
     */
    public function render(string $view, array $datas = [])
    {
        extract($datas);
        require_once __DIR__ . '/../View/'.$view.'.php';
    }
    
}