<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descubra seu Signo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="card shadow-lg p-4 w-100" style="max-width: 500px;">
            <h2 class="card-title text-center text-primary">Descubra seu signo</h2>
            <div class="card-body">
                <form action="show_zodiac_sign.php" method="POST">
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
                        <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Consultar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


