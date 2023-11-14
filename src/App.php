<?php 

namespace M2i\Books;

use AltoRouter;

class App extends AltoRouter
{
    public function run()
    {
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        $match = $this->match();

        if (is_array($match)) {
            [$controller, $list] = explode('@', $match['target']); // UserController@list
            $controller = 'M2i\Mvc\Controller\\' . $controller;
            $object = new $controller();
            $object->$list(...$match['params']);
        } else {
            http_response_code(404);
            View::render('404');
        }

    }
}