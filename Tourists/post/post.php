<?php
    session_start();
    if (!isset($_SESSION['email'])) {
        header("location: ../login.php");
        exit();
    }
    require('../nav.php');
    require('../../conn.php');

    $message = isset($_GET['message']) ? htmlspecialchars($_GET['message']) : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="post.css">
    <link rel="shortcut icon" href="../../res/logo.jpg">

    <style>
        .success {
            margin-top: 1rem;
            font-weight: bold;
            color: #5cb85c;
            text-align: center;

        }
    </style>

</head>
<body>
    <div class="post-container">
        <div class="image">
            <img src="../../res/about1.jpg" alt="logo">
            <img src="../../res/about2.jpg" alt="logo">

        </div>

        <div class="form">
            <h1>Submit Your Details</h1>
            <?php if ($message == 'success'): ?>
                <div class="success" id="success-alert">Your Trip was successfully scheduled! please <u><a href="tripposts.php">visit</a></u></div>
            <?php endif; ?>
            <form action="selectvehicle.php" method="POST">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter your name" value="<?php echo $_SESSION['user_name']?>" required>

                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter your email" value="<?php echo $_SESSION['email']; ?>" readonly>

                <label for="team_number">Number of Team Members</label>
                <input type="number" name="team_number" placeholder="Enter number of team members" min="1" required>

                <label for="phone">Contact Number</label>
                <input type="text" name="phone" placeholder="Enter your contact number" pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" required>

                <label for="address">Address</label>
                <input type="text" name="address" placeholder="Enter your address" required>

                <label for="destination">Destination</label>
                <input type="text" name="destination" placeholder="Enter the destination" required>

                <label for="st_date">Starting Date</label>
                <input type="date" name="st_date" required>

                <label for="end_date">Ending Date</label>
                <input type="date" name="end_date" required>

                <label for="remakes">Remarks</label>
                <textarea name="remakes" placeholder="Enter any additional details..."></textarea>

                <input type="submit" value="Proceed to Vehicle Selection">
            </form>
        </div>
    </div>
</body>

<script>
    // hide the alert after 10 seconds
    setTimeout(function() {
        var alert = document.getElementById('success-alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 10000);
</script>

</html>

