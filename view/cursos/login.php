<?=
@include require __DIR__ . '/../cabecalho-html.php';
?>

<form action="/realiza-login" method="post">
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name='email' class="form-control" required>
    </div> 
    <div class="form-group"> 
        <label for="senha">Senha:</label>
        <input type="password" name='senha' class="form-control" required>
    </div>
    <button class="btn btn-primary">
            Entrar
    </button>
</form>
<?=
@include require __DIR__ . '/../rodape-html.php';
?>