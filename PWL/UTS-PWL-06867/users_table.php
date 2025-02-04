<div class="container">
    <?php
    if (isset($_SESSION['user'])) {
    ?>
        <div class="mb-3 row">
            <label for="searchbox" class="col-sm-1 col-form-label">Search</label>
            <div class="col-sm-5">
                <input type="text" class="form-control shadow-sm" id="searchbox" placeholder="Search everything..." required>
            </div>
        </div>
        <table class="table table-bordered table-striped shadow-sm" id="users_list">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col">User ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">User Picture</th>
                    <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                        <th scope="col">Action</th>
                    <?php endif; ?>

                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query('SELECT * FROM users');
                $i = 1;
                if ($stmt->num_rows > 0) {
                    while ($row = $stmt->fetch_assoc()) {
                ?>
                        <tr class="align-middle">
                            <td class="text-center">
                                <?= $i ?>
                            </td>
                            <td>
                                <?= $row["userid"]; ?>
                            </td>
                            <td>
                                <?= $row["name"]; ?>
                            </td>
                            <td>
                                <?= $row["role"]; ?>
                            </td>
                            <td class="text-center align-middle">
                                <img class="rounded mx-auto" id="img_toggle" src="data/uploads/userpict/<?= $row['pict']; ?>" alt="Profile Image" style="width: 90px; height: 90px; object-fit: cover;">
                            </td>
                            </td>
                            <?php if ($_SESSION['user']['role'] == 'admin') : ?>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <?php
                                        if ($_SESSION['user']['status'] == 'active' && $row['userid'] == $_SESSION['user']['userid']) {
                                            echo 'n/a';
                                        } elseif ($row['role'] == $_SESSION['user']['role'] && $_SESSION['user']['role'] == 'admin') {
                                        ?>
                                            <a class="btn btn-info me-1" href="data/models/form.php?req=Update&id=<?= $row['id']; ?>&name=<?= $row["name"]; ?>">Edit</a>
                                        <?php
                                        } elseif ($_SESSION['user']['role'] == 'admin') {
                                        ?>
                                            <a class="btn btn-info me-1" href="data/models/form.php?req=Update&id=<?= $row['id']; ?>&name=<?= $row["name"]; ?>">Edit</a>
                                            <button class="btn btn-danger" id="delete_btn" data-id="<?= $row['id']; ?>">&times;</button>
                                        <?php
                                        } else {
                                            echo 'n/a';
                                        }
                                        ?>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                <?php
                        $i++;
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
</div>
<?php
    } else {
        echo "U're not suppoused to be here!";
    }
