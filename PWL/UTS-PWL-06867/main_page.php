<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="data/scripts/js/javascripts.js"></script>

<div class="container mt-3" style="font-family: 'Trebuchet MS', sans-serif;">
    <?php
    include 'data/scripts/dbconn.php';
    session_start();
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']['role'] == "admin") {
            $_SESSION['user']['status'] = 'active';
    ?>
            <div class="card shadow mb-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-middle mt-3">
                        <span>
                            <h2 style="font-weight: bold;">Users List</h2>
                        </span>
                        <div class="justify-content-end">
                            <a class="btn btn-primary" type="submit" href="data/models/form.php?req=Registration">&plus; Add New</a>
                        </div>
                    </div>
                    <div>
                        <?php
                        if (isset($_SESSION['crud'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $_SESSION['crud']['message']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            unset($_SESSION['crud']);
                        }
                        ?>
                    </div>
                </div>
                <div class="card-body">
                    <?php include 'users_table.php' ?>
                </div>
            </div>
        <?php
        } elseif ($_SESSION['user']['role'] == "dosen" || $_SESSION['user']['role'] == "mahasiswa") {
            $_SESSION['user']['status'] = '';
        ?>
            <div class="card shadow mb-5">
                <div class="card-header">
                    <div class="row align-middle mt-3">
                        <div class="col">
                            <h2 style="font-weight: bold;">Users List</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php include 'users_table.php' ?>
                </div>
            </div>
    <?php
        } else {
            $_SESSION['error'] = 'Operation not Premitted [main_page.php]';
            header("location: index.php");
        }
    } else {
        $_SESSION['error'] = 'Operation not Premitted [main_page.php]';
        header("location: index.php");
    }
    ?>
    <title>
        <?php echo $_SESSION['user']['name'] . " As " . "[" . $_SESSION['user']['role'] . "]"; ?>
    </title>
</div>
<div class="fixed-bottom bg-transparent ms-1">
    <form action="data/scripts/requestbase.php?req=userlogt" method="post">
        <button class="btn btn-danger" type="submit">Logout</button>
    </form>
    <div style="color: grey; font-size: 11px;">
        <?php echo "userid: " . SHA1($_SESSION['user']['userid']) ?>
    </div>
</div>