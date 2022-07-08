<?php
    if (isset($_POST['submit'])){
        $deleteEmploye = new EmployeController();
        $deleteEmploye->deleteEmploye();
    }
    else{
        Redirect::to('home');
    }


?>