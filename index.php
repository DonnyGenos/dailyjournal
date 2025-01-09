<?php
include "koneksi.php"; 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>My Daily Journal</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
        <link rel="shortcut icon" href="img/bluarcip.png" type="image/x-icon" />
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark-subtle fixed-top">
            <div class="container">
              <a class="navbar-brand" href="#">My Daily Journal</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-dark">
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="#article">Article</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="#gallery">Gallery</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="#jadwal">Jadwal</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="#profile">Profile</a>
                        </li>
                        <li class="nav-item my-auto">
                            <a class="navLinka nav-link" href="login.php" target="blank">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!--  -->

        <!-- Home -->
        <section id="home" class="isi text-center p-5 bg-secondary-subtle">
            <div class="container">
                <div class="d-lg-flex flex-lg-row-reverse align-items-center">
                    <img src="r1m.jpg" alt="default" class="img-fluid" width="600"/>
                    <div class="p-2">
                        <h1 class="fw-bold display-4 text-sm-start">Welcome to Donny's Journal</h1>
                        <h4 class="lead display-6 text-sm-start">
                            Halo semuanya, selamat datang di Journalku. Kali ini saya akan membagikan info tentang kegiatan saya sehari-hari
                        </h4>
                    </div>
                </div>
            </div>
        </section>
        <!--  -->

        <!-- article begin -->
        <section id="article" class="text-center p-5 bg-secondary-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Article</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
            <?php
            $sql = "SELECT * FROM article ORDER BY tanggal DESC";
            $hasil = $conn->query($sql); 

            while($row = $hasil->fetch_assoc()){
            ?>
                <div class="col">
                <div class="card h-100">
                    <img src="asset/<?= $row["gambar"]?>" class="card-img-top" alt="..." />
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
        <!-- article end -->

        <!-- Gallery -->
        <section id="galeri" class="text-center p-5 bg-secondary-subtle">
        <div class="container">
            <h1 class="fw-bold display-4 pb-3">Gallery</h1>
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">
            <?php
            $sql = "SELECT * FROM galeri ORDER BY tanggal DESC";
            $hasil = $conn->query(query: $sql);
            $isActive = true; 

            while($row = $hasil->fetch_assoc()){
                $activeClass = $isActive ? 'active': '';
                $isActive = false;
            ?>
                <div class="carousel-item <?= $activeClass ?>">
                    <img src="asset/<?= $row["gambar"] ?>" class="d-block w-100" alt="<?= $row['judul'] ?>" />
                </div>
                <?php
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
        <!--  -->

        <!-- Jadwal -->
        <section id="jadwal" class="text-center bg-secondary-subtle">
            <div class="container p-5">
                <h1 class="navLinka fw-bold display-6 pb-3">Jadwal Kuliah & Kegiatan Mahasiswa</h1>
                <div class="row row-cols-1 row-cols-md-4 g-3 justify-content-center">
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-primary">
                                <h5 class="card-title text-white">SENIN</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Probabilitas dan Statistika
                                    <p>12:30 - 15:00 | Ruang H.4.8</p>
                                </li>
                                <li class="list-group-item">
                                    Sistem Operasi
                                    <p>15:30 - 18:00 | Ruang H.4.9</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-success">
                                <h5 class="card-title text-white">SELASA</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Rekayasa Perangkat Lunak
                                    <p>09:30 - 12:00 | Ruang H.4.10</p>
                                </li>
                                <li class="list-group-item">
                                    Penambangan Data
                                    <p>15:30 - 18:00 | Ruang H.3.11</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-danger">
                                <h5 class="card-title text-white">RABU</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Kriptografi
                                    <p>09:30 - 12:00 | Ruang H.4.11</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-warning">
                                <h5 class="card-title text-white">KAMIS</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Logika Informatika
                                    <p>09:30 - 12:00 | Ruang H.4.10</p>
                                </li>
                                <li class="list-group-item">
                                    Basis Data
                                    <p>14:10 - 15:50 | Ruang H.5.14</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-info">
                                <h5 class="card-title text-white">JUMAT</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Pemrograman Berbasis Web
                                    <p>10:20 - 12:00 | Ruang D.2.J</p>
                                </li>
                                <li class="list-group-item">
                                    Basis Data
                                    <p>14:10 - 15:50 | Ruang D.3.M</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-secondary">
                                <h5 class="card-title text-white">SABTU</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        Binsik
                                        <p>07:00 - 10:00 | TLJ</p>
                                    </li>
                                    <li class="list-group-item">
                                        Mengerjakan Tugas
                                        <p>19:00 - 22:00 | Kamar</p>
                                    </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-header bg-dark">
                                <h5 class="card-title text-white">MINGGU</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    Binsik
                                    <p>07:00 - 10:00 | TLJ</p>
                                </li>
                                <li class="list-group-item">
                                    Nge-gym
                                    <p>19:00 - 20:00 | UB GYM</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <h3 class="text-sm-start justify-content-center"><b>Live Time :
                    <p>
                    <span id="tanggal"></span>
                    <span id="jam"></span>
                    </p>
                    </b>
                </h3>
            </div>
        </section>
        <!--  -->

        <!-- Profile -->
        <section id="profile" class=" profile-container bg-secondary-subtle shadow-sm rounded p-5">
            <div class="container">
            <div class=" flex-md-row text-center justify-content-center">
                <div class="fw-bold display-4 pb-5">Profile Mahasiswa</div>
                <div class="d-lg-flex flex-md-row align-items-center justify-content-evenly">
                <img src="udinus.jpg" alt="default" class="img-fluid rounded-circle" width="300"/>  
                <div class="profile-details p-2">
                    <h2 class="fw-bold text-center">Donny Amanullah Putra Rahman</h2>
                    <h6 class="text-muted text-center mb-4">Mahasiswa Teknik Informatika Kelas Unggulan'2023</h6>
                    <div class="card p-3 shadow-sm">
                    <table class="table table-borderless text-start bg-shadow-white">
                        <tbody>
                            <tr>
                                <td><b>NIM</b></td>
                                <td>: A11.2023.15426</td>
                            </tr>
                            <tr>
                                <td><b>Program Studi</b></td>
                                <td>: Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td><b>Kelompok</b></td>
                                <td>: A11.43UG1</td>
                            </tr>
                            <tr>
                                <td><b>Universitas</b></td>
                                <td>: Universitas Dian Nuswantoro</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td>: 111202315426@mhs.dinus.ac.id</td>
                            </tr>
                            <tr>
                                <td><b>No Telepon</b></td>
                                <td>: +62 878 3143 6288</td>
                            </tr>
                            <tr>
                                <td><b>Alamat</b></td>
                                <td>: Puri Bimasakti Cluster I No. 8, Gayamsari, Kota Semarang</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
            <!--  -->

        <!-- Footer -->
        <div class="text-center bg-secondary-subtle text-dark p-5">
        <svg xmlns ="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
          <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
          <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
          <path d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z"/>
        </svg>
        <footer class="text-center p-2"> <h6>- Donny Amanullah 2024 -</h6></footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!--  -->
        
        <!-- Date -->
        <script type="text/javascript">
            window.setTimeout("showTime()", 1000);

            function showTime() {
                var time = new Date();
                var month = time.getMonth() + 1;

                setTimeout("showTime()", 1000);
                document.getElementById("tanggal").innerHTML =
                    time.getDate() + "/" + month + "/" + time.getFullYear();
                document.getElementById("jam").innerHTML =
                    time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds();
            }
        </script>
        <!--  -->
    </body>
</html>