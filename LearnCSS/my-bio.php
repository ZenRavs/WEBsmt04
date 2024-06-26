<?php
include("dbconnect.php");
session_start();
if(isset($_SESSION['user']))
{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Assets/styles/Bootstrap/css/bootstrap.css">
        <title>My Collection - BIO</title>
    </head>
    <style>
        body, html{
            height: 100%;
            overflow: auto;
            background-color: rgb(255, 255, 255);
        }
        img{
            width: 120px;
            border-radius: 10px;
        }
    </style>
    <body style="font-family: system-ui;">
        <div class="container-fluid d-flex flex-column">
            <!-- Header -->
        
            <!-- Sidebar & Content -->
            <div class="row flex-grow-1 overflow-auto" style="height: 100%; ;">
                <!-- Sidebar -->
                <div class="col-md-3 bg-light" style="border-right: 1px solid black; padding-top: 20px;">
                    <ul class="nav flex-column">
                        <li style="font-size: 30px;
                        margin: 5px;
                        padding-bottom: 15px;">Fariz!</li>
                        <li class="nav-item">
                            <div class="btn-group">
                                <input type="search" class="form-control" placeholder="Find what..">
                                <button class="btn btn-primary">Go</button>
                            </div>
                            
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my-bio.php">Biodata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my-schedules.php">Schedule</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="destroy-session.php">Logout</a>
                        </li>
                        
                    </ul>
                </div>
        
                <!-- Main Content -->
                <div class="col-md-9" style="padding: 20px;">
                    <div class="alert alert-primary" role="alert">
                        What are u looking for?
                    </div>
                    <h2>Biodata</h2>
                    <img src="../Assets/IMG/pict01.png" alt="hzel" style="width: 150px;
                    margin-top: 10px;
                    margin-bottom: 10px;">
                    <ul>
                        <li>Name: Ridho Farizqi</li>
                        <li>ID: A12.2022.06867</li>
                        <li>Gender: Male</li>
                        <li>Pronouns: Absolutely Male</li>
                        <li>Birth at/on: Kendal 06-10-2003 </li>
                        <li>Main Devices: Phone, Laptop</li>  
                        <li>Latest Education: Senior Highschool</li>
                        <li>Current Education: Studying at UDINUS</li>
                        <li>Social Media
                            <ul>
                                <li class=""><a href="https://github.com/ZenRavs/WEBsmt04">Github</a></li>
                                <li class=""><a href="https://instagram.com">Instagram</a></li>
                                <li class=""><a href="https://twitter.com">X</a></li>
                                <li class=""><a href="https://facebook.com">Facebook</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </body>
    </html>
    <?php
}
else
{
    echo "You haven't start session yet. ";
    echo '<a href="index.php">Continue..</a>';
}
?>