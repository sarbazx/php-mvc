<?php

namespace App\Controllers;

use App\Models\Task;
use Symfony\Component\Routing\RouteCollection;

class PageController {
  public function index(int $page = 0, RouteCollection $routes)
  {
    $tasks       = Task::getAllTasks($page);
    $total_pages = Task::getTotalNumberOfTasks() / 2;
    require_once APP_ROOT . '/app/views/index.php';
  }
}