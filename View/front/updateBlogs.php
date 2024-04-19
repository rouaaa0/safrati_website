<?php
include 'C:\xampp\htdocs\mcv\Controller\BlogC.php';
include 'C:\xampp\htdocs\mcv\Model\Blog.php';

$error = "";

// Create an instance of the controller
$blogC = new BlogC();

if (
    isset($_POST["idBlog"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["contenu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["auteur"])
) {
    if (
        !empty($_POST["idBlog"]) &&
        !empty($_POST['titre']) &
        !empty($_POST["contenu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["auteur"])
    ) {
        $blog = new Blog(
            $_POST['idBlog'],
            $_POST['titre'],
            $_POST['contenu'],
            $_POST['date_publication'],
            $_POST['auteur']
        );

        $blogC->updateBlog($blog, $_POST['idBlog']);

        header('Location:listBlogs.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog</title>
    <link rel="stylesheet" type="text/css" media="screen" href="style3.css" />

</head>

<body>
    <button><a href="listBlogs.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idBlog'])) {
        $blog = $blogC->showBlog($_POST['idBlog']);
    ?>

        <form method="POST" action="updateBlogs.php"  >
            <table>
                <tr>
                    <td><label for="idBlog">Blog ID :</label></td>
                    <td>
                        <input type="text" id="idBlog" name="idBlog" value="<?php echo $_POST['idBlog'] ?>" readonly />
                    </td>
                </tr>
                <tr>
                    <td><label for="titre">Titre :</label></td>
                    <td>
                        <input type="text" id="titre" name="titre" value="<?php echo $blog['titre'] ?>" />     
                    </td>
                </tr>
                <tr>
                    <td><label for="contenu">Contenu :</label></td>
                    <td>
                        <input type="text" id="contenu" name="contenu" value="<?php echo $blog['contenu'] ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td><label for="date_publication">Date Publication :</label></td>
                    <td>
                        <input type="date" id="date_publication" name="date_publication" value="<?php echo $blog['date_publication'] ?>" /> 
                    </td>
                </tr>
                <tr>
                    <td><label for="auteur">Auteur :</label></td>
                    <td>
                        <input type="text" id="auteur" name="auteur" value="<?php echo $blog['auteur'] ?>" /> 
                    </td>
                </tr>

                <td>
                    <button type="submit">Update</button>
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </table>
        </form>
    <?php
    }
    ?>

</body>

</html>
