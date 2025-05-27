<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Bdd</title>
</head>
<body>
    <h2>exo 1:</h2>
    <?php 
        if (isset($_GET["ville"]) && isset($_GET["transport"])) {
            $ville = htmlspecialchars($_POST["ville"]);
            $transport = htmlspecialchars($_POST["transport"]);
            echo "La ville choisie est " . $ville . " et le voyage se fera en " . $transport . "!";
        }
     ?>
    <h2>exo 2:</h2>
    <form action="index.php" method="get">
        <label for="name-animal">Qu'elle est ton animal préféré</label>
        <input type="text" name="name-animal">
        <input type="submit" value="Valider">
    </form>
    <?php 
        if (isset($_GET["name-animal"])) {
            $nameAnimal = htmlspecialchars($_POST["name-animal"]);
            echo " Votre animal choisi est : " . $nameAnimal;
        }
     ?>
    <h2>exo 3:</h2>
    <form action="index.php" method="post">
        <label for="colors">Choose a color:</label>
        <input type="color" name="colors">
        <label for="pseudo">Choose a pseudo:</label>
        <input type="text" name="pseudo">
        <input type="submit" value="Valider">
    </form>
    <?php 
        if (isset($_POST["pseudo"]) && isset($_POST["colors"])) {
            $pseudo = htmlspecialchars($_POST["pseudo"]);
            $colors = htmlspecialchars($_POST["colors"]);
            echo $pseudo;
            echo "<body style=background-color:" . $colors . ">";
        }
     ?>
    <h2>exo 4:</h2>
    <form action="index.php" method="post">
        <label for="roll">Lancer de des:</label>
        <input type="number" name="roll">
        <input type="submit" value="Valider">
    </form>
    <?php
        if (isset($_POST["roll"])) {
            $compar = htmlspecialchars($_POST["roll"]);
            if ($compar % 6 == 0) {
                echo rand(1, $compar);
            } else {
                header("location:index.php?error=1");
            }
        }

        if (isset($_GET["error"])) {
            if ($_GET["error"] == 1) {
            echo "vous avez pas selectioner un des avec un nombre de face d'un multiple de 6";
            }
        }
    ?>
    <h2>exo 5:</h2>
    <form action="index.php" method="post">
        <label for="pseudo">Nom d'utilisateur:</label>
        <input type="text" name="pseudo">
        <label for="password">Mots de passe:</label>
        <input type="password" name="password">
        <input type="submit" value="Connection">
    </form>
    <?php
        if (isset($_POST["pseudo"]) && isset($_POST["password"])) {
            $savedPseudoUsers = "t";
            $savedPasswordUsers = password_hash("12345", PASSWORD_ARGON2I);
            $pseudo = trim(htmlspecialchars($_POST["pseudo"]));
            $encryption = password_hash(htmlspecialchars($_POST["password"], PASSWORD_ARGON2I);
            if (password_verify($savedPasswordUsers, $encryption) && $pseudo == $savedPseudoUsers) {
                header("location:admin.php");
            } else {
                header("location:index.php?error=3");
            }
        }
        if (isset($_GET["error"])) {
            if ($_GET["error"] == 3) {
                echo "Pseudo or Password incorrect";
            }
        }
    ?>
    <h2>exo 6:</h2>
    <form action="index.php" method="get">
        <label for="number">choisis un nombre:</label>
        <input type="number" name="number">
        <label for="number2">choisis un nombre:</label>
        <input type="number" name="number2">
        <label for="type">type d'operation:</label>
        <select name="type">
            <option value="multiplication">Multiplication</option>
            <option value="aditions">Aditions</option>
            <option value="soustraction">Soustraction</option>
            <option value="diviser">Diviser</option>
        </select>
        <input type="submit" value="Calcule">
    </form>
    <?php
        if (isset($_GET["number"]) && isset($_GET["number2"]) && isset($_GET["type"])) {
            $number = htmlspecialchars($_GET["number"]);
            $number2 = htmlspecialchars($_GET["number2"]);
            switch ($_GET["type"]) {
                case "multiplication":
                    echo $number * $number2;
                    break;
                case "aditions":
                    echo $number + $number2;
                    break;
                case "soustraction":
                    echo $number - $number2;
                    break;
                case "diviser":
                    echo $number / $number2;
                    break;
            }
        }
    ?>
    <h2>exo 7:</h2>
    <form action="index.php" method="get">
        <label for="number">vos devise en euro:</label>
        <input type="number" name="number">
        <label for="type">vous voulez les convertire en ?</label>
        <select name="type">
            <option value="dollar">Dollar</option>
            <option value="roupie-indienne">Roupie Indienne</option>
            <option value="livre-egyptienne">Livre Egyptienne</option>
            <option value="lempira-hondurien">Lempira Hondurien</option>
        </select>
        <input type="submit" value="Calcule">
    </form>
    <?php
        if (isset($_GET["number"]) && isset($_GET["type"])) {
            $number = htmlspecialchars($_GET["number"]);
            switch ($_GET["type"]) {
                case "dollar":
                    echo $number * 1.1322;
                    break;
                case "roupie-indienne":
                    echo $number * 96.85;
                    break;
                case "livre-egyptienne":
                    echo $number * 56.43;
                    break;
                case "lempira-hondurien":
                    echo $number * 29.52;
                    break;
            }
        }
    ?>
    <h2>exo 8:</h2>
    <form action="index.php?error=7" method="post">
        <p>Qu'elle est la methode utiliser pour faire les calcule? :</p>
        <div>
            <input type="radio" id="q-choice1" name="calcule" value="if()" />
            <label for="q-choice1">if()</label>

            <input type="radio" id="q-choice2" name="calcule" value="switch" />
            <label for="q-choice2">Switch</label>

            <input type="radio" id="q-choice3" name="calcule" value="match" />
            <label for="q-choice3">Match</label>

            <input type="radio" id="q-choice4" name="calcule" value="une-courgette" />
            <label for="q-choice4">Une courgette</label>
        </div>
        <p>Qu'elle est le premier pays afficher dans le selecte de conversion de devise? :</p>
        <div>
            <input type="radio" id="q-choice1" name="pays" value="lempira-hondurien" />
            <label for="q-choice1">Lempira Hondurien</label>

            <input type="radio" id="q-choice2" name="pays" value="dollar" />
            <label for="q-choice2">Dollar</label>

            <input type="radio" id="q-choice3" name="pays" value="livre-egyptienne" />
            <label for="q-choice3">Livre Egyptienne</label>

            <input type="radio" id="q-choice4" name="pays" value="roupie-indienne" />
            <label for="q-choice4">Roupie Indienne</label>
        </div>
        <p>Qu'elle est le premier chiffre d'indexation d'un array? :</p>
        <div>
            <input type="radio" id="q-choice1" name="array" value="0" />
            <label for="q-choice1">0</label>

            <input type="radio" id="q-choice2" name="array" value="1" />
            <label for="q-choice2">1</label>

            <input type="radio" id="q-choice3" name="array" value="-1" />
            <label for="q-choice3">-1</label>

            <input type="radio" id="q-choice4" name="array" value="moustache" />
            <label for="q-choice4">Moustache</label>
        </div>
        <div>
            <input type="submit" value="Resulta">
        </div>
    </form>
    <?php
        if (isset($_POST["calcule"]) && isset($_POST["pays"]) && isset($_POST["array"])) {
            $response1 = htmlspecialchars($_POST["calcule"]);
            $response2 = htmlspecialchars($_POST["pays"]);
            $response3 = htmlspecialchars($_POST["array"]);
            if ($response1 == "switch"  && $response2 == "dollar" && $response3 == 0) {
                echo "tu a gagner bravo!!";
            } else {
                header("location:index.php?error=8");
            }
        }
        if (isset($_GET["error"])) {
            if ($_GET["error"] == 8) {
                echo "Wronggg ...";
            }
        }
    ?>
    <h2>exo 9 POST:</h2>
    <?php
        $mystere = isset($_POST["mystere"]) ? htmlspecialchars($_POST["mystere"]) : rand(0,1000);
        $answer = "";
        if (isset($_POST["number"])) {
            $response = htmlspecialchars($_POST["number"]);
            if ($response == $mystere) {
                echo "tu a gagner bravo!!";
                $mystere = rand(0,1000);
            } else if ($response > $mystere) {
                echo $_POST["mystere"] . " plus petit ...";
            } else if ($response < $mystere) {
                echo $_POST["mystere"] . " plus grand ...";
            }
        }
    ?>
    <form action="index.php" method="post">
        <label for="number">Devine le nombre entre 0 et 1000:</label>
        <input type="number" name="number" min="0" max="1000">
        <input type="submit" value="Trouver">
    </form>
    <p><?php $answer ?></p>
    <h2>exo 9 session:</h2>
    <?php
        session_start()
        $_SESSION["mystere"] = isset($_POST["mystere"]) ? htmlspecialchars($_POST["mystere"]) : rand(0,1000);
        $answer = "";
        if (isset($_POST["number"])) {
            $response = htmlspecialchars($_POST["number"]);
            if ($response == $mystere) {
                echo "tu a gagner bravo!!";
                session_unset();
                session_destroy();
            } else if ($response > $mystere) {
                echo $_POST["mystere"] . " plus petit ...";
            } else if ($response < $mystere) {
                echo $_POST["mystere"] . " plus grand ...";
            }
        }
    ?>
    <form action="index.php" method="post">
        <label for="number">Devine le nombre entre 0 et 1000:</label>
        <input type="number" name="number" min="0" max="1000">
        <input type="submit" value="Trouver">
        <input type="hidden" name="mystere" value="<?php echo $mystere ?>">
    </form>
    <p><?php $answer ?></p>
    <h2>exo 10:</h2>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="userFile">upload ton avatar</label>
        <input type="file" name="userFile">
        <input type="submit" value="Envoyer">
    </form>
    <img src="" alt="">
    <?php
        if (isset($_FILES["userFile"])) {
            $avatar = $_FILES["userFile"];
            $getExtension = strtolower(pathinfo($avatar["name"], PATHINFO_EXTENSION));
            date_default_timezone_set("Europe/Paris");
            $newName = $avatar['name'] . Date("Y-m-d-H:i:s") . "." . $getExtension;
            $extensionType = array('gif','jpg','jpe','jpeg','png');
            $destination = './assets/img/uploads/' . $newName;
            if (!in_array($getExtension, $extensionType)) {
                echo "Extension non autorisée : " . $getExtension;
            } else {
                if (move_uploaded_file($avatar['tmp_name'], $destination)) {
                    echo "Fichier uploadé avec succès : $newName";
                    echo '<img src="' . $destination . '" alt="un avatar">';
                } else {
                    echo "Erreur lors du déplacement du fichier.";
                }
            }
        }
    ?>
</body>
</html>