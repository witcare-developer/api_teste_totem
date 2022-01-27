<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php echo htmlspecialchars( $name, ENT_COMPAT, 'UTF-8', FALSE ); ?>!</h1>
    <p>Teste de Template. PHP: <?php echo htmlspecialchars( $version, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>

    <!-- O tipo de encoding de dados, enctype, DEVE ser especificado abaixo -->
    <form enctype="multipart/form-data" action="/api_teste_totem/salvar" method="POST">
        <label>Nome do produto</label><br>
        <input type="text" name="nome_produto" /><br><br>

        <label>Valor unitário do produto</label><br>
        <input type="text" name="valor_produto" /><br><br>
        <!-- MAX_FILE_SIZE deve preceder o campo input -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- O Nome do elemento input determina o nome da array $_FILES -->
        <label>Foto do Produto</label><br>
        <input name="userfile" type="file" /><br><br>
        <input type="submit" value="Enviar arquivo" /><br>
    </form>

</body>
</html>