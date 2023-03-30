<?php

namespace Models;

use Models\DB;
use PDO;

class TodoModel
{

    public static function find($userId)
    {
        return DB::start(function ($conn) use ($userId) {

          $result = [];

          $stmt = $conn->prepare("SELECT * FROM todo WHERE user_id=:user_id");

          $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);

          $stmt->execute();

          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
              array_push($result, $row);
          }

          return $result;
        });
    }
    public static function insert($list,$userId)
    {
        return DB::start(function ($conn) use ($list, $userId) {

          $stmt = $conn->prepare("INSERT INTO `todo` (`list`, `user_id`) VALUES (:list,:user_id)");

          $stmt->bindParam(":list", $list);
          $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);

          $stmt->execute();

        });
    }
    public static function delete($id)
    {
        return DB::start(function ($conn) use ($id) {

          $stmt = $conn->prepare("DELETE FROM `todo` WHERE id=:id");

          $stmt->bindParam(":id", $id, PDO::PARAM_INT);

          $stmt->execute();

        });
    }
    public static function update($list,$id)
    {
        return DB::start(function ($conn) use ($list,$id) {

          $stmt = $conn->prepare("UPDATE `todo` SET list=:list WHERE id=:id");

          $stmt->bindParam(":id", $id, PDO::PARAM_INT);
          $stmt->bindParam(":list", $list, PDO::PARAM_STR);

          $stmt->execute();

        });
    }
}