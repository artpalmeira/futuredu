<div class="container text-center">
    <div class="row">

        <div class="cardProf">
            <?php foreach ($professor as $linha): ?>
                <div class="card" style="width: 18rem;">
                    <img src="<?= URL_BASE ?>assets/img/funcionario/<?= $linha['foto_funcionario'] ?>" class="card-img-top" alt="<?= $linha['nome_funcionario'] ?>">
                    <div class="card-body">
                        <h2><?= $linha['nome_funcionario'] ?></h2>
                        <ul class="list-group">
                            <li class="list-group-item"><?= $linha['email_funcionario'] ?></li>
                            <li class="list-group-item"><?= $linha['telefone1_funcionario'] ?></li>
                            <li class="list-group-item"><?= $linha['form_acad_funcionario'] ?></li>
                            <li class="list-group-item">Aula semana: <?= $linha['hora_aula_semanal'] ?>h.</li>
                            <li class="list-group-item">R$ <?= $linha['salario_hora_professor'] ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>