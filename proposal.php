<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <style>
        /* Custom CSS */
        .carousel-container {
            height: 200px;
            /* Set your desired height */
            overflow: hidden;
        }

        .carousel-item img {
            height: 100%;
            width: 100%;
            object-fit: cover;
            /* Fill the container while maintaining aspect ratio */
        }

        .collapsible {
            background-color: #f1f1f1;
            border: none;
            color: #333;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            outline: none;
            transition: background-color 0.3s;
            border-bottom: 1px solid #ddd;
        }

        .collapsible.active {
            background-color: #ddd;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .content p {
            margin-top: 0;
        }

        /* Change the color of the carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #DFE7F2;
            /* Change this to your desired color */
        }

        /* Change the color of the carousel indicators */
        .carousel-indicators .active {
            background-color: #DFE7F2;
            /* Change this to your desired color */
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="container">
            <a href="sample.php" class="btn btn-outline-primary" role="button" aria-pressed="true">Submit Proposal</a>
            <a href="" class="btn btn-outline-primary" role="button" aria-pressed="true">Have Questions?</a>
            <a href="./Investment.php" class="btn btn-outline-primary" role="button" aria-pressed="true" style="margin-right: 20px;">Back</a>
        </div>

        <div class="row">

            <div class="col-8">

                <div class="row mt-4">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-container" data-ride="carousel" data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="./assets/NASA.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/nature.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/2.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <h3>PREFERRED INVESTMENT AREAS IN INFRASTRUCTURE LOGISTICS & INDUSTRIAL SERVICES</h3>
                </div>

                <div class="row">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <button class="collapsible">Open Section 1</button>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <button class="collapsible">Open Section 2</button>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>
                            <button class="collapsible">Open Section 3</button>
                            <div class="content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mt-3   ">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div id="carouselExampleIndicators2" class="carousel slide carousel-container" data-ride="carousel" data-interval="3000">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="./assets/NASA.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/nature.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="./assets/2.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                </div>

            </div>

            <div class="col mt-4">

                <div class="row ml-2 mb-3">
                    <img src="./assets/incentives.png" alt="">
                </div>

                <div class="row">
                    <h3>PREFERRED INVESTMENT AREAS IN INFRASTRUCTURE LOGISTICS & INDUSTRIAL SERVICES</h3>
                </div>
                <div class="row mt-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2328.667777903835!2d124.60491914302419!3d11.013339326698103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe6ae644008122817!2sNew+Ormoc+City+Hall!5e0!3m2!1sen!2sph!4v1563515983323!5m2!1sen!2sph" width="100%" height="350" frameborder="0" allowfullscreen="">
                    </iframe>

                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                // Close all other open collapsible items
                var activeCollapsible = document.querySelector(".collapsible.active");
                if (activeCollapsible && activeCollapsible !== this) {
                    activeCollapsible.classList.remove("active");
                    activeCollapsible.nextElementSibling.style.display = "none";
                }

                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }
    </script>

</body>

</html>