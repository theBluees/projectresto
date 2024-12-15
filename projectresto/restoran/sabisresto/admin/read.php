<?php
include '../db.php';
$stmt = $pdo->query("SELECT * FROM menu_items");
$menu_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Category</th>
        <th>Image URL</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($menu_items as $item): ?>
    <tr>
        <td><?php echo $item['id']; ?></td>
        <td><?php echo $item['name']; ?></td>
        <td><?php echo $item['description']; ?></td>
        <td><?php echo $item['price']; ?></td>
        <td><?php echo $item['category']; ?></td>
        <td><?php echo $item['image']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $item['id']; ?>">Edit</a>
            <a href="delete.php?id=<?php echo $item['id']; ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<a href="create.php">Add New Menu Item</a>