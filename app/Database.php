<?php

namespace App;

use Medoo\Medoo;
use PDO;

class Database
{
  private static $db;

  public static function init()
  {
    try {
      $pdo = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_HOST, DB_USER, DB_PASS);

      self::$db = new Medoo([
        'pdo'  => $pdo,
        'type' => 'mysql'
      ]);
    } catch (\Exception $e) {
      var_dump($e->getMessage());
    }
  }

  public static function fetchById(string $table, $id)
  {
    return self::$db->get($table, '*', ['id' => $id]);
  }

  public static function fetchAll(string $table, int $page = 0)
  {
    $offset = $page * 2;
    return self::$db->select(
      $table,
      [
        'title',
        'description',
        'id',
        'user_id',
      ],
      [
        'LIMIT'  => [$offset, 2],
      ]
    );
  }
  public static function insert(string $table, array $data)
  {
    $data['user_id'] = 1;
    return self::$db->insert($table, $data);
  }
  public static function updateById(string $table, int $id, array $data)
  {
    return self::$db->update($table, $data, ['id' => $id]);
  }
  public static function count(string $table)
  {
    return self::$db->count($table);
  }
}

Database::init();
