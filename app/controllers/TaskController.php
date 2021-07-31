<?php

namespace App\Controllers;

use App\Models\Task;
use Symfony\Component\Routing\RouteCollection;

class TaskController {
  public function add()
  {
    require_once APP_ROOT . '/app/views/task_add.php';
  }

  public function create(RouteCollection $routeCollection)
  {
    if (isset($_POST)) {
      $title       = \trim($_POST['title']);
      $description = \trim($_POST['description']);
      if ($title !== '' && $description !== '') {
        $task   = new Task();
        $result = $task->create(['title' => $title, 'description' => $description]);
        if ($result) {
          $_SESSION['flash_status']  = TRUE;
          $_SESSION['flash_message'] = $title . ' created successfully';
        }
        else {
          $_SESSION['flash_status']  = FALSE;
          $_SESSION['flash_message'] = $title . ' failed to create';
        }
      }
    }
    header('Location: /');
  }
  public function show(int $id, RouteCollection $routeCollection)
  {
    $task = new Task();
    $task->read($id);

    require_once APP_ROOT . '/app/views/task.php';
  }
  public function edit(int $id, RouteCollection $routeCollection)
  {
    $task = new Task();
    $task->read($id);

    require_once APP_ROOT . '/app/views/task_edit.php';
  }
  public function update(int $id)
  {
    $title       = \trim($_POST['title']);
    $description = \trim($_POST['description']);
    if ($title !== '' && $description !== '') {
      $task   = new Task();
      $result = $task->update($id, ['title' => $title, 'description' => $description]);
      if ($result) {
        $_SESSION['flash_status']  = TRUE;
        $_SESSION['flash_message'] = $title . ' update successfully';
      }
      else {
        $_SESSION['flash_status']  = FALSE;
        $_SESSION['flash_message'] = $title . ' failed to update';
      }
      header('Location: /task/' . $id . '/edit');
    }
  }
}