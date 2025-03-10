

<?php

session_start();
if(!isset($_SESSION['username']) || $_SESSION['username'] == 'adm')
{
    header('location:logout.php');
}


$servername = "localhost";
$username = "root";
$password = "";
$database = "flickmate";

$connection = new mysqli($servername, $username, $password, $database);
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$uID = $_SESSION['uID'];
$sql2 = "SELECT * FROM signin WHERE uID='$uID'";

      $result2 = $connection->query($sql2);;
      $row2 = $result2->fetch_assoc();

      $fpoints = $row2["fpoints"];
      

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>flickmate</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/2fff97c9ac.js" crossorigin="anonymous"></script>
  
  <style>
     body {
     font-family: 'Poppins', sans-serif;
     margin: 0;
     padding: 0;
   }
   .card {
     background: rgb(255, 255, 255);
     border-radius: 16px;
     box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
     backdrop-filter: blur(5px);
     -webkit-backdrop-filter: blur(5px);
     border: 1px solid rgba(255, 255, 255, 0.3);
     color: black;
   }
   .card:before {
     content: "";
     position: absolute;
     top: -10px;
     left: -10px;
     right: -10px;
     bottom: -10px;
     background: rgba(255, 255, 255, 0.1);
     z-index: -1;
     filter: blur(20px);
   }
   .thum{
  border-radius: 8px;
  object-fit: cover;
}
.thum:hover{
     transform: scale(1.05);
     box-shadow: 0 15px 10px -10px rgba(31, 31, 31, 0.5);
  transition: all 0.3s ease;
}
a{
    text-decoration: none;
    color: black;
}
a:link, a:visited, a:hover, a:active{
    text-decoration: none;
}
.addMovie{
    overflow: auto;
    white-space: nowrap;
    overflow-y: hidden;
}
   /* width */
::-webkit-scrollbar {
  width: 0px;
  height: 7px;
}
/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px rgb(255, 255, 255); 
  border-radius: 5px;
}
/* Handle */
::-webkit-scrollbar-thumb {
  background: rgb(233, 226, 201); 
  border-radius: 5px;
  padding: 10px;
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: rgb(253, 158, 14); 
}

.profile-popup {
  position: absolute;
  top: 60px;
  right: 10px;
  width: 200px;
  background-color: rgba(255, 255, 255, 0.959);
  box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
  backdrop-filter: blur(5px);
  -webkit-backdrop-filter: blur(5px);
  border: 1px solid rgba(255, 255, 255, 0.3);
  padding: 10px;
  border-radius: 8px;
  box-shadow: 0 4px 15px rgba(255, 255, 255, 0.2);
  z-index: 9999;
  display: none;
  text-align: center;
}

.ppic:hover .profile-popup {
  display: block;
}
.gc{
  background-color: rgb(245, 247, 238);
}
#myVideo {
      object-fit: cover;
      width: 100vw;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      z-index: -1;
    }
  </style>
  </head>
  <body>
    <video autoplay muted loop id="myVideo">
      <source src="videos/v (2).mp4" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
   

    <div class="container-fluid m-0 p-0" >
        <div class="nbar">
            <nav  class="navbar navbar-expand-lg gc" >
                <div class="container-fluid" >
                      <a class="navbar-brand px-3 py-3" style="font-family: 'Warlow Sans', sans-serif;" href="home.php">flickmate.com</a>
                      <div class="d-flex justify-content-start">
                        <div class="ppic mx-2 mt-0 position-relative">
                            <div style="width: 40px; height: 40px; border-radius: 50%; background-image: url('images/pp6.png');background-size: cover;
                            background-repeat: no-repeat;
                            background-position: center;"></div>

                            <div class="profile-popup">
                              <i class="fa-solid fa-user fa-5x m-3" ></i>
                              <p><?php echo $_SESSION['username']; ?></p>

                              <div class="card">
                                <p class="m-1">FLICKCOIN BALANCE</p>
                                <p class="m-1">₹ <?php echo $fpoints; ?></p> <!-- Display the value of $fpoints -->
                            </div>
                              <a href="profilehist.php" class="btn btn-outline-dark my-1" style="width: 100%;">Your Orders</a>
                              <a href="logout.php" class="btn btn-outline-danger my-1" style="width: 100%;">Sign Out</a>
                            </div>

                        </div>
                      </div>
                  </div> 
              </nav>
        </div>
        <div class="cal">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="images/P5.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/P7.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="images/P6.png" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div style="border-radius: 0px;" class=" addMovie card m-0 p-2 pt-4 ">
          <div class="d-flex justify-content-start">
              <div>
                  <div>
                      <h5 class="py-1 px-2">NOW SHOWING</h5>
                  </div>

                  <div class="d-flex justify-content-start">

                  <?php
                     
                     $servername = "localhost";
                     $username = "root";
                     $password = "";
                     $database = "flickmate";
                     
                     $tdate = date("Y-m-d");

                     $connection = new mysqli($servername,$username,$password,$database);

                     if($connection->connect_error)
                     {
                         die("connection failed: " . $connection->connect_error);

                     }

                     $sql = "SELECT * FROM movies WHERE msd < NOW() AND med > NOW()";
                     $result = $connection->query($sql);

                     if (!$result){
                         die("invalid query: ".$connection->error);
                     }

                     while($row = $result->fetch_assoc()){
                       
                       if( true)
                       {
                         echo"
                         <a href='/flickmate/movieinfo.php?mid=$row[mid].php'>

                           <img class='thum m-1' src='$row[mpos]' height= '297 px' width='210 px' >
                           <p style='text-align: center;'>$row[mname]</p>
                           
                         </a>
                         
                         ";
                       }
                     }
                         
                    ?>
                  </div>
                     
              </div>
              <div>
                   <h5 class="py-1 px-2" >UPCOMMING</h5>
                  <div class="d-flex justify-content-start ">
                          <?php
                                $sql2 = "SELECT * FROM movies WHERE msd > NOW() AND med > NOW()";
                                $result2 = $connection->query($sql2);
           
                                if (!$result){
                                    die("invalid query: ".$connection->error);
                                }
           
                                while($row = $result2->fetch_assoc()){
                                  
                                  if( true)
                                  {
                                    echo"
                                    <a href='/flickmate/movieinfo.php?mid=$row[mid].php'>
           
                                      <img class='thum m-1' src='$row[mpos]' height= '297 px' width='210 px' >
                                      <p style='text-align: center;'>$row[mname]</p>
                                      
                                    </a>
                                    
                                    ";
                                  }
                                }

                          ?>
                      
                  </div>
              </div>
          </div>
      </div>

      <div id="ban" class="m-5 p-3 d-flex justify-content-end">
        <div>
          <h1 style="color: rgb(255, 255, 255);">SPECIAL FAMILY OFFERS</h1>
          <h2 style="color: rgb(255, 255, 255);">& FDFS OFFERS </h2>
          <h5 style="color: rgba(255, 255, 255, 0.658);">COMING SOON</h5>
        </div>
        
      </div>

      <div>
        <footer class="text-center text-white" style="background-color: #ffffff;">
          <!-- Grid container -->
          <div class="container pt-4">
            <!-- Section: Social media -->
            <section class="mb-4">
              <!-- Facebook -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-facebook-f"></i
              ></a>
        
              <!-- Twitter -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-twitter"></i
              ></a>
        
              <!-- Google -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-google"></i
              ></a>
        
              <!-- Instagram -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-instagram"></i
              ></a>
        
              <!-- Linkedin -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-linkedin"></i
              ></a>
              <!-- Github -->
              <a
                class="btn btn-link btn-floating btn-lg text-dark m-1"
                href="#!"
                role="button"
                data-mdb-ripple-color="dark"
                ><i class="fab fa-github"></i
              ></a>
            </section>
            <!-- Section: Social media -->
          </div>
          <!-- Grid container -->
        
          <!-- Copyright -->
          <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright :
            <a class="text-dark" href="">flickmate.com</a>
          </div>
          <!-- Copyright -->
        </footer>
      </div>

    </div>
    <script>
      const profilePopup = document.querySelector('.profile-popup');
      const ppic = document.querySelector('.ppic');

      ppic.addEventListener('click', function () {
        profilePopup.style.display = profilePopup.style.display === 'block' ? 'none' : 'block';
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>