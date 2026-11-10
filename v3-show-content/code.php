<?php
/* 
  Två versioner i samma dokument, en utan och en med avkommenterad säkerhet.
  Förutsättningen för övningen är databasen 'introduction', som innehåller tabellen 'content' med fälten 'contentID', 'name, 'password', ''email' och 'text'.
  OBS! Koden har ingen säkerhet, och skall INTE användas annat än som exempel.
  
  1) en så enkel variant som möjligt
*/
  $servername = 'localhost';
  $username = 'root';
  $password = '';
  $databasename = 'introduction';

  try
    {                 
      $con = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $query = "SELECT * FROM content";
      $data = $con -> query($query);

      echo "<table width='70%' border='1'>";
      foreach($data as $row)
      {
          echo "<tr><td>" . $row['name'] . "</td>" .
               "<td>" . $row['password'] . "</td>" .
               "<td>" . $row['email'] . "</td>" .
               "<td>" . $row['text'] . "</td></tr>";
      }
      echo "</table>";
    }

    catch(PDOException $e)
    {
      echo "Connection failed: " . $e->getMessage();
    }
  
  $con = null;
?>