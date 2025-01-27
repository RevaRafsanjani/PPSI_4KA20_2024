<?php
require "session.php";
require "../koneksi.php";

// Query untuk menghitung jumlah klien
$queryClients = mysqli_query($con, "SELECT * FROM referrals");
$jumlahClients = mysqli_num_rows($queryClients);

// Ambil nilai pencarian dari form
$searchTerm = "";
if (isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($con, $_POST['search']);
}

// Query untuk mengambil data referral berdasarkan pencarian
$queryreferrals = "SELECT * FROM referrals WHERE 
                    full_name LIKE '%$searchTerm%' OR
                    date_of_birth LIKE '%$searchTerm%' OR
                    address LIKE '%$searchTerm%' OR
                    gender LIKE '%$searchTerm%' OR
                    phone LIKE '%$searchTerm%' OR
                    email LIKE '%$searchTerm%' OR
                    type_of_service LIKE '%$searchTerm%' OR
                    ndis_number LIKE '%$searchTerm%'";

// Eksekusi query
$queryreferrals = mysqli_query($con, $queryreferrals);
$referralsList = [];
while ($row = mysqli_fetch_assoc($queryreferrals)) {
    $referralsList[] = $row;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $deleteId = intval($_POST['delete_id']);
    error_log("Delete request received for ID: " . $deleteId);

    // Query untuk menghapus data berdasarkan ID
    $deleteQuery = "DELETE FROM referrals WHERE id = ?";
    $stmt = $con->prepare($deleteQuery);
    $stmt->bind_param("i", $deleteId);

    if ($stmt->execute()) {
        // Redirect ke halaman yang sama setelah penghapusan berhasil
        header("Location: clients.php");
        exit;
    } else {
        echo "<div class='alert alert-danger'>Failed to delete referral. Please try again.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminpanel | Client Referrals</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 0.8) 5%, rgba(0, 0, 0, 0.4) 100%),
            url("../image/loginbackground.png");
        background-size: cover;
        background-position: top;
        background-repeat: no-repeat;
        height: 100vh;
        margin: 0;
        background-attachment: fixed;
    }

    /* Menambahkan box-shadow dan border-radius pada tabel */
    .table {
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .table th,
    .table td {
        padding: 15px;
        text-align: center;
    }

    .table th {
        background-color: #cf8541;
        color: white;
        font-weight: bold;
    }

    .table tbody tr:nth-child(even) {
        background-color: #f9dc83;
    }

    .table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .table-bordered {
        border: 1px solid #ddd;
    }

    .table-bordered td,
    .table-bordered th {
        border: 1px solid #ddd;
    }

    /* Styling untuk breadcrumb */
    .breadcrumb {
        background-color: transparent;
    }

    .breadcrumb-item a {
        color: #cf8541;
    }

    .breadcrumb-item.active {
        color: #9454fa;
    }

    /* Styling untuk main-content */
    .main-content {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <?php require "navbar.php"; ?>

    <!-- Banner Section -->
    <div class="container-fluid py-5 text-center">
        <h2>Clients</h2>
        <p class="lead">These are the people you have referred</p>
        <p>Total Clients: <?php echo $jumlahClients; ?></p>
    </div>

    <!-- Pencarian Section -->
    <div class="container py-5">
        <div class="main-content">
            <form method="POST" action="clients.php">
                <div class="row">
                    <div class="col-md-8">
                        <input type="text" name="search" class="form-control" placeholder="Search for clients..." value="<?= htmlspecialchars($searchTerm) ?>">
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-30">Search</button>
                    </div>
                </div>
            </form>
            <hr>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="../adminpanel" class="no-decoration text-muted"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="breadcrumb-item active text-black-50" aria-current="page">
                        Category
                    </li>
                </ol>
            </nav>

            <h2 class="mb-4">Clients</h2>

            <?php if (count($referralsList) > 0): ?>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>No.</th>
                                <th>Full Name</th>
                                <th>Date of Birth</th>
                                <th>Address</th>
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Type of Service</th>
                                <th>NDIS Number</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($referralsList as $index => $referral): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= htmlspecialchars($referral['full_name']) ?></td>
                                    <td><?= htmlspecialchars($referral['date_of_birth']) ?></td>
                                    <td><?= htmlspecialchars($referral['address']) ?></td>
                                    <td><?= htmlspecialchars($referral['gender']) ?></td>
                                    <td><?= htmlspecialchars($referral['phone']) ?></td>
                                    <td><?= htmlspecialchars($referral['email']) ?></td>
                                    <td>
                                        <?php
                                        $services = explode(',', $referral['type_of_service']);
                                        foreach ($services as $service):
                                        ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" disabled checked>
                                                <label class="form-check-label"><?= htmlspecialchars($service) ?></label>
                                            </div>
                                        <?php endforeach; ?>
                                    </td>
                                    <td><?= htmlspecialchars($referral['ndis_number'] ?? 'N/A') ?></td>
                                    <td>
                                        <form method="POST" action="clients.php">
                                            <input type="hidden" name="delete_id" value="<?= htmlspecialchars($referral['id']) ?>">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this referral?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info" role="alert">
                    No referrals found for your search.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>