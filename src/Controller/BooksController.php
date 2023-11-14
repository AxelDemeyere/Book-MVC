<?php

namespace M2i\Mvc\Controller;

use M2i\Mvc\Model\Book;
use M2i\Mvc\View;

class BooksController
{
    public function index()
    {
        $books = Book::all();
        return View::render('books', ['books'=> $books]);
    }

    public function show($id)
    {

        $books = Book::find($id);

        if (!$books) {
            http_response_code(404);
            return View::render('404');
        }

        return View::render('book', ['book' => $books]);
    }




}
