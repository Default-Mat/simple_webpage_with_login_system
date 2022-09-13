<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="mainStyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            window.onload = function (){
                <?php
                    if(isset($_SESSION['username'])){
                        $username = $_SESSION['username'];
                        echo "
                        var link = document.getElementById('signin');
                        var list = document.getElementById('userlist');
                        link.parentNode.removeChild(link);
                        list.className = 'nav-item dropdown';
                        ";
                    }
                ?>
            }
        </script>
    </head>
    <body>

        <nav class="navbar navbar-expand-sm bg-primary navbar-dark justify-content-center">
            <div class="container-fluid">

                <a class="navbar-brand" href="#">Logo</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigationList">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navigationList">

                    <ul id="parent" class="navbar-nav me-auto">
                        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Products</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Components</a></li>
                                <li><a class="dropdown-item" href="#">Gadgents</a></li>
                                <li><a class="dropdown-item" href="#">More...</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                        <li id="userlist" class="nav-item">
                            <a id="signin" class="nav-link" href="signin.php">Sign in</a>
                            <?php
                                if(isset($_SESSION['username'])){
                                    $username = $_SESSION['username'];
                                    echo "
                                    <a class='nav-link dropdown-toggle' href='#' role='button' data-bs-toggle='dropdown'>$username</a>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' href='#'>Profile</a></li>
                                        <li><a class='dropdown-item' href='logout.php'>Log out</a></li>
                                    </ul>
                                    ";
                                }
                            ?>
                        </li>
                    </ul>
                    
                    <form class="d-flex">
                        <input class="form-control me-2" type="text" placeholder="Search">
                        <button class="btn btn-outline-light" type="button">Search</button>
                    </form>

                </div>
            </div>
        </nav>

        <div class="carousel slide" id="demo" data-bs-ride="carousel">
            
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pc1.jpg" alt="" class="d-block" style="width:100%;">
                </div>

                <div class="carousel-item">
                    <img src="pc2.jpg" alt="" class="d-block" style="width:100%;">
                </div>

                <div class="carousel-item">
                    <img src="pc3.jpg" alt="" class="d-block" style="width:100%;">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

        <div class="boxesSection">

            <div class="cont">
                <div class="box1 box">
                    <div class="boxContent">

                        <h1>First</h1>
                        <p>This is the first box</p>
                        <button type="button" class="btn btn-outline-light">Click</button>

                    </div>
                </div>
        
                <div class="box2 box">
                    <div class="boxContent">
                        <h1>Second</h1>
                        <p>This is the second box</p>
                        <button type="button" class="btn btn-outline-light">Click</button>
                    </div>
                </div>
    
                <div class="box3 box">
                    <div class="boxContent">
                        <h1>Third</h1>
                        <p>This is the third box</p>
                        <button type="button" class="btn btn-outline-light">Click</button>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>