<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="../scripts/js/javascripts.js"></script>
<?php
include '../scripts/dbconn.php';
session_start();
if (isset($_SESSION) && $_GET['req']) {
?>
    <div class="container mt-4 mb-4 main_form" style="width: 60%;">
        <div class="card shadow" style="background-color: white;">
            <div class="card-header mt-3">
                <?php if (isset($_GET['name'])): ?>
                    <h2 style="font-weight: bold;"><?php echo $_GET['req'] . ' "' . $_GET['name'] . '"' ?></h2>
                <?php else: ?>
                    <h2 style="font-weight: bold;"><?= $_GET['req'] ?></h2>
                <?php endif ?>
            </div>
            <div class="card-body">
                <?php if ($_GET['req'] == 'Registration') : ?>
                    <form action="../scripts/requestbase.php?req=insrtnew" class="insert_form" id="insert_form" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="userid" class="col-sm-2 col-form-label">User ID</label>
                                <div class="col-sm-10" style="width: 60%;">
                                    <input type="text" class="form-control shadow-sm" id="userid" name="userid" placeholder="Enter NIP or NIM" required>
                                    <span id="userid_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Fullname" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10" style="width: 60%;">
                                    <input type="password" class="form-control shadow-sm mb-1" id="password" name="password" placeholder="Password" required>
                                    <input type="password" class="form-control shadow-sm mb-1" id="passwordConfirm" name="confirmPassword" placeholder="Confirm password" required>
                                    <span id="password_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10" style="width: 40%;">
                                    <select class="form-select shadow-sm" id="role" name="role" required>
                                        <option value="">- Select the Role -</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Dosen">Lektor</option>
                                        <option value="Mahasiswa">Mahasiswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="pict" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input class="form-control shadow-sm" type="file" name="pict" id="pict" required>
                                    <span id="file_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between m-1">
                                <button class="col-auto btn btn-danger" id="cancel_btn" style="width: 100px;">Cancel</button>
                                <input class="col-auto btn btn-primary" id="submit_button" style="width: 100px;" type="submit"></input>
                            </div>
                        </div>
                    </form>
                <?php elseif ($_GET['req'] == 'Update') : ?>
                    <?php
                    $id = $_GET['id'];
                    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
                    $stmt->bind_param("s", $id);
                    if ($stmt->execute()) {
                        $result = $stmt->get_result();
                        $fetched = $result->fetch_assoc();
                    }
                    ?>
                    <form action="../scripts/requestbase.php?req=dataupdate" class="edit_form" id="edit_form" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <div class="form-group">
                            <div class="mb-3 row">
                                <label for="userid" class="col-sm-2 col-form-label">User ID</label>
                                <div class="col-sm-10" style="width: 60%;">
                                    <input type="text" class="form-control shadow-sm" id="userid" name="userid" value="<?= $fetched['userid'] ?>" placeholder="Enter NIP or NIM">
                                    <span id="userid_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control shadow-sm" id="name" name="name" value="<?= $fetched['name'] ?>" placeholder="Fullname" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10" style="width: 60%;">
                                    <input type="password" class="form-control shadow-sm mb-1" id="password" name="password" placeholder="Password" required>
                                    <input type="password" class="form-control shadow-sm mb-1" id="passwordConfirm" name="confirmPassword" placeholder="Confirm password" required>
                                    <span id="password_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10" style="width: 40%;">
                                    <select class="form-select shadow-sm" id="role" name="role" required>
                                        <?php
                                        $roles['role'] = ['mahasiswa', 'dosen', 'admin'];
                                        foreach ($roles['role'] as $key => $role) {
                                            $selected = ($fetched['role'] == $role) ? 'selected' : '';
                                            echo "<option value='{$role}'$selected>  {$role}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="pict" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input class="form-control shadow-sm" type="file" name="pict" id="pict">
                                    <input type="hidden" name="pict0" value="<?= $fetched['pict'] ?>">
                                    <span id="file_err" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-between m-1">
                                <button class="col-auto btn btn-danger" id="cancel_btn" style="width: 100px;">Cancel</button>
                                <input class="col-auto btn btn-primary" id="submit_button" style="width: 100px;" type="submit"></input>
                            </div>
                        </div>
                    </form>
                <?php endif ?>
            </div>
        </div>
    </div>
<?php
} else {
    echo "U're not suppoused to be here!";
}
?>