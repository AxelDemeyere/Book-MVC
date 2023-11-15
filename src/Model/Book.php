<?php

namespace M2i\Mvc\Model;

class Book extends Model
{
    
    public $title;
    public $price;
    public $isbn;
    public $discount;
    public $author;
    public $published_at;
    public $image;
    public $errors = [];
}

