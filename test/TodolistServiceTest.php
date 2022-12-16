<?php

use Config\Database;
use Entity\Todolist;
use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;

require_once __DIR__ . "/../Entity/Todolist.php";
require_once __DIR__ . "/../Repository/TodolistRepository.php";
require_once __DIR__ . "/../Service/TodolistService.php";
require_once __DIR__ . "/../config/Database.php";

function testShowTodolist()
{
  $connection = Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Databases");

  $todolistService->showTodolist();
}
function testAddTodolist()
{
  $connection = Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP Databases");

  $todolistService->showTodolist();
}
function testRemoveTodolist()
{
  $connection = Database::getConnection();
  $todolistRepository = new TodolistRepositoryImpl($connection);

  $todolistService = new TodolistServiceImpl($todolistRepository);

  $todolistService->showTodolist();

  echo $todolistService->removeTodolist(2);
  $todolistService->showTodolist();

  // $todolistService->removeTodolist(1);
  // $todolistService->showTodolist();

  // $todolistService->removeTodolist(2);
  // $todolistService->showTodolist();
}

testShowTodolist();
