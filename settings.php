
<?php

function registerNewUser($pu_name, $pu_email, $pu_password, $pu_text)
{
    try {
        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'introduction';

        $con = new PDO(
            "mysql:host=$servername;dbname=$databasename;charset=utf8mb4",
            $username,
            $password
        );

        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $passwordHash = password_hash($pu_password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO content (name, email, password, text)
                VALUES (:name, :email, :password, :text)";

        $stmt = $con->prepare($sql);

        $stmt->execute([
            ':name' => $pu_name,
            ':email' => $pu_email,
            ':password' => $passwordHash,
            ':text' => $pu_text
        ]);

        echo "Meddelande skickats!";
    }
    catch (PDOException $e) {
        echo "Databas fel: " . $e->getMessage();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pu_name = $_POST['Name'] ?? '';
    $pu_email = $_POST['Email'] ?? '';
    $pu_password = $_POST['Password'] ?? '';
    $pu_text = $_POST['Message'] ?? '';

    registerNewUser($pu_name, $pu_email, $pu_password, $pu_text);
}
