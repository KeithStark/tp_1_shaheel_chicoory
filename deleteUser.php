<?php
if (isset($_GET['id']) && !empty($_GET['id'])) {
    include './class/Utilisateur.php';
    $utilisateur = new Utilisateur;
    $userId = $_GET['id'];
    $utilisateur->deleteUser($userId);
    
    header('Location: index.php');
} else {
    echo "Error while deleting.";
}
