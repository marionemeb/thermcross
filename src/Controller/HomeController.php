<?php 

namespace App\Controller;

use App\Controller\Renderer;

class HomeController
{
    /**
     * @var Renderer
     */
    private $render;

    public function __construct()
    {
        $this->render = new Renderer();
    }

    /**
     * Redirection welcome page
     */
    function index()
    {
        return $this->render->render('welcome');
    }
}

