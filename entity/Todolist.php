<?php

namespace Entity {
  class Todolist
  {
    private string $todo;
    private int $id;

    public function __construct(string $todo = "")
    {
      $this->todo = $todo;
    }

    /**
     * Get the value of todo
     */
    public function getTodo()
    {
      return $this->todo;
    }

    /**
     * Set the value of todo
     *
     * @return  self
     */
    public function setTodo($todo)
    {
      $this->todo = $todo;

      return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
      return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
      $this->id = $id;

      return $this;
    }
  }
}
