<?php
namespace M2i\Books;

class View {

    public static function render($view, $data = []) 
    {
        if(!file_exists('../views/'.$view.'.html.php')) {
            throw new \Exception("La vue $view n'existe pas.");
        }

        foreach ($data as $variable => $value)
        {
            $$variable = $value;
        }
        require '../views'.$view.'html.php';
    }
}