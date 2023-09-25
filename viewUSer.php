<?php
include './class/Utilisateur.php';
include './public/header.php';

$utilisateur = new Utilisateur();

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = $utilisateur->getUserById($userId);

    if (!$user) {
        echo "User not found.";
        exit;
    }
} else {
    echo "User ID not valid.";
    exit;
}
?>

<center>
    <h1>User Details</h1>
</center>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>User ID:</th>
                        <td><?= $user['id'] ?></td>
                    </tr>
                    <tr>
                        <th>Nom:</th>
                        <td><?= $user['nom'] ?></td>
                    </tr>
                    <tr>
                        <th>Prenom:</th>
                        <td><?= $user['prenom'] ?></td>
                    </tr>
                    <tr>
                        <th>Telephone:</th>
                        <td><?= $user['telephone'] ?></td>
                    </tr>
                    <tr>
                        <th>Genre:</th>
                        <td><?= $user['genre'] ?></td>
                    </tr>
                </tbody>
            </table>
            <center><a href="index.php" class="btn btn-warning">Back</a></center>
        </div>
    </div>
</div>

</body>

</html>