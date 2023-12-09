<?php
include("connect.php");
$id =  $_GET['id'];
$query = "DELETE FROM list_entries WHERE id='$id'";
$data = mysqli_query($connection,$query);
if($data)
{
    echo "Record deleted";
    ?>
    <meta http-equiv = "refresh" content = "1; url = http://localhost/crud/displayy.php" />
    <?php
}
else {
    echo "Failed to delete";
}
?>
