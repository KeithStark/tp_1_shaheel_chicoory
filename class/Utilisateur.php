
<?php

$host = "localhost";
$db = "tp_1";
$user = "root";
$password = "";

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
    $oPDO = new PDO($dsn, $user, $password);

    if ($oPDO) {
        echo "Connected to the $db database successfully!";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

interface CRUD
{
    public function getUsers();
    public function getUserById($id);
    public function getUsersByGenre($genre);
    public function addUser($nom, $prenom, $telephone, $genre);
    public function updateUser($id, $nom, $prenom, $telephone, $genre);
    public function deleteUser($id);
}


class Utilisateur implements CRUD
{
    //Methode getUsers pour recupere tous les utilisateurs
    public function getUsers()
    {
        global $oPDO;
        //Execution de la requete SQL passé en paramètre
        $oPDOStmt = $oPDO->query("SELECT * FROM Utilisateur ORDER BY id ASC");
        $users = $oPDOStmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }


    //Methode pour recuperer un utilisateur par son id
    public function getUserById($id)
    {
        global $oPDO;
        //Execution de la requete SQL passé en paramètre
        $oPDOStmt = $oPDO->query("SELECT * FROM Utilisateur WHERE id = $id");
        $user = $oPDOStmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    //Methode pour recuperer un tout les utilisateurs avec le meme genre
    public function getUsersByGenre($genre)
    {
        global $oPDO;
        //Execution de la requete SQL passé en paramètre
        $oPDOStmt = $oPDO->query("SELECT * FROM Utilisateur WHERE genre = '$genre' ORDER BY id ASC");
        $users = $oPDOStmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    //Methode pour ajouter un utilisateur
    public function addUser($nom, $prenom, $telephone, $genre)
    {
        global $oPDO;

        //preparation de la requete
        $sql = 'INSERT INTO Utilisateur SET nom=:nom, prenom=:prenom,telephone=:telephone,genre=:genre;';
        $oPDOStmt = $oPDO->prepare($sql);
        //liaison des parametres
        $oPDOStmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $oPDOStmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $oPDOStmt->bindParam(':telephone', $telephone, PDO::PARAM_INT);
        $oPDOStmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        //execution de la requete
        $oPDOStmt->execute();

        //tester le nombre de lignes affectés
        if ($oPDOStmt->rowCount() <= 0) {
            return false;
        }
        return $oPDO->lastInsertId();
    }


    //Methode pour modifier un utilisateur
    public function updateUser($id, $nom, $prenom, $telephone, $genre)
    {
        global $oPDO;

        //preparation de la requete
        $sql = 'UPDATE Utilisateur SET nom=:nom, prenom=:prenom,telephone=:telephone,genre=:genre WHERE id=:id;';
        $oPDOStmt = $oPDO->prepare($sql);
        //liaison des parametres
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);
        $oPDOStmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $oPDOStmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $oPDOStmt->bindParam(':telephone', $telephone, PDO::PARAM_INT);
        $oPDOStmt->bindParam(':genre', $genre, PDO::PARAM_STR);
        //execution de la requete      
        $oPDOStmt->execute();

        return $oPDOStmt;
    }

    //Methode pour supprimer un utilisateur
    public function deleteUser($id)
    {
        global $oPDO;

        //preparation de la requete
        $sql = 'DELETE FROM Utilisateur WHERE id=:id;';
        $oPDOStmt = $oPDO->prepare($sql);
        //liaison des parametres
        $oPDOStmt->bindParam(':id', $id, PDO::PARAM_INT);
        //execution de la requete      
        $resultat = $oPDOStmt->execute();

        if ($resultat) {
            echo "Utilisateur supprimé correctement <br><br>";
        } else {
            echo "Une erreur est survenue";
        }
    }
}
