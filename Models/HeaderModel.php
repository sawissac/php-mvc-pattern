<?php

namespace Models;

class HeaderModel
{
    private $type = "login";

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }
}
