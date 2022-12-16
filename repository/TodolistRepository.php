<?php

namespace Repository {

  use Entity\Todolist;
  use PDO;

  interface TodolistRepository
  {

    function save(Todolist $todolist): void;

    function remove(int $number): bool;

    function findAll(): array;
  }

  class TodolistRepositoryImpl implements TodolistRepository
  {

    public array $todolist = [];

    private PDO $connection;

    public function __construct(PDO $connection)
    {
      $this->connection = $connection;
    }

    function save(Todolist $todolist): void
    {
      $sql = "INSERT INTO todolist(todo) VALUES (?)";

      $statement = $this->connection->prepare($sql);

      $statement->execute([$todolist->getTodo()]);
    }

    function remove(int $number): bool
    {
      // if (sizeof($this->todolist) < $number) {
      //   return false;
      // }

      // for ($i = $number; $i < sizeof($this->todolist); $i++) {
      //   $this->todolist[$i] = $this->todolist[$i + 1];
      // }

      // unset($this->todolist[sizeof($this->todolist)]);

      // return true;

      $sql = "SELECT id FROM todolist WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$number]);

      if ($statement->fetch()) {

        $sql = "DELETE FROM todolist WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$number]);
        return true;
      } else {
        return false;
      }
    }


    function findAll(): array
    {
      $sql = "SELECT id, todo FROM todolist";
      $statement = $this->connection->prepare($sql);
      $statement->execute();

      $result = [];

      foreach ($statement as $row) {
        $todolist = new Todolist();
        $todolist->setId($row["id"]);
        $todolist->setTodo($row["todo"]);

        $result[] = $todolist;
      }

      return $result;
    }
  }
}
