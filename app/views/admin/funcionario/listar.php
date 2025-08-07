<div class="card mb-10">
    <div class="card-header">
        <h3 class="card-title">Listar funcionário</h3>
        <a href="#" class="btn btn-primary btn-novo">
            <i class="bi bi-file-earmark-plus-fill"></i>
            Novo funcionário
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
                    <th>Cargo</th>
                    <th>CEP</th>
                    <th>Editar</th>
                    <th>Desativar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($funcionarios as $linha): ?>
                    <tr class="align-middle">
                        <td style="width: 200px;"><img class="img-thumbnail" src="<?= URL_BASE ?>assets/img/funcionario/<?= $linha['foto_funcionario'] ?>" alt="<?= $linha['nome_funcionario'] ?>" />
                        </td>
                        <td><?= $linha['nome_funcionario'] ?></td>
                        <td><?= $linha['cpf_funcionario'] ?></td>
                        <td><?= $linha['email_funcionario'] ?></td>
                        <td><?= $linha['telefone1_funcionario'] ?></td>
                        <td><?= $linha['cargo_funcionario'] ?></td>
                        <td><?= $linha['cep_funcionario'] ?></td>
                        <td>
                            <a href="<?= $linha['id_funcionario'] ?>" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a href="<?= $linha['id_funcionario'] ?>" class="btn btn-danger">
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