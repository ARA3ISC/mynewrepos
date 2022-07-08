<?php
if (!defined('MyConst')) {
    die('Direct access not permitted');
}
if (isset($_POST['submit'])) {
    $loginUser = new UsersController();
    $loginUser->auth();
}
?>
<title>Log in - gestion employés</title>
<link rel="icon" type="image/x-icon" href="views/includes/imgs/logo.ico">
<link rel="stylesheet" href="views/includes/style.css">
<link rel="stylesheet" href="views/includes/btnStyle.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Icon -->
        <div class="fadeIn first pt-4 my-5">
            <img src="views/includes/imgs/logo.png" id="icon" alt="User Icon" /><br><br>
            <h2 style="color:#39B6FF; font-family: Potta One; font-weight:bold">S'authentifier</h2>
        </div>

        <!-- Login Form -->
        <form method="POST" class=" p-2 needs-validation" novalidate>
            <input type="text" id="login" class="fadeIn second text-justify" name="username" placeholder="username" required>
            <div class="invalid-feedback">
                username required
            </div>
            <input type="password" id="password" class="fadeIn third text-justify" name="password" placeholder="password" required>
            <div class="invalid-feedback">
                password required
            </div>
            <button type="submit" id="btnSend" class="ms-auto fadeIn fourth cursor-pointer btn fifth " name="submit">Log In</button>
            
        </form>
        <div id="formFooter">
            <a class="underlineHover" href="<?php echo BASE_URL ?>register">Créer un compte</a>
        </div>

    </div>
</div>

<script type="text/javascript" src="views/includes/js/script.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script> -->