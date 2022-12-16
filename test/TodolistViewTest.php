<?php

require_once __DIR__ . '/../entity/Todolist.php';
require_once __DIR__ . '/../repository/TodolistRepository.php';
require_once __DIR__ . '/../service/TodolistService.php';
require_once __DIR__ . '/../view/TodolistView.php';
require_once __DIR__ . '/../helper/InputHelper.php';

use Repository\TodolistRepositoryImpl;
use Service\TodolistServiceImpl;
use View\TodolistView;

function testViewShowTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodolistView($todolistService);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP");

  $todolistView->showTodolist();
}
function testAddShowTodolist(): void
{
  $todolistRepository = new TodolistRepositoryImpl();
  $todolistService = new TodolistServiceImpl($todolistRepository);
  $todolistView = new TodolistView($todolistService);

  $todolistService->addTodolist("Belajar PHP");
  $todolistService->addTodolist("Belajar PHP OOP");
  $todolistService->addTodolist("Belajar PHP DATABASE");

  $todolistView->showTodolist();
}

testAddShowTodolist();
