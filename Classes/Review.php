<?php

class Review
{
    public $id;
<<<<<<< HEAD
    public $user_id;
    public $name;
    public $date;
    public $description;
    public $stars;
    public $product_id;
=======
    public $name;
    public $user_id;
    public $description;
    public $date;
    public $stars;
>>>>>>> 597c3bccbaefdee2ec828665cf59de943077ff49

    public function __construct(){
        settype($this->id,'integer');
    }


}