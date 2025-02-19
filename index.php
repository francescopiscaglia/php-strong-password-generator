<?php
session_start();
require_once './functions.php';

if (isset($_GET['length']) && is_numeric($_GET['length'])) {
    $length = (int) $_GET['length'];

    if ($length >= 4 && $length <= 30) {
        $_SESSION['generated_password'] = generatePassword($length);
        header("Location: result.php");
        exit();
    } else {
        $error = "Errore: La lunghezza deve essere compresa tra 4 e 30 caratteri.";
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Password generator</h1>

        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <label for="length" class="form-label">Lunghezza della password:</label>
                    <input type="number" class="form-control" name="length" id="length" min="4" max="30" required
                        value="<?php echo isset($_GET['length']) ? $_GET['length'] : ''; ?>">
                </div>
                <div class="col-md-6 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100">Genera Password</button>
                </div>
            </div>
        </form>

        <?php if (isset($error)) : ?>
            <div class='alert alert-danger'><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</body>

</html>