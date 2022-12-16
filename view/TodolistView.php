<?php

namespace View {

  use Helper\InputHelper;
  use Service\TodolistService;

  class TodolistView
  {

    private TodolistService $todolistService;

    public function __construct(TodolistService $todolistService)
    {
      $this->todolistService = $todolistService;
    }
    function showTodolist(): void
    {
      while (true) {
        $this->todolistService->showTodolist();

        echo "MENU" . PHP_EOL;
        echo "1. Tambah Todolist" . PHP_EOL;
        echo "2. Hapus Todolist" . PHP_EOL;
        echo "x. Keluar" . PHP_EOL;

        $pilihan = InputHelper::input("Pilih");

        if ($pilihan == "1") {
          $this->addTodolist();
        } else if ($pilihan == "2") {
          $this->removeTodolist();
        } else if ($pilihan == "x" || $pilihan == "X") {
          break;
        } else {
          echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
      }

      echo "Sampai jumpa lagi" . PHP_EOL;
    }
    function addTodolist(): void
    {
      echo "Menambah Todolist" . PHP_EOL;
      $todo = InputHelper::input("Todo");

      echo "Konfirmasi (y/n)";
      $confirm = InputHelper::input("");

      if ($confirm == "y" || $confirm == "Y") {
        $this->todolistService->addTodolist($todo);
        echo "Berhasil menambahkan todo" . PHP_EOL;
      } else if ($confirm == "n" || $confirm == "N") {
        echo "Batal menambahkan todo" . PHP_EOL;
      } else {
        echo "Perintah tidak valid" . PHP_EOL;
        $this->addTodolist();
      }
    }
    function removeTodolist(): void
    {
      echo "Menghapus Todolist" . PHP_EOL;
      $pilihan = (int) InputHelper::input("Todo nomor");

      echo "Konfirmasi (y/n)";
      $confirm = InputHelper::input("");

      if ($confirm == "y" || $confirm == "Y") {
        $this->todolistService->removeTodolist($pilihan);
      } else if ($confirm == "n" || $confirm == "N") {
        echo "Batal menghapus todo nomor $pilihan" . PHP_EOL;
      } else {
        echo "Perintah tidak valid" . PHP_EOL;
        $this->removeTodolist();
      }
    }
  }
}
