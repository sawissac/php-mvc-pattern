<?php

namespace Models;

use Models\DB;
use PDO;

class NotesModel
{
    public static function limit($from, $to)
    {
        return DB::start(function ($conn) use ($from, $to) {

            $result = [];
            $stmt = $conn->prepare("SELECT n.id,n.title,n.body,n.user_id,u.username FROM `notes` AS n JOIN `useraccount` AS u ON n.`user_id` = u.`id` ORDER BY n.`id` DESC LIMIT :from,:to");

            $stmt->bindParam(":from", $from, PDO::PARAM_INT);
            $stmt->bindParam(":to", $to, PDO::PARAM_INT);

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($result, $row);
            }

            return $result;
        });
    }

    public static function find($id)
    {
        return DB::start(function ($conn) use ($id) {

            $result = [];
            $stmt = $conn->prepare("SELECT * FROM notes WHERE id=:id");

            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($result, $row);
            }

            return $result;
        });
    }
    public static function update($body, $title, $id)
    {
        DB::start(function ($conn) use ($body, $title, $id) {

            $stmt = $conn->prepare("UPDATE `notes` SET body=:body,title=:title WHERE id=:id");

            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":body", $body, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
        });
    }

    public static function delete($userId, $id)
    {
        DB::start(function ($conn) use ($userId, $id) {

            $stmt = $conn->prepare("DELETE FROM `notes` WHERE user_id=:user_id AND id=:id");

            $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();
        });
    }

    public static function insert($title, $body, $userId)
    {
        return DB::start(function ($conn) use ($title, $body, $userId) {

            $stmt = $conn->prepare("INSERT INTO `notes` (`title`,`body`, `user_id`) VALUES (:title,:body,:user_id)");

            $stmt->bindParam(":title", $title);
            $stmt->bindParam(":body", $body);
            $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);

            $stmt->execute();
        });
    }
    public static function max()
    {
        return DB::start(function ($conn){

            $stmt = $conn->prepare("SELECT * FROM notes");

            $stmt->execute();

            return $stmt->rowCount();
        });
    }
}
