<?php

namespace M2i\Mvc\Controller {

    use M2i\Mvc\Model\Book;
    use M2i\Mvc\View as MvcView;

    class CreateController
    {
        public function insert($sql, $params)
        {
            global $db;
            $query = $db->prepare($sql);
            return $query->execute($params);
        }

        public function create()
        {
            $books = new Book();
            $books->title = $_POST['title'] ?? null;
            $books->price = $_POST['price'] ?? null;
            $books->isbn = $_POST['isbn'] ?? null;
            $books->discount = $_POST['discount'] ?? null;
            $books->author = $_POST['author'] ?? null;
            $books->published_at = $_POST['published_at'] ?? null;
            $books->image = $_POST['image'] ?? null;
            $errors = [];

            if (!empty($_POST)) {
                if (empty($title)) {
                    $errors['title'] = 'Le titre est invalide.';
                }

                if ($books->price < 1 || $books->price > 100) {
                    $errors['price'] = 'Le prix est invalide.';
                }

                if (!empty($books->discount) && $books->discount > 100 || $books->discount < 0) {
                    $errors['$discount'] = 'La remise est invalide';
                }

                if (strlen($books->isbn) != 10 && strlen($books->isbn) != 13) {
                    $errors['isbn'] = 'L\'isbn est invalide.';
                }

                if (empty($books->author)) {
                    $errors['author'] = 'L\'auteur est invalide.';
                }

                $checked = explode('-', $books->published_at);
                if (!checkdate($checked[1] ?? '', $checked[2] ?? '', (int) $checked[0])) {
                    $errors['published_at'] = 'La date est invalide';
                }
                if (empty($error)) {
                    // Dans le save on met le nom des colonnes de la table
                    $books->save(['title', 'price', 'discount', 'isbn', 'author', 'published_at']);
                }
            }
            header('Location: /livres');
            return MvcView::render('create');
        }
        
    }
}
