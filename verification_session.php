<?php
    session_start();

    //si la session de l'utilisateur est expiré 
    if(!isset($_SESSION['auth'])){
        //sinon on te redirige vers login
        header('Location: login.php');
    }