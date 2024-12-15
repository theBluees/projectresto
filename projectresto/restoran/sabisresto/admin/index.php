<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Restoran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f9fafb;
            font-family: 'Inter', sans-serif;
        }
        .sidebar {
            background: linear-gradient(180deg, #34d399, #059669);
            color: #ffffff;
            border-radius: 0 1rem 1rem 0;
            overflow: hidden;
        }
        .sidebar h2 {
            font-size: 1.75rem;
            font-weight: bold;
            text-align: center;
            padding: 2rem 0;
            border-bottom: 1px solid #ffffff30;
        }
        .sidebar ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        .sidebar ul li {
            padding: 0.75rem 1.5rem;
            transition: background 0.3s, transform 0.2s;
        }
        .sidebar ul li:hover {
            background: #047857;
            transform: translateX(5px);
            border-radius: 0.375rem;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            color: #ffffff;
            text-decoration: none;
            font-size: 1rem;
        }
        .sidebar ul li a i {
            margin-right: 1rem;
        }
        .main-content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #ffffff;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }
        .card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #065f46;
            margin-bottom: 0.5rem;
        }
        .card p {
            font-size: 1.75rem;
            color: #047857;
            font-weight: bold;
        }
        .add-menu-btn {
            background: linear-gradient(90deg, #34d399, #047857);
            color: #ffffff;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: block;
            margin: 2rem auto;
        }
        .add-menu-btn:hover {
            background: linear-gradient(90deg, #047857, #065f46);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="flex h-screen">
        <aside class="sidebar w-64 p-4">
            <h2>Admin Restoran</h2>
            <ul>
                <li><a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="create.php"><i class="fas fa-utensils"></i> Add Menu</a></li>
                <li><a href="#"><i class="fas fa-receipt"></i> Pesanan</a></li>
                <li><a href="#"><i class="fas fa-users"></i> Pelanggan</a></li>
                <li><a href="#"><i class="fas fa-chart-line"></i> Laporan</a></li>
                <li><a href="#"><i class="fas fa-cog"></i> Pengaturan</a></li>
                <li><a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </aside>
        <main class="main-content flex-1 p-6">
            <header class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
                <div class="user-info flex items-center space-x-4">
                    <span class="text-gray-600">Admin</span>
                    <i class="fas fa-user-circle text-3xl text-gray-600"></i>
                </div>
            </header>
            <section class="cards">
                <div class="card">
                    <h3>Total Pesanan</h3>
                    <p>150</p>
                </div>
                <div class="card">
                    <h3>Total Menu</h3>
                    <p>30</p>
                </div>
                <div class="card">
                    <h3>Total Pelanggan</h3>
                    <p>200</p>
                </div>
                <div class="card">
                    <h3>Total Pendapatan</h3>
                    <p>Rp 5.000.000</p>
                </div>
            </section>
            <button class="add-menu-btn" onclick="window.location.href='create.php'">Add Menu</button>
        </main>
    </div>
</body>
</html>
