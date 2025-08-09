<?php

namespace Controllers;

// NB: controllers = pour les actions

abstract class Controller
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }
}
