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
    <title>My Collection - HOME</title>
</head>
<style>
    body, html{
        height: 100%;
        overflow: auto;
        background-color: rgb(255, 255, 255);
    }
    img{
        width: 120px;
        height: 120px;
        border-radius: 10px;
        object-fit: cover;
        border: 2px solid rgb(179, 179, 179);
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
                    Hey folk, how r u today?!
                </div>
                <h2>Home</h2>
                <p>Hello folks, my name is Ridho Farizqi, these just my collection, an image i found in internet and i like it.</p>
                <ul>
                    <li>Education: Currenly studying at UDINUS</li>
                    <li>ID: A12.2022.06867</li>
                    <li>Nation: Indonesian</li>
                    <a href="Lat06-page2.html">Details..</a>
                </ul>
                
                <!-- Galleries -->
                <h3>Some Galleries</h3>
                <div class="row">
                <div class="col-md-3">
                    <img src="../Assets/IMG/pict01.png" class="img-fluid align-self-center" style="height: 200px;
                    width: 200px;" alt="hzl">
                    <p>This is hazel, a fictional character</p>
                </div>
                <div class="col-md-2">
                    <img src="../Assets/IMG/Hzel/47716315_oyfFmebAN7dIXXS.png" class="img-fluid" alt="hzl">
                    <p>Also this..</p>
                </div>
                <div class="col-md-2">
                    <img src="../Assets/IMG/Hzel/daedd798-d0e4-4479-bcbf-f5fe9eea090b.jpeg" class="img-fluid" alt="hzl">
                    <p>this..</p>
                </div>
                <div class="col-md-2">
                    <img src="../Assets/IMG/Hzel/Eunqwv8VkAYhJ8z.png" class="img-fluid" alt="hzl">
                    <p>again..</p>
                </div>
                <div class="col-md-2">
                    <img src="../Assets/IMG/pict01.png" class="img-fluid" alt="hzl">
                    <p>and the last.</p>
                </div>
                
            </div>
      
            <!-- Informative Section -->
            <h3>Really informative info</h3>
            <p>Welcome to my fictional character collection, so maybe y'all like, download it freely.
                Well those all of arts was made by @crisptyph
            </p>
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
