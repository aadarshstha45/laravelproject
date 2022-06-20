<nav class="navbar navbar-expand-lg navbar-dark " aria-label="Fifth navbar example">
    <div class="container-fluid">
   <a href="../Pages/Home.php" class="navbar-brand"><i class="fas fa-car">Cars Easy</i></a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span ><i class="fa-solid fa-bars"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../Pages/Home.php">Home</a>
          </li>
          <li class="nav-item">
          <a href="../Pages/Cars.php" class="nav-link">Cars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Pages/About.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../Pages/Contact.php">Contact</a>
          </li>
          <!-- <li class="nav-item">
    <a class="nav-link" href="../Pages/Login.php">Login</a>
          </li>
         -->
         <div class="dropdown">
  <?php if(isset($_SESSION['name'])){?>
    <button class="dropbtn">
        <?php echo $_SESSION['name']; ?>
        <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <!-- <a href="../Users/Profile.php">Profile</a> -->
      <!-- <a href="../Pages/bookings.php">My Bookings</a> -->
      <a href="../Pages/logout.php">Log Out</a>
    </div>

  <?php }else{?>
             <a href="../Pages/Login.php" class="login">Login </a>
<?php } ?>
</div>
        </ul>

      </div>
    </div>
  </nav>
