<?php
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $sql = "SELECT * FROM pet";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pets</title>
    <link rel = "stylesheet" href = "../CSS/styles.css">
</head>
<body>
    <div id = "navbar">
        <ul>
            <li><a href = "../dashboard.php">Home</a></li>
            <li><a href = "../Owners/viewOwners.php">Owners</a></li>
            <li><a href = "../Pets/viewPets.php">Pets</a></li>
            <li><a href = "../Veterinarian/viewVets.php">Veterinarian</a></li>
            <li><a href = "../Consultation/viewCons.php">Consultation</a></li>
        </ul>
    </div>
    <a href = "addPets.php"><button id = "addBtn">+ Add</button></a>
    <table border = 1 cellpadding = 10 cellspacing = 1 style = "width: 100%">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Breed</th>
            <th>Birthdate</th>
            <th>Owner ID</th>
            <th>Actions</th>
        </tr>
        <?php
            if ($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['petID']."</td>";
                    echo "<td>".$row['petName']."</td>";
                    echo "<td>".$row['petType']."</td>";
                    echo "<td>".$row['petBreed']."</td>";
                    echo "<td>".$row['petBDate']."</td>";
                    echo "<td>".$row['petOwnerID']."</td>";
                    echo "<td>
                        <a href = 'editPets.php?petID=".$row['petID']."'><button id = 'editBtn'>Edit</button></a>
                        <a href = 'delPets.php?petID=".$row['petID']."'><button id = 'delBtn'>Del</button></a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan = '7'>No Records Found</td></tr>";
            }
        ?>
    </table>
</body>
</html>