<?php

    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $databasename = 'introduction';

    try {
        $con = new PDO(
            "mysql:host=$servername;dbname=$databasename",
            $username,
            $password
        );
        $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(
            !isset($_POST['email']) ||
            !isset($_POST['password']) || 
            empty(trim($_POST['email'])) ||
            empty($_POST['password'])
        ){
            echo "Skriv in email och password";
            exit;

    }

        $email = trim($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT name, email, password, text
        FROM content
        WHERE email = :email
        ORDER BY content_ID DESC";

        $stmt = $con ->prepare($sql);

        $stmt->execute ([
            ':email'=> $email
        ]);

        $messages = $stmt -> fetchAll(PDO::FETCH_ASSOC);


        if(count($messages) === 0) {
            echo "Fel password eller inga meddelanden skickades från det här email";
            exit;
        } 
        if (!password_verify($password, $messages[0]['password'])) {
            echo "Fel email eller password.";
            exit;
        }
        else {
            
            foreach( $messages as $message){
                echo '<div class="w3-panel w3-light-grey w3-padding">';

                echo '<p><b>Name:</b>' . 
                htmlspecialchars($message['name']) . 
                '</p>';

                echo '<p><b>Email:</b>' . 
                htmlspecialchars($message['email']) . 
                '</p>';

                echo '<p><b>Message:</b>' . 
                htmlspecialchars($message['text']) . 
                '</p>';

                echo '</div>';
                }
        }
    }
    catch(PDOException $e){
        echo 'Database error: ' . $e ->getMessage();
    }
?>