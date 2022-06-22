<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";



// DB query
$sql = "SELECT `id`, `name` FROM `departments`;";
$result = $conn->query($sql);

$departments = [];

if ($result && $result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    $curr_department = new Department($row["id"], $row["name"]);
    $departments[] = $curr_department;
  }
} elseif($result) {

} else {

  echo "query error";
  die();
}


// var_dump($departments);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<h1>Lista dipartimenti</h1>
<?php foreach($departments as $department) {?>
<h2><?php echo $department->name?> </h2>
<a href="single-department.php?id=<?php echo $department->id ?>">Vedi informazioni</a>  
<?php } ?>
</body>
</html>