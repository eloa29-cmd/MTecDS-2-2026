<?php
require '../../../config/conexao.php';
require '../../../config/header.php';
$pdo = Conexao::conectar();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$msg = "SELECT usucod AS ID, usunom AS NOM, ususen AS SENHA,usutip AS TIPO FROM usuario ORDER BY usunom";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nome =  strtoupper(filter_input (INPUT_POST,'unom'));
    $senha =  strtoupper(filter_input (INPUT_POST,'usen'));
    $tipo =  strtoupper(filter_input (INPUT_POST,'utip'));
    $sql = "INSERT INTO usuarios(usunom,ususen,usutip)VALUES(?,?,?);";
    $prp = $pdo->prepare($sql);
    if ($prp->execute([$nome,$senha,$tipo])) {
        $msg = '<span class="alert alert-success text-center">DADOS GRAVADOS COM SUCESSO!</span>';
    } else {
        $msg = '<span class="alert alert-danger text-center">ERRO AO GRAVAR OS DADOS!</span>';
    }
}  $sql = "INSERT INTO usuarios(usunom,ususen,usutip)VALUES(?,?,?);";
    $prp = $pdo->prepare($sql);
    if ($prp->execute([$nome,$senha,$tipo]))
?>
<form>
    <div class="form-group mt-2">
        <label for="filtro">Digite um Nome para Filtrar</label>
        <input type="text" name="filtrar" id="filtrar" class="form-control">
        <button type="submit" class="btn btn-outline-info mt-2" name="btnfiltrar" id="btnfiltrar">FILTRAR</button>
    </div>
</form>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>John</td>
            <td>Doe</td>
            <td>@social</td>
        </tr>
    </tbody>
</table>