<?php include('layouts/header.php'); ?> 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dataNascimentoOriginal = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");

    $signoEncontrado = "Signo não encontrado";
    $descricao = "";

    $diaNascimento = (int)date("d", strtotime($dataNascimentoOriginal));
    $mesNascimento = (int)date("m", strtotime($dataNascimentoOriginal));

    foreach ($signos->signo as $signo) {
        $dataInicioStr = (string)$signo->dataInicio;
        $dataFimStr = (string)$signo->dataFim;

        $diaInicio = (int)substr($dataInicioStr, 0, 2);
        $mesInicio = (int)substr($dataInicioStr, 3, 2);
        $diaFim = (int)substr($dataFimStr, 0, 2);
        $mesFim = (int)substr($dataFimStr, 3, 2);

        if ($mesInicio <= $mesFim) {
            if (($mesNascimento == $mesInicio && $diaNascimento >= $diaInicio) && ($mesNascimento == $mesFim && $diaNascimento <= $diaFim)) {
                $signoEncontrado = (string)$signo->signoNome;
                $descricao = (string)$signo->descricao;
                break;
            } elseif ($mesNascimento > $mesInicio && $mesNascimento < $mesFim) {
                $signoEncontrado = (string)$signo->signoNome;
                $descricao = (string)$signo->descricao;
                break;
            } elseif ($mesNascimento == $mesInicio && $diaNascimento >= $diaInicio) {
                $signoEncontrado = (string)$signo->signoNome;
                $descricao = (string)$signo->descricao;
                break;
            } elseif ($mesNascimento == $mesFim && $diaNascimento <= $diaFim) {
                $signoEncontrado = (string)$signo->signoNome;
                $descricao = (string)$signo->descricao;
                break;
            }
        } else {
            if (($mesNascimento == $mesInicio && $diaNascimento >= $diaInicio) || ($mesNascimento == $mesFim && $diaNascimento <= $diaFim)) {
                $signoEncontrado = (string)$signo->signoNome;
                $descricao = (string)$signo->descricao;
                break;
            }
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Resultado da Consulta de Signo</title>
    <link rel="stylesheet" href="assets/css/style.css?v=2">
</head>
<body>
    <div class="container mt-5 resultado-container">
        <?php if ($signoEncontrado != "Signo não encontrado"): ?>
            <h2>Seu signo é: <?php echo htmlspecialchars($signoEncontrado); ?></h2>
            <p><?php echo htmlspecialchars($descricao); ?></p>
        <?php else: ?>
            <h2>Signo não encontrado</h2>
            <p>Não foi possível determinar o signo para a data informada.</p>
        <?php endif; ?>
        <a href="index.php" class="btn btn-primary">Voltar para Consulta</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
