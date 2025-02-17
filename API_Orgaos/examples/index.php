<?php
require_once "../src/OrgaoManager.php";


require_once __DIR__ . '/../vendor/autoload.php';


$orgaoManager = new OrgaoManager();
$orgaoManager->carregarOrgaosDaApi();
$orgaos = $orgaoManager->listarOrgaosOrdenadosCod02();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleção de Órgãos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>

    <label for="orgaos">Selecione um Órgão:</label>
    <select id="orgaos" style="width: 400px;">
        <option value="">Selecione um órgão</option>
        <?php foreach ($orgaos as $orgao): ?>
            <option value="<?= $orgao->getCodigo(); ?>">
                <?= "{$orgao->getCodigoFormatado()} - {$orgao->getSigla()} - {$orgao->getUnidade()}"; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <script>
        $(document).ready(function() {
            $('#orgaos').select2({
                placeholder: "Selecione um órgão",
                allowClear: true
            });
        });
    </script>

</body>
</html>
