<?php

    include('connexion.php');

    //Verification de validation de connexion

    if(isset($_POST['valider'])) {

        //verification des champs
        if(!empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['password'])){
            //verification de la répétition d'un double pseudo
            $requet_select = $db->prepare("SELECT pseudo FROM users where pseudo = ?");
            $requet_select->execute([$_POST['pseudo']]);

            if($requet_select->rowCount() == 0){
                //Une fois sa n'existe on fait un nouvel enregistrement
                $insert_user = $db->prepare("INSERT INTO users(nom,pseudo,password) VALUES(?,?,?)");
                $insert_user->execute([$_POST['nom'],$_POST['pseudo'],$_POST['password']]);

                //une fois c'est enregistrer alors on essaye de connecter cet utilisateur
                $info_user_connect = $db->prepare("SELECT id,nom,pseudo FROM users WHERE nom = ? and pseudo = ?");
                $info_user_connect->execute([$_POST['nom'],$_POST['pseudo']]);
                //on stock ça dans une variable de session
                $user_info_connect_session = $info_user_connect->fetch();
                //on creer une variable de session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $user_info_connect_session['id'];
                $_SESSION['nom'] = $user_info_connect_session['nom'];
                $_SESSION['pseudo'] = $user_info_connect_session['pseudo'];

                header("Location: page_acceuil.php");

                //on le redirige dans la page d'acceuils
            }else{
                $error = "cet Utilisateur existe dejà!";
            }
        }
        else{
            $error = "Veuillez completer tous les champs" ;
        }
    }