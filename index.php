<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO("mysql:host=$servername;dbname=classicmodels",$username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: ".$e->getMessage();
}

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    $conn = new PDO('mysql:host=$servername;dbname=classicmodels', $username, $password); 
        
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
catch(PDOException $e){
    die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>
<!Doctype html>

<html>
<head>
    </head>
    <body>
           <body>

        <div id="container">
            <h1>Employees</h1>

            <table class="table table-bordered table-condensed">
                 <thead>
                     <tr>
                         <th>First Name</th>
                        <th>Last Name</th>
                        <th>Job Title</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($r = $q->fetch()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['lastname'])?></td>
                        <td><?php echo htmlspecialchars($r['firstname']); ?></td>
                        
                        <td><?php 
                            
                            $text = "Name: " . htmlspecialchars($r['firstname']) . " " .  htmlspecialchars($r['lastname']) . "<br>";
                            $text .= "Job title: " . htmlspecialchars($r['jobtitle']) . "<br>";
                            $text .= "Employee number: " . htmlspecialchars($r['employeeNumber']) . "<br>";
                            $text .= "Email: " . htmlspecialchars($r['email']) . "<br>";
      
                            echo "<button onclick=\"myFunction('$text')\">Show details</button>";
                            
                            ?> </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <h1> Details as requested:</h1>
        <div id="details"></div>
        
        <script>
            function myFunction(msg) {
                document.getElementById("details").innerHTML = msg;
            }
        </script>
    </body>
</html>