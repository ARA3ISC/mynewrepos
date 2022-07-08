<?php
if(!defined('MyConst')) {
    die('Direct access not permitted');
 }


    if (isset($_POST['submit'])){
        $createUser = new UsersController();
        $createUser->register();
    }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <link rel="icon" type="image/x-icon" href="views/includes/imgs/logo.ico">
    <link rel="stylesheet" href="views/includes/style.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
    <div class="wrapper fadeInDown">

        <div id="formContent">
            <!-- Icon -->
            <div class="fadeIn first pt-4 my-5">
                <img src="views/includes/imgs/logo.png" id="icon" alt="User Icon" /><br><br>
                <h2 style="color:#39B6FF; font-family: Potta One; font-weight:bold">S'inscrire</h2>
            </div>

            <!-- Login Form -->
            <form method="POST" class="needs-validation" novalidate>
                <input type="text" id="nom" class="fadeIn second" name="fullname" placeholder="Nom & Prénom" required>
                <div class="invalid-feedback">
                    Field required
                </div>
                <input type="text" id="username" class="fadeIn third" name="username" placeholder="Pseudo" required>
                <div class="invalid-feedback">
                    Field required
                </div>
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="Mot de passe" required>
                <div class="invalid-feedback">
                    Field required
                </div>
                <button type="submit" id="btnSend" class="fadeIn fourth cursor-pointer" name="submit">S'inscrire</button>
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="<?php echo BASE_URL ?>login">Connexion</a>
            </div>

        </div>
    </div>
</body>
<script type="text/javascript" src="views/includes/js/script.js"></script>

</html>