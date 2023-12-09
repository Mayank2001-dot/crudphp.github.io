<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    a:link {
      color: white;
      text-decoration: none;
    }
  </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" ><h2>CRUD Application</h2></a>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="displayy.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="form.php">Add new</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container my-4">
<table class="table">
  <thead>
    <tr>
      <!-- <th scope="col">Id</th> -->
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Dob</th>
      <th scope="col">Address</th>
      <th scope="col">Hobbies</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
include("connect.php");
error_reporting(0);
$query = "SELECT * FROM list_entries";
$data = mysqli_query($connection,$query);
//$data = $connection->query($query);
if(!$data){
    die("invalid query");
}
while($row=$data->fetch_assoc()){
    echo "
    <tr>
    
    <td><img src= '$row[img]'height='70px' width='70px'></td>
    <td>$row[name]</td>
    <td>$row[gender]</td>
    <td>$row[dob]</td>
    <td>$row[address]</td>
    <td>$row[hobbies]</td>
    <td>
        <a class='btn btn-success' href='update_design.php?id=$row[id]'>Update</a>
        <button Class='btn btn-danger' onclick = 'checkdelete($row[id])'>Delete</button>
        </td>
    </tr>
    ";
}

?>
<!-- <td>$row[id]</td> -->
</tbody>

</table>

</div>


</body>
<script>
  function checkdelete(arg) {
    let v = confirm("Are you sure?");
    if(v == true) {
      window.location.replace("http://localhost/crud/delete.php?id="+arg);
    }
  }

  // <button Class='btn btn-danger' onclick = 'checkdelete()'><a href='delete.php?id=$row[id]'>Delete</a></button>
  //<button Class='btn btn-danger' onclick = 'checkdelete()'>Delete</button> 
</script>
</html>
