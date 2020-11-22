<?php

namespace App\Controller;

use App\Model\DataManager;
use App\Controller\Renderer;

class DataController
{
    /**
     * @var DataManager
     */
    private $manager;

    /**
     * @var Renderer
     */
    private $render;

    public function __construct()
    {
        $this->manager = new DataManager();
        $this->render = new Renderer();
    }

    /**
     * Redirection to display.php
     */
    function index()
    {
        $datas = $this->manager->findAll(); 
        $dates = $this->manager->findAllDates();
        return $this->render->render('display', ['datas' => $datas, 'dates' => $dates]);
    }
}

