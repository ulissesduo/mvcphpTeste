<?php
require_once('C:\xampp\htdocs\mvcphpTeste\model\model.php');
require_once('C:\xampp\htdocs\mvcphpTeste\config\config.php');
require_once('C:\xampp\htdocs\mvcphpTeste\controller\controller.php');

$db = new db();
$pdo = $db->connection();

$searchModel = new Model($pdo);
$controller = new Controller($searchModel);

// Check if form is submitted
if (isset($_POST['searchTerm'])) {
    $data = $searchModel->search($_POST['searchTerm']);    
}
else {
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
        <input type="submit" name="cancel" value="Cancel">
    </form>

    <?php if (isset($_POST['searchTerm']) || isset($_GET['searchTerm'])): ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td>
                        <a href="http://localhost/mvcphpteste/view/editStudent.php?id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="http://localhost/mvcphpteste/view/deleteConfirm.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nome'] ?></td>
                    <td>
                    <a href="http://localhost/mvcphpteste/view/editStudent.php?id=<?php echo $row['id'] . '&name=' . $row['nome']; ?>">Edit</a>|                  
                    <a href="http://localhost/mvcphpteste/view/deleteConfirm.php?id=<?php echo $row['id']; ?>">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>    
</body>
</html>
