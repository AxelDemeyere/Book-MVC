<?php

// namespace 
namespace M2i\Mvc\Controller;


// use

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

// class 
class BooksController
{

    // function
    public function list()
    {
        $title = 'Livres';
        $books = Book::all();
        
        return View::render('home',
        [
            'books' => $books,
            'title' => $title,
        ]);

    }
}
