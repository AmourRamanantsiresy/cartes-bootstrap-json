<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap card</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav>
        <h2>Les Utilisateurs</h2>
        <h1 class="ajouter" onclick="tomber()">+</h1>
    </nav>

    <div id="cartes">
        <!-- ouverture de la balise php -->
        <?php
            // definition des variables utiles à la manoeurvre
            $prenomfinal = "";
            // prend les contenus du fichier user.json
            $json = file_get_contents("data/users.json");
            //decode le json en un tableau lisible par php
            $json = (array) json_decode($json);
            //boucle : pour chaque valeur dans user.json, ecrir l'std, nom, prenoms etc en format html
            foreach ($json as $values) {
                //on se demande si une personne à un ou plusieurs prénoms
                if(isset($values->prenoms)){
                    $prenomfinal = $values->prenoms;
                }else {
                    $prenomfinal = $values->prenom;
                }
                //on écrit le tout
                echo "<div><img src='".$values->avatar."'><div class='information'><p id='std'>".$values->id_student."</p><p id='nom'>".$values->nom." ".$prenomfinal."</p><a href='".$values->url."'><button>".substr($values->url,8,-15) ."</button></a></div></div>";
            }
        ?>

    </div>

    <div class="bgajout">
        <div class="ajoutDiv">
            <form action="php/addUser.php" method="post">
                <input type="text" placeholder="ID_STD" name="stds" id="stds"><br>
                <input type="text" placeholder="Nom" name="noms" id="noms"><br>
                <input type="text" placeholder="Prenom" name="prenoms" id="prenoms"><br>
                <input type="url" placeholder="Url - Site - Heroku" name="urlHeroku" id="urlHeroku"><br>
                <input type="url" placeholder="Url - Github - Avatar" name="avatar" id="avatar"><br>
                <button>Ajouter</button>
            </form>
        </div>
    </div>
    <script src="docs/users.json"></script>
    <script>
        let prenom;
        let users;
        let usersN;
        //animation
        let plusoumoins = "p"
        function tomber() {
            if (plusoumoins === "p") {
                plusoumoins = "m";
                document.querySelector("body").style.overflowY = "hidden";
                document.querySelector(".bgajout").style.visibility = "visible";
                document.querySelector(".ajoutDiv").style.animation = "tomber 2s 1s forwards";
                document.querySelector(".bgajout").style.animation = "visible 1s forwards";
                document.querySelector(".ajouter").innerHTML = "-";
            } else {
                document.querySelector("body").style.overflowY = "scroll";
                plusoumoins = "p";
                document.querySelector(".ajouter").innerHTML = "+";
                document.querySelector(".ajoutDiv").style.animation = "monter linear 1s forwards";
                document.querySelector(".bgajout").style.animation = "visible 1s 3s forwards reverse";
                setTimeout(() => {
                    document.querySelector(".bgajout").style.visibility = "hidden";
                }, 6000);
            }
        }
    </script>
</body>

</html>