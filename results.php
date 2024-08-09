<?php
require 'db_connection.php'; 

if (isset($_GET['q'])) {
    $searchQuery = mysqli_real_escape_string($conn, $_GET['q']);

    $sql = "SELECT * FROM inventory WHERE itemName LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%'";
    $result = $conn->query($sql);
} else {
    $result = false;
}
?>

<!DOCTYPE HTML>
<HTML LANG="en">
    <HEAD>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <TITLE> ECOR | Home </TITLE>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="assets/styles.css">
    </HEAD>
    <BODY>
        <!-- Navigation Bar -->
        <header class="navbar-frame">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="home.php">
                      <img src="assets/logo.png" alt="ECOR Logo" class="navbar-logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="home.php">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#about">About</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Laboratories
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="laboratories/M402A.php">M402A</a></li>
                                <li><a class="dropdown-item" href="laboratories/M402B&C.php">M402B</a></li>
                                <li><a class="dropdown-item" href="laboratories/M402B&C.php">M402C</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="laboratories/V303A.php">V303A</a></li>
                                <li><a class="dropdown-item" href="laboratories/V303B.php">V303B</a></li>
                                <li><a class="dropdown-item" href="laboratories/V311.php">V311</a></li>
                                <li><a class="dropdown-item" href="laboratories/V312.php">V312</a></li>
                                <li><a class="dropdown-item" href="laboratories/V401.php">V401</a></li>
                                <li><a class="dropdown-item" href="laboratories/V402.php">V402</a></li>
                                <li><a class="dropdown-item" href="laboratories/V404.php">V404</a></li>
                              </ul>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="catalog.html">Catalog</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item">
                              <a class="btn" href="cart.html">
                                <i class="fas fa-shopping-bag"></i></a>
                            </li>
                        </ul>
                        <div class="search-container position-relative">
                          <form class="d-flex" role="search" action="results.php" method="get">
                              <input type="text" id="searchQuery" name="q" class="form-control" placeholder="Search for items..." required>
                              <button class="btn" type="submit">
                                  <i class="fas fa-search"></i>
                              </button>
                          </form>
                        </div>
                      </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Search Catalog -->
        <section id="lab-catalog">
    <h1>List of Equipment and Components:</h1>
    <div class="container">
        <div class="row justify-content-center">
            <?php 
            $num_rows = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)) { 
                $col_class = $num_rows == 1 ? 'col-md-6' : 'col-md-3'; // Adjust column size for a single item
            ?>
                <div class="<?php echo $col_class; ?>">
                    <div class="card">
                        <div class="image">
                            <img src="<?php echo $row["img"]; ?>" alt="">
                        </div>
                        <div class="description">
                            <p class="itemName"><?php echo $row["itemName"]; ?></p>
                        </div>
                        <button class="details">View Details</button>
                        <button class="reserve">Reserve</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
    
        <!-- Contact -->
        <footer id="contact">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h6>Contact Us</h6>
                <div class="contact-info">
                  <i class="fas fa-envelope"></i><span><a href="mailto:dece.ecor@dlsu.edu.ph" class="email-link">dece.ecor@dlsu.edu.ph</a></span>
                </div>
                <div class="contact-info">
                  <i class="fas fa-phone"></i><span>0263729</span>
                </div>
                <div class="contact-info">
                  <i class="fas fa-map-marker-alt"></i><span>V312, Velasco Building, De La Salle University Taft</span>
                </div>
              </div>
              <div class="col-md-6">
                <h6>Authors</h6>
                <ul class="list-unstyled">
                  <li>Gabriel Ocampo | <a href="mailto:gabriel_ocampo@dlsu.edu.ph" class="email-link">gabriel_ocampo@dlsu.edu.ph</a></li>
                  <li>Milo Perez | <a href="mailto:luis_pereziv@dlsu.edu.ph" class="email-link">luis_pereziv@dlsu.edu.ph</a></li>
                  <li>Alvin Valenciano | <a href="mailto:alvin_valenciano@dlsu.edu.ph" class="email-link">alvin_valenciano@dlsu.edu.ph</a></li>
                  <li>Jana Valenzuela | <a href="mailto:jana_valenzuela@dlsu.edu.ph" class="email-link">jana_valenzuela@dlsu.edu.ph</a></li>
                  <br>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-23 text-center">
                <p>&copy; 2024 ECOR. All Rights Reserved.</p>
              </div>
            </div>
          </div>  
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9tv1xKFi3If5XMR2hpUlvZmK4jTD87sMBRsbP1d1R28i5u7I4Fq" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-7/z43myK/2ZwQ+oypxB4eD9HJo1a4gRm0M2T+22Bz7T5mG3b6APmA4f0V0pWgLJ0" crossorigin="anonymous"></script>
    </BODY>
</HTML>