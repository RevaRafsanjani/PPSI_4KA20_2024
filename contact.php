<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AC Nursing | Contact Us</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../acnursing/image/favicon.ico" type="image/x-icon">
</head>

<body>
    <?php require "navbar.php"; ?>

    <!-- banner -->
    <div class="container-fluid bannerservice d-flex align-items-center">
        <div class="container">
            <h1 class="text-dark text-center"><strong>Contact Us</strong></h1>
            <p class="text-white-50 text-center" style="font-size: 170%;">Available on 08.00 AM - 05.00 PM</p>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid" style="border: 1px solid rgb(255, 255, 255); width: 100%; margin: 0 auto;"></div>

    <!-- Contact Section -->
    <div class="container-fluid d-flex align-items-center warna9">
        <div class="container text-dark">
            <div class="row justify-content-center">
                <!-- Contact Information Box -->
                <div class="col-md-5">
                    <div class="contact-box mt-4 mb-1">
                        <h3 class="section-title text-center"><strong>Contact Information</strong></h3>
                        <p class="contact-text">We're here to help! Reach out to us anytime.</p>
                        <p><i class="fa-solid fa-envelope"></i> <strong>Email :</strong> <a href="mailto:ac.ndis1904@gmail.com" class="text-decoration-none">acnursing19@gmail.com</a></p>
                        <p><i class="fa-solid fa-phone"></i> <strong>Phone :</strong> <a href="tel:+61424467030" class="text-decoration-none">0424 467 030</a></p>
                        <p><i class="fas fa-map-marker-alt"></i> <strong>Our Address :</strong> 437 Sevenoaks Street, Beckenham</p>
                    </div>
                </div>

                <!-- Form Box -->
                <div class="col-md-5">
                    <div class="form-box mt-4 mb-1">
                        <h3 class="section-title text-center"><strong>Get In Touch With Us</strong></h3>
                        <form id="contactForm">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control custom-input" placeholder="Full Name" id="name" required>
                            </div>
                            <div class="input-group mb-2">
                                <textarea class="form-control custom-input" placeholder="Your Message" id="message" rows="2" required></textarea>
                            </div>
                            <div class="text-center mb-5">
                                <!-- Tombol Send dengan type="button" -->
                                <button type="button" class="btn btn-primary send-btn" id="sendBtn">
                                    <i class="fab fa-whatsapp fs-3"></i> <span>Send</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- location Services -->
    <div class="container-fluid py-2 warna9">
        <div class="container text-center">
            <h3 style="color: #69247C;"><strong>Our Locations</strong></h3>
            <div class="row justify-content-center align-items-center py-3 warna-highlight">
                <p class="text-dark fs-5">We currently offer services surroundings these areas :</p>
                <p>
                    <span class="text-black-50"><strong>Cannington, Ardross, Applecross, South Perth, Morley, and Scarborough</strong></span>.
                </p>
            </div>
        </div>
    </div>

    <!-- Garis Pemisah -->
    <div class="container-fluid" style="border: 1px solid rgb(255, 255, 255); width: 100%; margin: 0 auto;"></div>

    <!-- footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
    <script>
        document.getElementById('sendBtn').addEventListener('click', function() {
            const name = document.getElementById("name").value;
            const message = document.getElementById("message").value;

            const url = "https://api.whatsapp.com/send?phone=61424467030&text=" +
                encodeURIComponent("Hello AC Nursing Admin. Your Client with Name ") +
                encodeURIComponent(name) +
                encodeURIComponent(" is Asking About ") +
                encodeURIComponent(message);

            window.location.href = url; // Membuka WhatsApp dengan pesan yang sudah diisi
        });
    </script>
</body>

</html>