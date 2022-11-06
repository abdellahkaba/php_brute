<?php
    session_start();
    //on la stock dans un tableau
    $_SESSION = [] ;
    //puis on la detruit
    session_destroy();
    //puis on le redirige vers la page login
    header('Location: login.php');