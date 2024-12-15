<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Perbarui path untuk mengarah ke folder img/gallery di dalam folder resto
    $target_dir = "../resto/img/gallery/"; // Path yang benar
    $file_name = basename($_FILES["image"]["name"]);
    $file_name = str_replace(' ', '_', $file_name); // Ganti spasi dengan underscore
    $target_file = $target_dir . $file_name;

    // Debugging: Tampilkan path
    echo "Current directory: " . getcwd() . "<br>";
    echo "Target directory: " . $target_dir . "<br>";
    echo "Target file: " . $target_file . "<br>";

    // Cek apakah folder ada
    if (!is_dir($target_dir)) {
        echo "Directory does not exist: " . $target_dir . "<br>";
    }

    // Upload file gambar
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Simpan informasi gambar ke database
        $stmt = $pdo->prepare("INSERT INTO menu_items (name, description, price, image, category) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$_POST['name'], $_POST['description'], $_POST['price'], 'resto/img/gallery/' . $file_name, $_POST['category']]);
        echo "The file " . htmlspecialchars($file_name) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Inter', sans-serif;
        }
        .form-container {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            max-width: 600px;
            margin: 2rem auto;
        }
        .form-container h2 {
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
            color: #065f46;
            margin-bottom: 1rem;
        }
        .form-container label {
            font-size: 1rem;
            font-weight: 600;
            color: #065f46;
        }
        .form-container input, .form-container textarea, .form-container select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }
        .form-container button {
            background: linear-gradient(90deg, #34d399, #047857);
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: block;
            margin: 1rem auto;
        }
        .form-container button:hover {
            background: linear-gradient(90deg, #047857, #065f46);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Menu Baru</h2>
        <form method="POST" enctype="multipart/form-data" action="">
            <label for="name">Nama Menu</label>
            <input type="text" name="name" id="name" placeholder="Masukkan nama menu" required>

            <label for="description">Deskripsi</label>
            <textarea name="description" id="description" placeholder="Masukkan deskripsi menu" required></textarea>

            <label for="price">Harga</label>
            <input type="number" name="price" id="price" placeholder="Masukkan harga" required>

            <label for="category">Kategori</label>
            <select name="category" id="category" required>
                <option value="Nasi">Nasi</option>
                <option value="Salad">Salad</option>
                <option value="Noodle">Noodle</option>
            </select>

            <label for="image">Gambar Menu</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <button type="submit">Tambah Menu</button>
        </form>
    </div>
</body>
</html>
