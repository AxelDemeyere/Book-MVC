<?php

namespace M2i\Mvc\Model;

use M2i\Mvc\Database;

class Model
{
    public static function getTable()
    {
        $class = static::class;
        $class = strrchr($class, '\\');

        return strtolower(substr($class, 1)) . 's';
    }

    public static function all()
    {

        $table = static::getTable();
        $sql = 'SELECT * FROM ' . $table;
        $query = Database::get()->query($sql);

        return $query->fetchAll();
    }

    public static function find($id)
    {

        $table = static::getTable();
        $sql = "SELECT * FROM $table WHERE id = :id";
        $query = Database::get()->prepare($sql);
        $query->execute(['id' => $id]);

        return $query->fetch();
    }

    public function save($fields)
    {
        $table = static::getTable();

        $column = implode(',', $fields); // ['name', 'age'] => name, age
        $values = [];

        foreach ($fields as $field) {
            $values[':' . $field] = $this->$field;
        }

        $parameters = implode(', ', array_keys($values));
        $sql = "INSERT INTO $table ($column) VALUES ($parameters)";
        $query = Database::get()->prepare($sql);
        return $query->execute($values);

        
    }

    public function delete(int $id)
    {
        $query = Database::get()->prepare('DELETE FROM books WHERE id = :id');
        $query->execute(['id' => ($id)]);
        header('Location: /livres');
    }
}
