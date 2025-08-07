<div class="card mb-10">
    <div class="card-header">
        <h3 class="card-title">Listar alunos</h3>
        <a href="#" class="btn btn-primary btn-novo">
            <i class="bi bi-file-earmark-plus-fill"></i>
            Novo Aluno
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>CEP</th>
                    <th>Editar</th>
                    <th>Desativar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($alunos as $linha): ?>
                    <tr class="align-middle">
                        <td style="width: 200px;"><img class="img-thumbnail" src="<?= URL_BASE ?>assets/img/aluno/<?= $linha['foto_aluno'] ?>" alt="<?= $linha['nome_aluno'] ?>" />
                        </td>
                        <td><?= $linha['nome_aluno'] ?></td>
                        <td><?= $linha['cpf_aluno'] ?></td>
                        <td><?= $linha['email_aluno'] ?></td>
                        <td><?= $linha['telefone1_aluno'] ?></td>
                        <td><?= $linha['cep_aluno'] ?></td>
                        <td>
                            <a href="<?= $linha['id_aluno'] ?>" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= $linha['id_aluno'] ?>" class="btn btn-danger">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>