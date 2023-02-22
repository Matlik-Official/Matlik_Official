<?php

namespace App\Core\Database;

class QueryBuilder {

    protected $pdo;

    public function __construct ( \PDO $pdo ) {

        $this->pdo = $pdo;

    }

    public function selectAll ( $table ) {

        $stmt = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY id DESC");
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS);

    }

    public function select( $table, $id ) {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = {$id} ORDER BY id DESC;");
        $stmt->execute();

        $data = $stmt->fetchAll(\PDO::FETCH_CLASS);
        return $data[0];
    }

    public function insert ( $table, $parameters ) {

        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s);',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters)),
        );

        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($parameters);
        } catch ( \Exception $e ) {
            die('Ups! Midagi läks valesti!');
        }

    }

    public function update( $table, $parameters, $id, $route ) {

        $stmt = $this->pdo->prepare("UPDATE $table SET $parameters WHERE id = $id");
        $stmt->execute();

        $data = $stmt->fetchAll(\PDO::FETCH_CLASS);

        header('Location: ' . $route);
    }

    public function delete( $table, $id, $route ) {

        $stmt = $this->pdo->prepare("DELETE FROM {$table} WHERE id = {$id}");
        $stmt->execute();

        $data = $stmt->fetchAll(\PDO::FETCH_CLASS);

        header('Location: ' . $route);
    }

}