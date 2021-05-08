            <?=
            @include require __DIR__ . '/../cabecalho-html.php';
            ?>
            <form action="/salvar-curso<?= isset($curso) ? '?id='.$curso->getId() : ''; ?>" method="POST">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="form-control" value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>">
                </div>
                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
        <?=
        @include require __DIR__ . '/../rodape-html.php';
        ?>
        </body>
        </html>

