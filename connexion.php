<?php

    try{
        session_start();
        $db = new PDO('mysql:host=localhost;dbname=php_brute;','root','');
        echo 'connexion reussi';
    }catch(Exception $e){
        echo  'Erreur' . $e->getMessage();
    }