<?php
session_start();

if (!isset($_SESSION['generated_password'])) {
    header("Location: index.php");
    exit();
}

$password = $_SESSION['generated_password'];
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">La tua password generata</h1>
        <div class="alert alert-success">
            <strong>Password:</strong> <?php echo $password; ?>
        </div>
        <a href="index.php" class="btn btn-primary">Genera un'altra password</a>
    </div>
</body>

</html>