<?php
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";



//DB query
$sql = "SELECT `id`, `name` FROM `departments`;";
$result = $conn->query($sql);

$departments = [];
// controllo
if ($result && $result->num_rows > 0) {
// query da risultati
  while($row = $result->fetch_assoc()) {
    $curr_department = new Department($row["id"], $row["name"]);
    $departments[] = $curr_department;
  }
} elseif($result) {
// query funziona, ma no risultati
} else {
  // query non funziona, errore di sintassi
  echo "query error";
  die();
}


var_dump($departments);

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

<?php foreach($departments as $department) {?>
<h1>Lista dipartimenti</h1>
<h2><?php echo $department->name?> </h2>
<a href="single-department.php?id=<?php echo $department->id ?>">Vedi informazioni</a>  
<?php } ?>
</body>
</html>