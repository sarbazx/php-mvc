<?php

namespace App\Models;

use App\Database;

class Task
{
  private $table = 'tasks';
  protected $id;
  protected $title;
  protected $description;
  protected $user_id;

  
  public function getId()
  {
    return $this->id;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle(string $title)
  {
    $this->title = $title;
  }

  public function getDescription()
  {
    return $this->description;
  }

  public function setDescription(string $description)
  {
    $this->description = $description;
  }

  public function create(array $data)
  {
    return Database::insert($this->table, $data);
  }

  public function read(int $id)
  {
    $task              = Database::fetchById($this->table, $id);
    $this->id          = $task['id'];
    $this->title       = $task['title'];
    $this->description = $task['description'];
    $this->user_id     = $task['user_id'];

    return $this;
  }

  public function update(int $id, array $data)
  {
    return Database::updateById($this->table, $id, $data);
  }

  public function delete(int $id)
  {
  }

  public static function getAllTasks(int $page)
  {
    $tasks = [];
    $datas = Database::fetchAll('tasks', $page);
    foreach($datas as $data) {
      $task = new Task();
      $task->setId($data['id']);
      $task->setTitle($data['title']);
      $task->setDescription($data['description']);
      $task->setUserId($data['user_id']);
      $tasks[] = $task;
    }
    return $tasks;
  }

  public static function getTotalNumberOfTasks()
  {
    return Database::count('tasks');
  }


  /**
   * Set the value of id
   *
   * @return  self
   */ 
  protected function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of user_id
   */ 
  public function getUserId()
  {
    return $this->user_id;
  }

  /**
   * Set the value of user_id
   *
   * @return  self
   */ 
  public function setUserId($user_id)
  {
    $this->user_id = $user_id;

    return $this;
  }
}
