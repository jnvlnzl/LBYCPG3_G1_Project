<!DOCTYPE HTML>
<HTML LANG="en">
    <HEAD>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <TITLE> ECOR | Home </TITLE>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="styles.css">
    </HEAD>
    <BODY>
      <?php
        $cartFile = 'bag.json';
        if (file_exists($cartFile)) {
          $cartData = json_decode(file_get_contents($cartFile), true);
        } else {
          $cartData = [];
        }
      ?>
      <!-- Navigation Bar -->
      <header class="navbar-frame">
          <nav class="navbar navbar-expand-lg fixed-top">
              <div class="container">
                  <a class="navbar-brand" href="home.php">
                      <i class="fas fa-robot"></i>ECOR
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
                              <li><a class="dropdown-item" href="#m402a">M402A</a></li>
                              <li><a class="dropdown-item" href="#m402b">M402B</a></li>
                              <li><a class="dropdown-item" href="#m402c">M402C</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="#v303a">V303A</a></li>
                              <li><a class="dropdown-item" href="#v303b">V303B</a></li>
                              <li><a class="dropdown-item" href="#v311">V311</a></li>
                              <li><a class="dropdown-item" href="#v312">V312</a></li>
                              <li><a class="dropdown-item" href="#v401">V401</a></li>
                              <li><a class="dropdown-item" href="#v402">V402</a></li>
                              <li><a class="dropdown-item" href="#v404">V404</a></li>
                            </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Components
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Something</a></li>
                                <li><a class="dropdown-item" href="#">Something number 2</a></li>
                              </ul>
                            </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                          </li>
                          <li class="nav-item">
                            <a class="btn" href="bag.php">
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

      <!-- Cart -->
      <section class="cart container my-5 py-5">
          <div class="container mt-5">
              <h2>Your Bag</h2>
              <hr>
          </div>
          <table class="mt-5 pt-5 table">
            <tr>
                <th>Equipment/Component</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <?php if (!empty($cartData)) : ?>
                <?php foreach ($cartData as $item) : ?>
                    <tr>
                        <td>
                            <div class="product-info">
                                <img src="<?php echo $item['image']; ?>" alt="<?php echo $item['itemName']; ?>" style="width: 50px; height: auto;">
                                <div>
                                    <p><?php echo $item['itemName']; ?></p>
                                </div>
                            </div>
                        </td>
                        <td>
                          <span><?php echo $item['quantity']; ?></span>
                        </td>
                        <td>
                          <a class="remove-btn" href="removeFromCart.php?itemID=<?php echo $item['itemID']; ?>">Remove</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3">Your cart is empty</td>
                </tr>
            <?php endif; ?>
        </table>
        <div class="cart-total">
            <table>
                <tr>
                    <td>Total Items</td>
                    <td><?php echo array_sum(array_column($cartData, 'quantity')); ?></td>
                </tr>
            </table>
        </div>
          <div class="confirm-container">
              <button class="confirm-btn">Confirm Reservation</button>
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
  
      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const sections = document.querySelectorAll('section');
          const navLinks = document.querySelectorAll('.nav-link');

          function setActiveLink() {
            let index = sections.length;

            const footer = document.querySelector('footer');
            const footerOffsetTop = footer ? footer.offsetTop : Infinity;
            const footerHeight = footer ? footer.offsetHeight : 0;

            while (--index && window.scrollY + 50 < sections[index].offsetTop) {}

            if (window.scrollY + window.innerHeight >= footerOffsetTop) {
              index = sections.length - 1; 
            }

            navLinks.forEach((link) => link.classList.remove('active', 'active-link'));
            navLinks[index].classList.add('active', 'active-link');
          }

          setActiveLink(); 

          window.addEventListener('scroll', setActiveLink);
        });
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      </BODY>
  </HTML>
