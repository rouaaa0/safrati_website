<?php

include 'C:\xampp\htdocs\mcv\Controller\BlogC.php';
include 'C:\xampp\htdocs\mcv\Model\Blog.php';

$error = "";
$blog = null;
$blogC = new BlogC();


if (
    isset($_POST["titre"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["auteur"])
) {
    if (
        !empty($_POST['titre']) &&
        !empty($_POST["contenu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["auteur"])
    ) {
        $blog = new Blog(
            null,
            $_POST['titre'],
            $_POST['contenu'],
            $_POST['date_publication'],
            $_POST['auteur']
        );

        $blogC->addBlog($blog);
        $error = "<center><strong><h3>Blog added successfully!</h3></strong></center>";
    } else {
        $error = "";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Blog Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="style3.css" />
</head>

<body>
    <button onclick="location.href='listBlogs.php';">Go to Blog List</button>
    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post" onsubmit="return verif_Up()">
                <h1>Add Blog</h1>
                <input type="text" placeholder="Titre" id="titre" name="titre" />
                <input type="text" placeholder="Contenu" id="contenu" name="contenu" />
                <input type="date" placeholder="Date Publication" id="date_publication" name="date_publication" />
                <input type="text" placeholder="Auteur" id="auteur" name="auteur" />
                <button type="submit">Add Blog</button>
            </form>
        </div>
    </div>

    <script>
        /* FONCTION VERIF blog UP*/
        function verif_Up() {
            let titre = document.getElementById('titre').value;
            let contenu = document.getElementById('contenu').value;
            let date_publication = document.getElementById('date_publication').value;
            let auteur = document.getElementById('auteur').value;

            if (titre == '') {
                document.getElementById('titre').value = 'Invalid Titre!';
                document.getElementById('titre').style.color = 'red';
                return false;
            }
            if (contenu == '') {
                document.getElementById('contenu').value = 'Invalid Contenu!';
                document.getElementById('contenu').style.color = 'red';
                return false;
            }
            if (date_publication == '') {
                document.getElementById('date_publication').value = 'Invalid Date Publication!';
                document.getElementById('date_publication').style.color = 'red';
                return false;
            }
            if (auteur == '') {
                document.getElementById('auteur').value = 'Invalid Auteur!';
                document.getElementById('auteur').style.color = 'red';
                return false;
            }
        }
    </script>
</body>


</html>
