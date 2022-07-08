<?php
require_once './bootstrap.php';

?>
    <link rel="icon" type="image/x-icon" href="views/includes/imgs/logo.ico">
    


    <!-- <link rel="stylesheet" href="views/includes/style.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
       
    <nav style="background-color:#F7F5F2 ;" class="navbar navbar-expand-lg navbar-light border-bottom p-4">
        <nav class="navbar navbar-light "style="background-color:#F7F5F2 ;">
            <a class="navbar-brand" href="<?php echo BASE_URL ?>">
                <img src="views/includes/imgs/logo.png" width="50" alt="Gestion Employés">
                <b><span style="color:#38B6FF; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Gestion Employés</span></b>
            </a>
        </nav>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo BASE_URL ?>"><i class="fas fa-home mx-2"></i>Acceuil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL ?>add"><i class="fas fa-plus mx-2"></i>Ajouter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" name="logout" href="<?php echo BASE_URL ?>logout"><i class="fas fa-sign-out mx-2"></i>Déconnexion</a>
                </li>

                <!-- <form method="POST">
                    <li class="nav-item">
                        <button type="submit" class="nav-link btn btn-outline-secondary rounded mx-3" name="logout"><i class="fas fa-sign-out mx-2"></i>Déconnexion</button>
                    </li>
                </form> -->
                
                
        </div>
    </nav>