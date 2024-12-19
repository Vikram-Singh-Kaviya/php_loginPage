<?php
$insert = false;
if(isset($_POST['name'])){
    //SET CONNECTION VARIABLES.
    $server = "localhost";
    $username = "root";
    $password  = "";

    //CREATE A DATABASE CONNECTION
    $con = mysqli_connect($server, $username, $password);

    //CHECKING FOR CONNECTION SUCCESSFULLY CONNECTED.
    if(!$con) {
        die("Connection failed".mysqli_connect_error());
    }
    // echo "connection successfull";

    // COLLECT POST VARIABLES.
    $name   = $_POST['name'];
    $gender = $_POST['gender'];
    $age    = $_POST['age'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $desc  = $_POST['desc'];

    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    //echo $sql;

    //EXECUTE THE QUERY
    if($con->query($sql) == true) {
        //echo "Successfully inserted";

        //FLAG FOR SUCCESSFUL INSERTION.
        $insert = true;
    }else {
        echo "ERROR: $sql <br> $con->error";
    }

    //CLOSE THE DATABASE CONNECTION.
    $con->close();
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form </title>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@100..900&display=swap" rel="stylesheet">

</head>
<body>
    <img src="bg.jpg" class="bg" alt="image not found">
    <div class="container">
        <h1>Welcome to SISTEC Travel form</h3>
        <p>Enter your details to confirm your participation</p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for your response</p>";}
        
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>

    </div>
</body>
</html>

