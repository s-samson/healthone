<?php

class Review
{
    public $id;
    public $name;
    public $user_id;
    public $description;
    public $date;
    public $stars;

    public function __construct(){
        settype($this->id,'integer');
    }


}