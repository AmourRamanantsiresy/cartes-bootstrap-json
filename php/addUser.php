<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    </body>
    <!-- ajout de nouvel utilisateur -->
    <?php
        // on prend tout les information qu'on a pris par le formulaire de la page bootstrap cards.php
        // et on les met toutes ces valeurs dans un tableau
        $nouveau = array(
            "id_student"=>$_POST["stds"],
            "nom"=>$_POST["noms"],
            "prenoms"=>$_POST["prenoms"],
            "url"=>$_POST["urlHeroku"],
            "avatar"=>$_POST["avatar"]
        );
        //on prend les contenu du fichier users.json
        $json = file_get_contents('../data/users.json');
        //on le transforme en tableau compris par php
        $json = json_decode($json);
        //on y ajoute le tableau $nouveau qu'on a créé à partir des informations du formulaire
        array_push($json, $nouveau);
        //on encode le tout en un tableau format json
        $json = json_encode($json);
        //on replace le contenu du fichier users.json par le grand tableau qo'on vient d'encoder
        file_put_contents("../data/users.json", $json);
    ?>
    <script>
        //fonction qui nous ramène à un url définit en paramètre
        const goTo = (url)=>(location.href = url);
        //appelle de la fonction
        goTo("../bootstrap card.php")
    </script>
</html>