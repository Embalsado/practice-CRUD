<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
         /* Define hover style for the back button */
    .side-nav:hover {
        background-color: #0076fd; /* Change background color on hover */
        color: white; /* Change text color on hover */
    }

    /* Adjust button position and style */
    .side-nav {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 1; /* Ensure button appears above the image */

        .carousel-item img {
            height: 100%;
            width: auto;
            object-fit: cover;
        }

        .carousel-inner {
            height: 300px;
            /* Set a fixed height for the carousel */
        }

        
    }
    </style>

<style>
    /* Set fixed size for carousel */
    #carouselExampleIndicators {
        width: 600px; /* Adjust width as needed */
        height: 400px; /* Adjust height as needed */
        margin: 0 auto; /* Center the carousel horizontally */
    }

    /* Ensure images fill the carousel frame */
    .carousel-inner img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Maintain aspect ratio and fill the container */
    }
</style>
</head>
<body>
    <div class="row align-items-start">
        <div class="col col-custom-image position-relative">
            <img src="Header.png" alt="..." class="img-fluid" style="width: 100%; height: 200px;">
        </div>
        <div id="mySidenav" class="sidenav">
            <!-- Add hoverable class to the button -->
            <a href="" id="back" class="btn btn-info side-nav hoverable" role="button">
                <i class="fas fa-chevron-left mr-3" style="color:rgb(28, 113, 2);"></i> Back
            </a>
        </div>
    </div>
    <div class="container">

        <div class="row align-items-center">

            <div class="col-auto ml-1" style="height: 140px;">
                <img src="../assets/ormoc_seal.png" width="100" height="100" alt="...">
                <h3>Ormoc City Ranking Sample</h3>
            </div>

            <div class="col">
                <h4 class="font-weight-bold text-center"></h4>
            </div>

        </div>

    </div>

    <div class="container">

        <div class="row align-items-center">

            <div class="card-group">
                <div class="card">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  </div>
                  
                </div>
                <div class="card">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                  </div>
                  
                </div>
                <div class="card">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                  </div>
                  
                </div>
                <div class="card">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                  </div>
              </div>

        </div>
        

    </div>

  
    
    <div class="container" style="margin-top: 15px;">
        <div class="row align-items-start">
            <div class="col col-custom-image position-relative">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" src="Geotermal.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="Pasar.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="Pineapple.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" src="Lake.jpg" alt="Fourth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    

    

    

    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>