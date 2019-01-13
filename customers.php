<?php
    require_once 'dbconfig.php';
 
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
 
    $sql = 'SELECT employeeNumber,
            lastname, 
            firstname, 
            email,
            jobtitle
            FROM employees
            ORDER BY lastname';
 
    $q = $conn->query($sql);
    
    $q->setFetchMode(PDO::FETCH_ASSOC);
 
    } 
    catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>

<!DOCTYPE html>

<html>
    <head>
        <title>PHP MySQL Query Data Demo</title>
    </head>

    <body>
        <?php include('nav_bar.php'); ?>
    </body>
</html>