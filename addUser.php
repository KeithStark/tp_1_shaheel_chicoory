<?php
include './class/Utilisateur.php';
include('./public/header.php');
$utilisateur = new Utilisateur();

if (isset($_POST['save'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $genre = $_POST['genre'];

    // Call the addUser method to add the new user
    $id = $utilisateur->addUser($nom, $prenom, $telephone, $genre);

    if ($id) {
        header('Location: index.php');
    } else {
        echo "Failed to add the user.";
    }
}
?>

<!-- Add User Form -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h4>ADD USER</h4>
            </center>
            <hr>
            <div class="registerfrm">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nom"><b>Nom</b></b></label>
                        <input type="text" class="form-control" name="nom" id="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="prenom"><b>Prenom</b></label>
                        <input type="text" class="form-control" name="prenom" id="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label for="telephone"><b>Telephone</b></label>
                        <input type="text" class="form-control" name="telephone" id="telephone" required>
                    </div>
                    <label for="genre"><b>Genre</b></label>
                    <select name="genre" class="form-control" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select><br>
                    <center>
                        <div class="mb-3">
                            <input type="submit" name="save" value="Add User" class="btn btn-info">
                        </div>
                        <div class="mb-3">
                            <a href="./index.php" class="btn btn-warning">Back</a>
                        </div>
                    </center>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</body>

</html>