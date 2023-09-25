<?php
include './class/Utilisateur.php';
include './public/header.php';

$utilisateur = new Utilisateur();

// Check if the user ID is provided in the query string
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $utilisateur->getUserById($userId);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "User ID not provided.";
    exit;
}

if (isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $genre = $_POST['genre'];

    // Call the updateUser method to update the user's information
    $result = $utilisateur->updateUser($userId, $nom, $prenom, $telephone, $genre);

    if ($result) {
        header('Location: index.php');
    } else {
        echo "Failed to update the user.";
    }
}
?>

<!-- Modify User Form -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <center>
                <h4>MODIFY USER</h4>
            </center>
            <hr>
            <div class="registerfrm">
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nom"><b>Nom</b></label>
                        <input type="text" class="form-control" name="nom" id="nom" required value="<?php echo $user['nom']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="prenom"><b>Prenom</b></label>
                        <input type="text" class="form-control" name="prenom" id="prenom" required value="<?php echo $user['prenom']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="telephone"><b>Telephone</b></label>
                        <input type="text" class="form-control" name="telephone" id="telephone" required value="<?php echo $user['telephone']; ?>">
                    </div>
                    <label for="genre"><b>Genre</b></label>
                    <select name="genre" class="form-control" required>
                        <option value="male" <?php echo ($user['genre'] == 'male') ? 'selected' : ''; ?>>Male</option>
                        <option value="female" <?php echo ($user['genre'] == 'female') ? 'selected' : ''; ?>>Female</option>
                    </select><br>
                    <center>
                        <div class="mb-3">
                            <input type="submit" name="update" value="Update User" class="btn btn-info">
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
