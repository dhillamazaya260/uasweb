<?php
include "koneksi.php"; 
?>
<!doctype html>
<html lang="en" id="htmlPage">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lunar Universe</title>
        <link rel="icon" href="images/007.png"/>
        <link 
          rel="stylesheet" 
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />
        <link 
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
            rel="stylesheet" 
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
            crossorigin="anonymous"
        />
        <style>
          html {
              scroll-behavior: smooth;
          }
          .icon-dark-mode {
              color: #000;
              transition: color 0.3s;
          }

          [data-bs-theme="dark"] .icon-dark-mode {
              color: whitesmoke; 
          }

          .checkbox {
            opacity: 0;
            position: absolute;
            display: none !important;
          }
          .checkbox-label {
            background-color: palevioletred;
            width: 50px;
            height: 26px;
            border-radius: 50px;
            position: relative;
            padding: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
          }
          .bi-moon {color: whitesmoke;}
          .bi-brightness-high {color: rgb(255, 174, 240);}
          .checkbox-label .ball {
            background-color: #fff;
            width: 22px;
            height: 22px;
            position: absolute;
            left: 2px;
            top: 2px;
            border-radius: 50%;
            transition: transform 0.2s liniear;
          }
          .checkbox:checked + .checkbox-label .ball {
            transform: translateX(24px);
          }
          #checkbox {display: none;}
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-danger-subtle sticky-top">
            <div class="container">
              <a class="navbar-brand" href="#">
                <img src="images/Desain tanpa judul (96).png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top me-2">
                Lunar Universe
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                  <li class="nav-item">
                    <a class="nav-link" href="login.php" target="_blank">Login</a>
                  </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#article">Article</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#schedule">Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about-me">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <input type="checkbox" class="checkbox" id="checkbox">
                        <label for="checkbox" class="checkbox-label">
                            <i class="bi bi-moon"></i>
                            <i class="bi bi-brightness-high"></i>
                            <span class="ball"></span>
                        </label>
                    </li>
                </ul>
            </div>
            
              </div>
            </div>
          </nav>
        <section id="hero" class="text-center p-5 bg-warning-subtle text-sm-start">
          <div class="container">
            <div class="d-sm-flex flex-sm-row-reverse align-items-center">
              <img src="images/Pinterest _ Love Ems ✨.jpg" class="img-fluid" height="200 px" width="200 px">
              <div>
                <h2 class="fw-bold display-5">Welcome to Lunar Universe</h2>
                <h5 class="lead display-6">Beauty Tips,Daily Routine,dan Random Thoughts on my head! &ensp;&ensp;&ensp;</h5>
                <h6>
                  <span id="tanggal"></span>
                  <span id="jam"></span>
                </h6>
              </div>
            </div>
          </div>
        </section>
        <!-- article begin -->
        <section id="article" class="text-center p-5">
        <div class="container">
         <h1 class="fw-bold display-4 pb-3">article</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        <?php
      $sql = "SELECT * FROM article ORDER BY tanggal DESC";
      $hasil = $conn->query($sql); 

      while($row = $hasil->fetch_assoc()){
      ?>
        <div class="col">
          <div class="card h-100">
            <img src="images/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><?= $row["judul"]?></h5>
              <p class="card-text">
                <?= $row["isi"]?>
              </p>
            </div>
            <div class="card-footer">
              <small class="text-body-secondary">
                <?= $row["tanggal"]?>
              </small>
            </div>
          </div>
        </div>
        <?php
      }
      ?> 
      </div>
     </div>
    </section>
        <!--article end-->
        <section id="schedule" class="text-center p-5">
          <h2 class="fw-bold display-4 pb-3">Schedule</h2>
          <div class="container">
            <div class="row">
              <!-- Senin -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Senin
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Free</li>
                  </ul>
                </div>
              </div>
              <!-- Selasa -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Selasa
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Probabilitas dan Statistik <br>
                      07:00-09:30 | H.3.8
                    </li>
                    <li class="list-group-item">
                      Pendidikan Kewarganegaraan <br>
                      10:20-12:00 | Aula E.3.1
                    </li>
                    <li class="list-group-item">
                      Basis Data-Teori <br>
                      14:10-15:50 | Aula H.5.14
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Rabu -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Rabu
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Basis Data-Praktek <br>
                      12:30-14:10 | D.3.M
                    </li>
                    <li class="list-group-item">
                      Technopreneurship <br>
                      14:10-15:50 | Kulino
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Kamis -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Kamis
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Sistem Operasi <br>
                      07:00-09:30 | H.5.5
                    </li>
                    <li class="list-group-item">
                      Pemrograman Berbasis Web <br>
                      14:10-15:50 | D.2.J
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Jumat -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Jumat
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                      Rekayasa Perangkat Lunak <br>
                      09:30-12:00 | H.4.5
                    </li>
                    <li class="list-group-item">
                      Logika Informatika <br>
                      12:30-15:00 | H.4.8
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Sabtu -->
              <div class="col-md-3 mb-3">
                <div class="card h-100">
                  <div class="card-header bg-danger-subtle text-black text-center">
                    Sabtu
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item">Free</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--about me start-->
        <section id="about-me" class="text-center p-5 bg-danger-subtle d-flex justify-content-center align-items-center">
          <div class="container">
            <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center">
              <img src="images/dhilla.jpg" class="img-fluid rounded-circle profile-image mb-4 mb-sm-0" width="250" alt="Profile Image">
              <div class="text-center text-sm-start ms-sm-4">
                <h6 class="text-muted">A11.2023.15299</h6>
                <h1 class="fw-bold">Dhilla Mazaya Nasucha</h1>
                <h6 class="text-muted">Program Studi Teknik Informatika</h6>
                <a href="https://dinus.ac.id/" class="custom-link">
                  <h6 class="fw-bold">Universitas Dian Nuswantoro</h6>
              </a>              
              </div>
            </div>
          </div>
        </section>
        <!--gallery begin-->
        <section id="gallery" class="text-center p-5 bg-warning-subtle">
            <div class="container">
                <h1 class="fw-bold display-4 pb-3" id="gallery">gallery</h1>
                <div id="carouselExample" class="carousel slide">
                  <div class="carousel-inner">
                  <?php
                        // Ambil data gambar dari database
                        $sql = "SELECT * FROM gallery ORDER BY tanggal DESC"; 
                        $hasil = $conn->query($sql); 

                        // Cek apakah ada gambar
                        $isActive = true; // Untuk menandai item pertama sebagai 'active'
                        while($row = $hasil->fetch_assoc()){
                            // Mendapatkan nama gambar dari kolom 'gambar'
                            $imageSrc = "images/" . $row['gambar']; // Asumsi gambar disimpan di folder 'img/'

                            // Menampilkan gambar di carousel
                            if ($isActive) {
                                // Set item pertama sebagai active
                                echo '<div class="carousel-item active">';
                                $isActive = false;
                            } else {
                                echo '<div class="carousel-item">';
                            }
                            echo '<img src="' . $imageSrc . '" class="d-block w-100" alt="gallery image">';
                            echo '</div>';
                        }
                        ?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>
        </section>
        <footer class="text-center p-5">
    <a href="https://www.instagram.com/its.zheyya"><i class="bi bi-instagram h2 p-2 icon-dark-mode"></i></a>
    <a href="https://wa.me/+6282323514257"><i class="bi bi-whatsapp h2 p-2 icon-dark-mode"></i></a>
    <a href="https://x.com/luminariesz"><i class="bi bi-twitter-x h2 p-2 icon-dark-mode"></i></a>
    <br>
    <br>
    <div>
        Dhilla Mazaya Nasucha &copy; 2024
    </div>
</footer>
        <script 
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
            crossorigin="anonymous"
        ></script>
        <script type="text/javascript">
          window.setTimeout("tampilWaktu()", 1000);

          function tampilWaktu() {
            var waktu = new Date();
            var bulan = waktu.getMonth() + 1;

            setTimeout("tampilWaktu()", 1000);
            document.getElementById("tanggal").innerHTML = waktu.getDate() + "/" + bulan + "/" + waktu.getFullYear();
            document.getElementById("jam").innerHTML = waktu.getHours() + ":" + waktu.getMinutes() + ":" + waktu.getSeconds();
          }
        </script>
        <script>
          const html = document.getElementById("htmlPage");
          const checkbox = document.getElementById("checkbox")
          checkbox.addEventListener("change", () => {
            if (checkbox.checked) {
              html.setAttribute("data-bs-theme", "dark");
            } else {
              html.setAttribute("data-bs-theme", "light");
            }
          });
        </script>
    </body>
</html>