<?php

class UsersController
{

    public function auth()
    {
        if (isset($_POST['submit'])) {
            if (isset($_POST['username'])) {
                $data['username'] = $_POST['username'];
                //die($data['username']);
            } else {
                echo "<script>console.log('hfhfhfh')</script>";
            }

            $result = User::login($data);
            //  var_dump($result);
            //  exit;

            if ($result != false) {
                // echo "<script>console.log('kayn')</script>";

                $options = [
                    'cost' => 12
                ];

                $hash = password_hash($result->username, PASSWORD_DEFAULT, $options);

                if (password_verify($_POST['password'], $hash)) {

                    $_SESSION['logged'] = true;
                    $_SESSION['username'] = $result->username;
                    Redirect::to('home');
                }
                
            }
            else{
                echo '<script>alert("Something wrong")</script>';
            }
            
        }
    }



    public function register()
    {
        if (isset($_POST['submit'])) {

            $options = [
                'cost' => 12
            ];

            //$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $options);
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $password,
            );

            $result = User::createUser($data);


            if ($result === 'created') {
                Session::set('success', 'Compte crée');
                Redirect::to('login');
            } else {
                echo '<script>alert("error hh")</script>';
            }
        }
    }

    public static function logout() {
        session_destroy();
    }
}
