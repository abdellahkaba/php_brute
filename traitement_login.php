<?php

    include("connexion.php") ;

    if(isset($_POST['valider'])) {

        if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

            $pseudo = $_POST['pseudo'] ;
            $password = $_POST['password'];
            $requet_user = $db->prepare("SELECT  pseudo FROM users WHERE pseudo = ? and password = ? ");
            $requet_user->execute([$pseudo,$password]);

            if($requet_user->rowCount() > 0){

                //alors on le redirige vers la page d'acceuil

                $user_info = $requet_user->fetch();
                //on le stock dans une session

                $_SESSION['auth'] = true;
                $_SESSION['id'] = $user_info['id'];
                $_SESSION['nom'] = $user_info['nom'];
                $_SESSION['pseudo'] = $user_info['pseudo'];
                $_SESSION['password'] = $user_info['password'];

                header("Location: page_acceuil.php");
            }else{
                $error = "Desolé ce pseudo n'existe pas ! " ;
            }

        }else{
            $error = "Veuillez remplier les champs ! " ;
        }
    }