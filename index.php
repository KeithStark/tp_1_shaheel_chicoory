<?php
include './class/Utilisateur.php';
include './public/header.php';

$utilisateur = new Utilisateur();
$users = $utilisateur->getUsers();

if (isset($_POST['showUsers'])) {
    $selectedGender = $_POST['genderFilter'];
    // Filter by Gender
    $users = ($selectedGender === 'male' || $selectedGender === 'female') ? $utilisateur->getUsersByGenre($selectedGender) : $utilisateur->getUsers();
}

// Delete a user
if (isset($_GET['deleteUser'])) {
    $id = $_GET['id'];
    $utilisateur->deleteUser($id);
    // Update List of users after deletion
    $users = $utilisateur->getUsers();
}
?>

<center>
    <h1>List of Users</h1>
</center>

<!-- Filter by Gender Form -->
<form method="post">
    <label for="genderFilter">Filter by Gender:</label>
    <select name="genderFilter" id="genderFilter">
        <option value="all">All</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <input type="submit" class="btn btn-primary" name="showUsers" value="Show Users">
</form>

<!-- Button to add user -->
<center><a href="./addUser.php" class="btn btn-success">Add User</a></center>
<br>

<!-- List of users -->
<?php if (!empty($users)) : ?>
    <h2>User List</h2>

    <div class="col-md-12">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($users as $user) : ?>

                    <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['nom'] ?></td>
                        <td><?= $user['prenom'] ?></td>
                        <td><?= $user['telephone'] ?></td>
                        <td><?= $user['genre'] ?></td>
                        <td>
                            <a href="modifyUser.php?id=<?= $user['id'] ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                            <a href="deleteUser.php?id=<?= $user['id'] ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

</body>

</html>
