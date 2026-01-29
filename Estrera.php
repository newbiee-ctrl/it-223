<?php
include __DIR__ . '/Estrera_DB.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Users - Estrera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">User Records</h1>
            <small class="text-muted">Table: usertbl</small>
        </div>

        <?php
        $sql = "SELECT id, Name, Email, Password, Contact, Gender FROM usertbl";
        $result = mysqli_query($conn, $sql);

        if (!isset($result) || !$result) {
            echo '<div class="alert alert-danger">Database query failed.</div>';
        } elseif (mysqli_num_rows($result) > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped table-bordered align-middle">';
            echo '<thead class="table-dark"><tr><th scope="col">id</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Password</th><th scope="col">Contact</th><th scope="col">Gender</th></tr></thead><tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['id']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Email']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Password']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Contact']) . '</td>';
                echo '<td>' . htmlspecialchars($row['Gender']) . '</td>';
                echo '</tr>';
            }
            echo '</tbody></table></div>';
        } else {
            echo '<div class="alert alert-info">No rows found in usertbl.</div>';
        }
        ?>

    </div>

</body>

</html>