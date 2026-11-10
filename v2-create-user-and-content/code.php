<?php
 /* 
    Två versioner i samma dokument, en utan och en med avkommenterad säkerhet.
    Förutsättningen för övningen är databasen 'introduction', som innehåller tabellen 'content' med fälten 'contentID', 'name, 'password', 'email' och 'text'.
    OBS! Koden har ingen säkerhet, och skall INTE användas annat än som exempel.
  
    1) en så enkel variant som möjligt
  */
 
  function registerNewUser($pu_name, $pu_password, $pu_email, $pu_text)
  {
      
    try
    {
      $servername = 'localhost';
      $username = 'root';
      $password = '';
      $databasename = 'introduction';

      $con = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
      $con -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO content(name, password, email, text) VALUE('$pu_name', '$pu_password', '$pu_email', '$pu_text')";
      $stmt = $con -> prepare($sql);
      $stmt -> execute();

      echo "New user " . $pu_name . " added.";
    }

    catch(PDOException $e)
    {
      echo "Connection failed: " . $e -> getMessage();
    }
  
  }


  if(isset($_POST['send']))
  {
    $pu_name = $_POST['pu_name'];
    $pu_password = $_POST['pu_password'];
    $pu_email = $_POST['pu_email'];
    $pu_text = $_POST['pu_text'];

    echo $pu_name . $pu_password . $pu_email . $pu_text; 
    
    registerNewUser($pu_name, $pu_password, $pu_email, $pu_text);
  }

  $con = null;
?>