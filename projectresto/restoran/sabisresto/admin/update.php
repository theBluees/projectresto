<?php
include '../db.php'; 

// Check if 'id' is set in the URL
if (!isset($_GET['id'])) {
    die("ID parameter is missing.");
}

$id = $_GET['id'];

// Prepare and execute the query to fetch the item
$stmt = $pdo->prepare("SELECT * FROM menu_items WHERE id = ?");
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if the item was found
if (!$item) {
    die("Item not found.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_POST['image']; // Changed from image_url to image

    // Debugging: Check the values before executing the update
    var_dump($name, $description, $price, $category, $image, $id);

    // Prepare and execute the update query
    $stmt = $pdo->prepare("UPDATE menu_items SET name = ?, description = ?, price = ?, category = ?, image_url = ? WHERE id = ?");
    $stmt->execute([$name, $description, $price, $category, $image, $id]); // Updated here as well

    // Redirect after successful update
    header("Location: read.php");
    exit; // Always exit after a header redirect
}
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($item['name']); ?>" required>
    <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
    <input type="number" name="price" value="<?php echo htmlspecialchars($item['price']); ?>" required>
    <select name="category" required>
        <option value="Nasi" <?php echo $item['category'] == 'Nasi' ? 'selected' : ''; ?>>Nasi</option>
        <option value="Salad" <?php echo $item['category'] == 'Salad' ? 'selected' : ''; ?>>Salad</option>
        <option value="Noodle" <?php echo $item['category'] == 'Noodle' ? 'selected' : ''; ?>>Noodle</option>
    </select>
    <input type="text" name="image" value="<?php echo htmlspecialchars($item['image']); ?>" required> <!-- Changed from image_url to image -->
    <button type="submit">Update Menu Item</button>
</form>