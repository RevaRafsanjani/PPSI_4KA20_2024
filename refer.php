<?php
session_start();
require "koneksi.php";

//proses logout
if (isset($_POST['logout'])) {
    session_unset(); // Hapus semua data session
    session_destroy(); // Akhiri session
    header('location: login.php'); // Arahkan ke halaman login
    exit;
}

// Cek apakah session login sudah ada
if (!isset($_SESSION['client_id'])) {
    header('location: login.php');  // Jika tidak ada session, arahkan ke login
    exit;
}

// Tambahkan mekanisme batas waktu 5 menit
if (!isset($_SESSION['login_time'])) {
    $_SESSION['login_time'] = time(); // Simpan waktu login saat pertama kali
} else {
    $time_elapsed = time() - $_SESSION['login_time']; // Hitung waktu yang sudah berlalu
    if ($time_elapsed > 300) { // 300 detik = 5 menit
        session_unset(); // Hapus semua data session
        session_destroy(); // Hapus session
        header('location: login.php?timeout=1'); // Redirect ke login dengan notifikasi timeout
        exit;
    }
}

// Ambil nama pengguna dari sesi
$username = htmlspecialchars($_SESSION['username']); // Gunakan htmlspecialchars untuk keamanan

// Ambil data layanan dari tabel "layanan"
$querylayanan = mysqli_query($con, "SELECT * FROM layanan");
$layananList = [];
while ($row = mysqli_fetch_assoc($querylayanan)) {
    $layananList[] = $row['nama'];
}

// Ambil client_id dari session
$client_id = $_SESSION['client_id']; // Ambil client_id dari session yang sudah diset saat login

if (isset($_POST['submit_referral'])) {
    $full_name = htmlspecialchars($_POST['full_name']);
    $date_of_birth = htmlspecialchars($_POST['date_of_birth']);
    $gender = htmlspecialchars($_POST['gender']);
    $address = htmlspecialchars($_POST['address']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $type_of_service = htmlspecialchars($_POST['type_of_service']);
    $has_ndis = htmlspecialchars($_POST['has_ndis']);
    $ndis_number = $has_ndis === "Yes" ? htmlspecialchars($_POST['ndis_number']) : NULL;

    // Cek jika client_id valid dan ada di tabel clients
    $check_client = mysqli_query($con, "SELECT id FROM clients WHERE id = '$client_id'");
    if (mysqli_num_rows($check_client) == 0) {
        $error = "Invalid client_id, please log in again.";
    } else {
        // Cek apakah referral dengan nama yang sama sudah ada di database
        $checkReferral = mysqli_query($con, "SELECT * FROM referrals WHERE full_name = '$full_name' AND client_id = '$client_id'");

        if (mysqli_num_rows($checkReferral) > 0) {
            // Jika referral sudah ada dan tipe layanan berbeda
            $existingReferral = mysqli_fetch_assoc($checkReferral);
            $existingService = $existingReferral['type_of_service'];

            // Jika tipe layanan baru berbeda dengan yang sudah ada, tambahkan ke tipe layanan
            if (strpos($existingService, $type_of_service) === false) {
                $newService = $existingService . ',' . $type_of_service;
                $updateQuery = "UPDATE referrals SET type_of_service = '$newService' WHERE full_name = '$full_name' AND client_id = '$client_id'";
                if (mysqli_query($con, $updateQuery)) {
                    $success = "Referral updated with new service!";
                } else {
                    $error = "Error: " . mysqli_error($con);
                }
            } else {
                $error = "The same service type is already associated with this referral.";
            }
        } else {
            // Jika referral belum ada, insert data baru
            $query = "INSERT INTO referrals (client_id, full_name, date_of_birth, gender, address, phone, email, type_of_service, has_ndis, ndis_number) 
                    VALUES ('$client_id', '$full_name', '$date_of_birth', '$gender', '$address', '$phone', '$email', '$type_of_service', '$has_ndis', '$ndis_number')";

            if (mysqli_query($con, $query)) {
                $success = "Referral successfully submitted!";
            } else {
                $error = "Error: " . mysqli_error($con);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Refer a Client Form</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<style>
    body {
        background-image: url("image/banner3.jpg");
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-color: #f4f6f9;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 10px;
    }

    .container {
        background-color: #ffffff;
        padding: 20px;
        /* Kurangi padding agar lebih kecil */
        border-radius: 15px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        /* Batasi lebar maksimum */
        margin: auto;
        /* Pastikan form tetap berada di tengah */
    }

    h2 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 24px;
        color: #007bff;
    }

    .form-label {
        font-weight: bold;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        padding: 10px;
        font-size: 16px;
        width: 100%;
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    button {
        margin-top: 20px;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        font-size: 16px;
        width: 100%;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error-message {
        padding: 10px;
        border-radius: 5px;
        background-color: #f8d7da;
        color: #721c24;
        margin-bottom: 20px;
    }

    .success-message {
        padding: 10px;
        border-radius: 5px;
        background-color: #d4edda;
        color: #155724;
        margin-bottom: 20px;
    }

    @media (max-width: 576px) {
        .container {
            padding: 15px;
            /* Kurangi padding lebih lanjut jika perlu */
            max-width: 90%;
            /* Gunakan persentase agar lebih fleksibel */
        }
    }
</style>

<body>
    <div class="container mt-5 mb-5">
        <h2 class="text-center text-primary">Welcome, <?= htmlspecialchars($username ?? 'User') ?>! <br> Please Fill Out the Form to Refer a Client</h2>
        <form method="post" action="">
            <!-- Full Name -->
            <div class="form-group">
                <label for="full_name" class="form-label">Full Name</label>
                <input type="text" name="full_name" id="full_name" class="form-control" required>
            </div>

            <!-- Date of Birth and Gender -->
            <div class="form-group d-flex gap-3">
                <div class="flex-grow-1">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" required>
                </div>
                <div class="flex-grow-1">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled selected>Choose Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Phone and Email -->
            <div class="form-group">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <!-- Type of Service -->
            <div class="form-group">
                <label for="type_of_service" class="form-label">Type of Service</label>
                <select name="type_of_service" id="type_of_service" class="form-control" required>
                    <option value="" disabled selected>Choose Service</option>
                    <?php foreach ($layananList as $layanan): ?>
                        <option value="<?= htmlspecialchars($layanan) ?>"><?= htmlspecialchars($layanan) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- NDIS -->
            <div class="form-group">
                <label for="has_ndis" class="form-label">Do you have NDIS?</label>
                <select name="has_ndis" id="has_ndis" class="form-control" required onchange="toggleNDISInput(this.value)">
                    <option value="" disabled selected>Yes or No</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
            <div class="form-group" id="ndis_number_div" style="display: none;">
                <label for="ndis_number" class="form-label">NDIS Number</label>
                <input type="text" name="ndis_number" id="ndis_number" class="form-control">
            </div>

            <!-- Submit Button -->
            <button type="submit" name="submit_referral" class="btn btn-primary">Submit Referral</button>
        </form>


        <!-- Success/Error Messages -->
        <?php if (isset($success)): ?>
            <div class="alert alert-primary mt-3" role="alert">
                <?= $success ?>
            </div>
            <meta http-equiv="refresh" content="2; url=index.php">
        <?php endif; ?>

        <?php if (isset($error)): ?>
            <div class="error-message"><?= $error ?></div>
        <?php endif; ?>
    </div>

    <script>
        function toggleNDISInput(value) {
            const ndisDiv = document.getElementById('ndis_number_div');
            ndisDiv.style.display = value === 'Yes' ? 'block' : 'none';
        }
    </script>
    <script>
        // Hitung mundur waktu yang tersisa (10 menit = 600 detik)
        let timeLeft = 600;

        const countdownInterval = setInterval(() => {
            timeLeft -= 1;

            // Kirim permintaan untuk memperbarui waktu aktivitas terakhir ke server setiap detik
            fetch('update_activity.php')
                .then(response => response.text())
                .then(data => {
                    // Jika perlu, Anda bisa menangani respons dari server
                    console.log('Activity time updated');
                })
                .catch(error => {
                    console.error('Error updating activity time:', error);
                });

            if (timeLeft <= 0) {
                clearInterval(countdownInterval);
                alert("Your session has expired. You will be redirected to the login page.");
                window.location.href = 'login.php?timeout=1';
            }
        }, 1000);
    </script>
</body>

</html>