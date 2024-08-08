<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "ecor";

$conn = new mysqli($servername, $username, $password, $dbname);

$bitPosition = 1;
$bitValue = 1 << $bitPosition;

$sql = "SELECT itemName, locations, img FROM inventory WHERE (CAST(locations AS UNSIGNED) & $bitValue) != 0";
$items = $conn->query($sql);

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
        <link rel="stylesheet" href="../assets/styles.css">
    </HEAD>
    <BODY>
        <!-- Navigation Bar -->
        <header class="navbar-frame">
            <nav class="navbar navbar-expand-lg fixed-top">
                <div class="container">
                    <a class="navbar-brand" href="../home.html">
                        <i class="fas fa-robot"></i>ECOR
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="../home.html">Home</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="../home.html#about">About</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Laboratories
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="M402A.php">M402A</a></li>
                                <li><a class="dropdown-item" href="M402B.php">M402B</a></li>
                                <li><a class="dropdown-item" href="M402C.php">M402C</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="V303A.php">V303A</a></li>
                                <li><a class="dropdown-item" href="V303B.php">V303B</a></li>
                                <li><a class="dropdown-item" href="V311.php">V311</a></li>
                                <li><a class="dropdown-item" href="V312.php">V312</a></li>
                                <li><a class="dropdown-item" href="V401.php">V401</a></li>
                                <li><a class="dropdown-item" href="V402.php">V402</a></li>
                                <li><a class="dropdown-item" href="V404.php">V404</a></li>
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
                        <form class="d-flex" role="search" action="/search" method="get">
                            <input class="form-control me-2 search-bar" type="search" placeholder="Search for Equipment/Components" aria-label="Search">
                            <button class="btn" type="submit">
                                <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        <!-- About Laboratory -->
        <section id="about">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <h1>M402B</h1>
                <h3>Electrical Circuits Laboratory 1</h3>
                <p>The laboratory is equipped with measuring instruments and trainers needed to conduct all tests and measurements to 
                  learn the basic principles of DC and AC circuits, resistivity, conductivity and electric power.
                </p>
                <h4>Equipment</h4>
                <p>Electric Circuits training systems, Power Supplies, Multimeters, Wattmeters, Resistors, Capacitors, Inductors</p>
              </div>
              <div class="col-md-6">
                <img src="../assets/laboratories/M402B&C.jpg" alt="Electrical Machine Laboratory" class="img-fluid">
              </div>
            </div>
          </div>
        </section>

        <!-- Lab Catalog -->
        <section id="lab-catalog">
          <h1>List of Equipment and Components:</h1>
          <div class="container">
            <div class="row">
            <?php while($row = mysqli_fetch_assoc($items)) { ?>
              <div class="col-md-3">
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