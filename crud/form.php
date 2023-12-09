<?php include("connect.php"); 
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="title">
            <h1>CRUD Application</h1>
        </div>

        <div class="form">
            <div class="input_field">
                <label>Upload Image</label>
                <input type="file" name="uploadfile">
            </div>
            <div class="input_field">
                <label>Name</label>
                <input type="text" class="input" name="name" required>
            </div>
            <div class="input_field">
                <label>Gender</label>
                <input type="radio" name="gender" value="Male" required><labe>Male</labe>
                <input type="radio" name="gender" value="Female" required><labe>Female</labe>
            </div>
            <div class="input_field">
                <label>DOB</label>
                <input class="dob" type="date" id="dob" name="dob" required>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required></textarea>
            </div>
            <div class="input_field">
                <label>Hobbies</label>
                <input type="checkbox" name="hobbies[]" value="Books" ><labe>Books</labe>
                <input type="checkbox" name="hobbies[]" value="Songs" ><labe>Songs</labe>
                <input type="checkbox" name="hobbies[]" value="Game" ><labe>Game</labe>
                <input type="checkbox" name="hobbies[]" value="Cars" ><labe>Cars</labe>
            </div>
            <div class="input_field">
                <input class="sub" type="submit" value="submit" class="btn" name="submit">         
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_POST['submit'])
    {
        $filename = $_FILES["uploadfile"]["name"];
        $tempname = $_FILES["uploadfile"]["tmp_name"];
        $folder = "images/".$filename;
        move_uploaded_file($tempname, $folder);



        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $hobbie = $_POST['hobbies'];
        $hobbie1 = implode(",",$hobbie);
        //echo $hobbie1;


        if($name != "" && $dob != "" && $address != "")
        {

        $query = "INSERT INTO list_entries (img,name,gender,dob,address,hobbies)values('$folder','$name','$gender','$dob','$address','$hobbie1')";
        $data = mysqli_query($connection, $query);
        if($data)
        {
            echo "data inserted";
            ?>
            <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/displayy.php" />
            <?php
        }
        else {
            echo "failed";
        }
        }
    }

?>