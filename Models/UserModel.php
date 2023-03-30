<?php

namespace Models;

use PDO;

class UserModel
{

    public static function checkUser($account)
    {
        return DB::start(function ($conn) use ($account) {

            $stmt = $conn->prepare("SELECT * FROM useraccount WHERE email= :email");

            $stmt->bindParam(":email", $account);

            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            return $data;
        });
    }

    public static function insertUser($data)
    {
        DB::start(function ($conn) use ($data) {

            $stmt = $conn->prepare("INSERT INTO `useraccount`(`username`, `email`, `password`) VALUES (:username,:email,:password)");

            $stmt->bindParam(":username", $data['username']);
            $stmt->bindParam(":email", $data['email']);
            $stmt->bindParam(":password", $data['password']);

            $stmt->execute();
        });
    }
}
