<!DOCTYPE html>
<html>
<style>
    .tm-gallery {
        margin-top: 20px;
    }

    .tm-card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        transition: transform 0.2s;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .tm-card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        width: 100%;
        height: 200px; /* Atur tinggi gambar sesuai kebutuhan */
        object-fit: cover; /* Memastikan gambar tidak terdistorsi */
    }

    .card-body {
        padding: 15px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
        color: #555;
    }

    .tm-gallery-price {
        font-size: 1.1rem;
        font-weight: bold;
        color: #000;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Home Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
    <link href="css/style.css" rel="stylesheet" />
</head>

<body> 
    <div class="container">
        <!-- Top box -->
        <!-- Logo & Site Name -->
        <div class="placeholder">
            <div class="parallax-window" data-parallax="scroll" data-image-src="aset/backutama.png">
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <img src="aset/sabis resto.png" alt="Logo" class="tm-site-logo" height="70px" width="70px" /> 
                            <div class="tm-site-text-box">
                                <h1 class="tm-site-title">SABIS</h1>
                                <h6 class="tm-site-description">Restoran Bintang 5 Harga Kaki 5</h6>    
                            </div>
                        </div>
                        <nav class="col-md-6 col-12 tm-nav">
                            <ul class="tm-nav-ul">
                                <li class="tm-nav-li"><a href="index.php" class="tm-nav-link active">Home</a></li>
                                <li class="tm-nav-li"><a href="about.html" class="tm-nav-link">About</a></li>
                                <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Contact</a></li>
                            </ul>
                        </nav>    
                    </div>
                </div>
            </div>
        </div>

        <main>
            <header class="row tm-welcome-section">
                <h2 class="col-12 text-center tm-section-title">Welcome to Restoran Sabis</h2>
                <p class="col-12 text-center">                    
                    Nikmati hidangan istimewa dengan cita rasa premium tanpa menguras kantong. 
                    Restoran Sabis menghadirkan pengalaman kuliner bintang 5 dengan suasana nyaman dan harga terjangkau. 
                    Cocok untuk makan bersama keluarga, teman, atau rekan kerja. 
                    Rasakan kenikmatan di setiap gigitan!
                </p>
            </header>
            
            <div class="tm-paging-links">
                <nav>
                    <ul>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link active">Nasi</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link">Salad</a></li>
                        <li class="tm-paging-item"><a href="#" class="tm-paging-link">Noodle</a></li>
                    </ul>
                </nav>
            </div>

            <div class="row tm-gallery">
                <!-- gallery page 1 -->
                <div id="tm-gallery-page-pizza" class="tm-gallery-page">
                    <?php
                    include '../db.php';

                    // Mengambil semua item menu dari database
                    $stmt = $pdo->query("SELECT * FROM menu_items WHERE category = 'Nasi'");
$menu_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($menu_items as $item): 
    // Debugging: Tampilkan jalur gambar
    echo "<!-- Gambar URL: " . $item['image'] . " -->"; ?>
    <div class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
        <div class="card tm-card">
            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="card-img-top tm-gallery-img" />
            <div class="card-body">
                <h5 class="card-title"><?php echo $item['name']; ?></h5>
                <p class="card-text"><?php echo $item['description']; ?></p>
                <p class="tm-gallery-price">Harga: <?php echo $item['price']; ?></p>
                <button class="btn btn-primary">PESAN</button>
            </div>
        </div>
    </div>
<?php endforeach; ?>
   
                </div> <!-- gallery page 1 -->
                
                <!-- gallery page 2 -->
                <div id="tm-gallery-page-salad" class="tm-gallery-page hidden">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM menu_items WHERE category = 'Salad'");
                    $menu_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($menu_items as $item): ?>
                    <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <figure>
                            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="img-fluid tm-gallery-img" />
                            <figcaption>
                                <h4 class="tm-gallery-title"><?php echo $item['name']; ?></h4>
                                <p class="tm-gallery-description"><?php echo $item['description']; ?></p>
                                <p class="tm-gallery-price"><button> PESAN </button></p>
                            </figcaption>
                        </figure>
                    </article>
                    <?php endforeach; ?>
                </div> <!-- gallery page 2 -->
                
                <!-- gallery page 3 -->
                <div id="tm-gallery-page-noodle" class="tm-gallery-page hidden">
                    <?php
                    $stmt = $pdo->query("SELECT * FROM menu_items WHERE category = 'Noodle'");
                    $menu_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($menu_items as $item): ?>
                    <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
                        <figure>
                            <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="img-fluid tm-gallery-img" />
                            <figcaption>
                                <h4 class="tm-gallery-title"><?php echo $item['name']; ?></h4>
                                <p class="tm-gallery-description"><?php echo $item['description']; ?></p>
                                <p class="tm-gallery-price"><button> PESAN </button></p>
                            </figcaption>
                        </figure>
                    </article>
                    <?php endforeach; ?>
                </div> <!-- gallery page 3 -->
            </div>
            <div class="tm-section tm-container-inner">
                <div class="row">
                    <div class="col-md-6">
                        <figure class="tm-description-figure">
                            <img src="aset/img-01.jpg" alt="Image" class="img-fluid" />
                        </figure>
                    </div>
                    <div class="col-md-6">
                        <div class="tm-description-box"> 
                            <h4 class="tm-gallery-title">Maecenas nulla neque</h4>
                            <p class="tm-mb-45">Redistributing this template as a downloadable ZIP file on any template collection site is strictly prohibited. You will need to <a rel="nofollow" href="https://templatemo.com/contact">talk to us</a> for additional permissions about our templates. Thank you.</p>
                            <a href="about.html" class="tm-btn tm-btn-default tm-right">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="tm-footer text-center">
            <p>Copyright &copy; 2020 Simple House 
            | Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
        </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/parallax.min.js"></script>
    <script>
        $(document).ready(function(){
            // Handle click on paging links
            $('.tm-paging-link').click(function(e){
                e.preventDefault();
                
                var page = $(this).text().toLowerCase();
                $('.tm-gallery-page').addClass('hidden');
                $('#tm-gallery-page-' + page).removeClass('hidden');
                $('.tm-paging-link').removeClass('active');
                $(this).addClass("active");
            });
        });
    </script>
</body>
</html>