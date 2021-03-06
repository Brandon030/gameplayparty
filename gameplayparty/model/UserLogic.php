<?php
require_once 'model/DataHandler.php';

class UserLogic {

    public function __construct() {
        $this->DataHandler = new Datahandler("localhost", "mysql", "gameplayparty2", "root", "");
    }

    public function __destruct() {

    }

    public function createUser($firstName, $lastName, $password, $email, $rol) {

        $result = $this->DataHandler->readsData('SELECT * FROM gebruikers WHERE email="' . $email . '"');
        $status = false;

        if (empty($firstName) && empty($lastName) && empty($password) && empty($email) && empty($gender) && empty($city) && empty($street) && empty($postal)) {
            return $status;
        }

        if ($result->rowCount() !== 0) {
            return $status;
        }

        if (strlen($password) < 5 || strlen($password) > 50) {
            return $status;
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $this->DataHandler->createData('INSERT INTO gebruikers(voornaam, achternaam, email, password, rollen_id) 
                                VALUES("' . $firstName . '","' . $lastName . '","' . $email . '","' . $passwordHash . '","'.$rol.'")');

        $status = true;

        return $status;
    }


    public function loginUser($email, $password) {
        $result = $this->DataHandler->readsData('SELECT * FROM gebruikers WHERE email="' . $email . '";');

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $passwordStatus = password_verify($password, $row['password']);
        $loginStatus = false;

        if ($passwordStatus) {
            $_SESSION['id'] = $row['gebruiker_id'];
            $_SESSION['voornaam'] = $row['voornaam'];
            $_SESSION['achternaam'] = $row['achternaam'];
            $_SESSION['rol'] = $row['rollen_id'];

            $loginStatus = true;

            return $loginStatus;
        } else {
            return $loginStatus;
        }
    }

    public function getRoles() {
        $query = $this->DataHandler->readsData('SELECT * FROM rollen;');
        return $query;
    }

    public function getRole($userId) {
        $result = $this->DataHandler->readsData('SELECT gebruikers.gebruiker_id ,gebruikers.rollen_id, rollen.rollen_id, rollen.omschrijving FROM gebruikers NATURAL JOIN rollen WHERE gebruikers.gebruiker_id = '.$userId.';')->fetch(PDO::FETCH_ASSOC);
        return $result['omschrijving'];
    }


}

?>
