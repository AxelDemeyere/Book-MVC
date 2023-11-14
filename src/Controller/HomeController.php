<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class HomeController
{
    
    public function index()
    {
        $books = Book::all();
        return View::render('home', ['books'=> $books,]);
    }
}
