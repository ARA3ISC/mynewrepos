<?php

class User{
    public static function login($data){
        $username = $data['username'];
        try{
            
            $query = 'SELECT * FROM users WHERE username = :username';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username" => $username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
            //die($user);
            // if ($stmt->execute()) {
            //     return "exist";
            // }
        }
        catch(PDOException $ex){
            echo 'error : '. $ex->getMessage();
        }
    }


    public static function createUser($data){
        $query = DB::connect()->prepare('INSERT INTO users(fullname, username, password) 
            VALUES (:fullname , :username, :password)');

        $query->bindparam(':fullname', $data['fullname']);
        $query->bindparam(':username', $data['username']);
        $query->bindparam(':password', $data['password']);

        if ($query->execute()) {
            return "created";
        } else {
            return "error";
        }
     }
}