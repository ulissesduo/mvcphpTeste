<?php
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');

$db = new db();
$pdo = $db->connection();

$searchModel = new Model($pdo);

if (isset($_POST['searchTerm'])) {
    $data = $searchModel->search($_POST['searchTerm']);
} else {
    $data = $searchModel->select();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index2</title>
</head>
<body>

    <form method="post" action="index2.php">
        <input type="text" name="searchTerm" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nome'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</body>
</html>
