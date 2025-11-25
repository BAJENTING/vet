<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" ){
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'vet';

    $conn = new mysqli($host, $username, $password, $db);
    if ($conn->connect_error){
        die ("Connection Error: ".$conn->connect_error);
    }

    $petOwnerID = $_GET['petOwnerID'];
    $petOwnerFName = $_POST['petOwnerFName'];
    $petOwnerLName = $_POST['petOwnerLName'];
    $petOwnerBDate = $_POST['petOwnerBDate'];
    $petOwnerTelNo = $_POST['petOwnerTelNo'];

    $sql = "UPDATE petOwner SET petOwnerFName = '$petOwnerFName', petOwnerLName = '$petOwnerLName', petOwnerBDate = '$petOwnerBDate', petOwnerTelNo = '$petOwnerTelNo' WHERE petOwnerID = '$petOwnerID'";
    
    if($conn->query($sql) === TRUE){
        echo "<script>
        alert ('Updated Successfully');
        window.location.href = '../Owners/viewOwners.php';
        </script>";
    } else {
        echo "Unable to add: ".$conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Owners</title>
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
    <form action = "" method = "post">
        <h1 style = "text-align: center;">Edit Owner</h1>
        <label for = "petOwnerFName">First Name: </label>
        <input type = "text" id = "petOwnerFName" name = "petOwnerFName" required><br><br>

        <label for = "petOwnerLName">Last Name: </label>
        <input type = "text" id = "petOwnerLName" name = "petOwnerLName" required><br><br>
        
        <label for = "petOwnerBDate">Birthdate: </label>
        <input type = "date" id = "petOwnerBDate" name = "petOwnerBDate" required><br><br>
        
        <label for = "petOwnerTelNo">Telephone No.: </label>
        <input type = "text" id = "petOwnerTelNo" name = "petOwnerTelNo" required><br><br>
        
        <button type = "submit" id = "saveBtn">Edit</button>
        <button type = "reset" id = "canBtn">Cancel</button>
    </form>
</body>
</html>