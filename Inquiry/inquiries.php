<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries</title>
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
            <li><a href = "../Inquiry/inquiries.php">Consultation Inquiry</a></li>
        </ul>
    </div>
    <div class = "menu">
    <form action = "special.php" method = "get">
        <label for = "vetSpecial">Enter Specialization: </label>
        <input type = "text" id = "vetSpecial" name = "vetSpecial"> <br> <br>
        <button type = "submit">Search</button>
    </form>
        <form action = "pet.php" method = "get">
        <label for = "petID">Enter Pet ID: </label>
        <input type = "text" id = "petID" name = "petID"> <br> <br>
        <button type = "submit">Search</button>
    </form>
    </div>
</body>
</html>