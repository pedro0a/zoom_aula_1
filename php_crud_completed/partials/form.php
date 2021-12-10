<?php if (!empty($erros)) : ?>
    <div class="alert alert-danger">
        <?php foreach ($erros as $erro) : ?>
            <div><?php echo $erro ?></div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<a href="index.php" class="btn btn-outline-success mt-3">Lista de produtos</a>

<form class="mt-5" action="" method="POST">
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $nome ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Descricao</label>
        <textarea class="form-control" name="desc"><?php echo $desc ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Preco</label>
        <input type="number" step=".2" class="form-control" name="preco" value="<?php echo $preco ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>