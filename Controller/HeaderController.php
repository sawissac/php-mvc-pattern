<?php

namespace Controller;

require('../Models/HeaderModel.php');

use Models\HeaderModel;

class HeaderController{
    private $headerModel;

    public function __construct() {
        $this->headerModel = new HeaderModel();
    }
    public function success(){
        $this->headerModel->setType("success");
    }
    
    public function output(){
        $data = $this->headerModel->getType();
        include('../View/HeaderView.php');
    }
}