<?php 
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Department.php";

//security problem
// $id = $_GET["id"];
// $sql = "SELECT * FROM `departments` WHERE `id`=$id;";
// $result = $conn->query($sql);
// var_dump($result);

//preparazione statement
$stmt = $conn->prepare("SELECT * FROM `departments` WHERE `id`=?");
$stmt->bind_param('d', $id);
$id = $_GET["id"];

//esecuzione query
$stmt->execute();
$result = $stmt->get_result();

// var_dump($result);

$departments = [];

if($result && $result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $curr_department = new Department($row["id"], $row["name"]);
    $curr_department->setContactData($row["address"], $row["phone"], $row["email"], $row["website"]);
    $curr_department->head_of_department = $row["head_of_department"];
    $departments[] = $curr_department;
  }
} elseif($result) {
  echo "dipartimento non trovato";
} else {
  echo "error";
}
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

<a href="index.php">Ritorna all'elenco</a>

  <?php foreach($departments as $department) {?>
    <h1><?php echo $department->name ?></h1>
    <p> Coordinatore: <?php echo $department->head_of_department ?> </p>
    <h2>contatti</h2>
    <ul>
      <?php foreach($department->getContactsAsArray() as $key => $value) { ?>

        <li><?php echo "$key : $value" ?></li>
    <?php } ?>
    </ul>
    <?php } ?>
</body>
</html>