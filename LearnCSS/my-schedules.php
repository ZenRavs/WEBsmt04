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
      <title>My Collection - SCHEDULE</title>
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
                      Seems you forget your own schedule, huh?
                  </div>
                  <h2>Schedule</h2>
                  <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Group</th>
                          <th scope="col">Date/Room Schedule 1</th>
                          <th scope="col">Date/Room Schedule 2</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>APSI II</td>
                          <td>A12.6406</td>
                          <td>KAMIS 08.40-10.20 in H.5.12</td>
                          <td>JUMAT 12.30-14.10 in H.4.10</td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>PBO</td>
                          <td>A12.6404</td>
                          <td>JUMAT 08.40-10.20 in H.3.9</td>
                          <td>KAMIS 12.30-14.10 in D.2.K</td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>PEMROGRAMAN WEB</td>
                          <td>A12.6404</td>
                          <td>RABU 08.40-10.20 in H.4.6</td>
                          <td>KAMIS 10.20-12.00 in D.2.B</td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>PSDP</td>
                          <td>A12.6404</td>
                          <td>SENIN 09.30-12.00 in H.5.9</td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>PSSI</td>
                          <td>A12.6406</td>
                          <td>SENIN 07.00-09.30 in H.5.8</td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">6</th>
                          <td>MANAJEMEN RANTAI PASOK</td>
                          <td>A12.6407</td>
                          <td>RABU 18.30-21.00 in H.3.11</td>
                          <td></td>
                        </tr>
                        <tr>
                          <th scope="row">7</th>
                          <td>TEKNOLOGI BERGERAK</td>
                          <td>A12.6604</td>
                          <td>JUMAT 07.00-08.40 in D.2.A</td>
                          <td></td>
                        </tr>
                      </tbody>  
                    </table>
                    Parsed from
                    <a href="https://siadin.dinus.ac.id/">https://siadin.dinus.ac.id/</a>
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