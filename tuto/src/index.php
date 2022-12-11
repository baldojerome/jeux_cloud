<?php
    //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $servername = "mysql_db:3306";
    $username = "root";
    $password = "root";
    echo "je viens de reussir !! oui!!";
    echo "<br>";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=PROFIL", $username, $password);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          echo "Connected successfully";
        } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }

        $req = $conn->query('SELECT * FROM JOUEUR;');
        $result = $req->fetchAll (PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE) ;
        echo "<br>";
        var_dump($result);
        //$conn->query("INSERT INTO JOUEUR(`ID`, `MDP`) VALUES ('gerard','1111');");
        
?>