<?php include("connect.php"); 
error_reporting(0);
$id =  $_GET['id'];
$query = "SELECT * FROM list_entries Where id='$id'";
$data = mysqli_query($connection,$query);
$row=$data->fetch_assoc();
$hob = $row['hobbies'];
$hob1 = explode(",", $hob)
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>update_design</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
        <div class="title">
            <h1>Update details</h1>
        </div>

        <div class="form">
            <div class="input_field">
                <label>Name</label>
                <input type="text" value="<?php echo $row['name']; ?>"class="input" name="name" required>
            </div>
            <div class="input_field">
                <label>Gender</label>
                <input type="radio" name="gender" value="Male" required <?php
                    if($row['gender'] == "Male")
                    {
                        echo "checked";
                    }
                ?> 
                ><labe>Male</labe>
                <input type="radio" name="gender" value="Female" required <?php
                    if($row['gender'] == "Female")
                    {
                        echo "checked";
                    }
                ?>><labe>Female</labe>
            </div>
            <div class="input_field">
                <label>DOB</label>
                <input class="dob" value="<?php echo $row['dob']; ?>" type="date" id="dob" name="dob" required>
            </div>
            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" required><?php echo $row['address'];?>
                </textarea>
            </div>
            <div class="input_field">
                <label>Hobbies</label>
                <input type="checkbox" name="hobbies[]" value="Books" 
                <?php
                    if(in_array('Books',$hob1))
                    {
                        echo "checked";
                    }
                    ?>
                ><labe>Books</labe>
                <input type="checkbox" name="hobbies[]" value="Songs" 
                ><labe>Songs</labe>
                <input type="checkbox" name="hobbies[]" value="Game" ><labe>Game</labe>
                <input type="checkbox" name="hobbies[]" value="Cars" ><labe>Cars</labe>
            </div>
            <div class="input_field">
                <input class="sub" type="submit" value="Update" class="btn" name="update">         
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_POST['update'])
    {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $hobbie = $_POST['hobbies'];
        $hobbie1 = implode(",",$hobbie);



        $query = "UPDATE list_entries set name='$name',gender='$gender',dob='$dob',address='$address',hobbies='$hobbie1' WHERE id='$id'";
        $data = mysqli_query($connection, $query);
        if($data)
        {
            echo "data updated";
            ?>
            <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/displayy.php" />
            <?php
        }
        else {
            echo "failed";
        }
    }
    

?>

<!-- <?php
echo $_GET['id1'];
echo $_GET['n'];
echo $_GET['g'];
echo $_GET['d'];
echo $_GET['a'];
echo $_GET['h'];
?> -->