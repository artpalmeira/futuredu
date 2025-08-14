<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['mensagem']) && isset($_SESSION['tipoMsg'])) {

    $msg    = $_SESSION['mensagem'];
    $tipo   = $_SESSION['tipoMsg'];

    /** Exibir mensagem */
    if ($tipo == 'sucesso') {
        echo '<div class="alert alert-success" role="alert">' . $msg . '</div>';
    } elseif ($tipo == 'erro') {
        echo '<div class="alert alert-danger" role="alert">' . $msg . '</div>';
    }

    unset($_SESSION['mensagem']);
    unset($_SESSION['tipoMsg']);
}

?>




<div class="card mb-10">
    <div class="card-header">
        <h3 class="card-title">Listar cursos</h3>
        <a href="<?= URL_BASE ?>curso/adicionar" class="btn btn-primary btn-novo">
            <i class="bi bi-file-earmark-plus-fill"></i>
            Novo Curso
        </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Nível</th>
                    <th>Modalidade</th>
                    <th>Valor</th>
                    <th>CH</th>
                    <th>Área</th>
                    <th>Requisito</th>
                    <th style="text-align: center;">Publicar</th>
                    <th style="text-align: center;">Editar</th>
                    <th style="text-align: center;">Desativar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursos as $linha): ?>
                    <tr class="align-middle">
                        <td style="width: 200px;"><img class="img-thumbnail" src="<?= URL_BASE ?>upload/curso/<?= $linha['foto_curso'] ?>" alt="<?= $linha['nome_curso'] ?>" />
                        </td>
                        <td><?= $linha['nome_curso'] ?></td>
                        <td><?= $linha['nivel_curso'] ?></td>
                        <td><?= $linha['modalidade_curso'] ?></td>
                        <td>R$ <?= $linha['valor_curso'] ?></td>
                        <td><?= $linha['carga_horaria_curso'] ?></td>
                        <td><?= $linha['area_curso'] ?></td>
                        <td><?= $linha['pre_requisito_curso'] ?></td>
                        <td style="text-align: center;">
                            <input
                                class="form-check-input toggle-status"
                                type="checkbox"
                                role="switch"
                                data-id="<?= $linha['id_curso'] ?>"
                                <?= $linha['status_curso'] === 'Ativo' ? 'checked' : '' ?>>
                        </td>
                        <td>
                            <a href="<?= URL_BASE ?>curso/editar/<?= $linha['id_curso'] ?>" class="btn btn-primary">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                        <td>
                            <a
                                href="#"
                                class="btn btn-danger"
                                onclick="abrirModalDesativar(<?= $linha['id_curso']; ?>); return false;">
                                <i class="bi bi-trash3-fill"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<!-- Modal Para Desativar Cursos -->
<div class="modal fade" id="desativarCurso" tabindex="-1" role="dialog" aria-labelledby="desativarCursoLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="desativarCursoLabel">Desativar Curso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja desativar esse curso?</p>
                <input type="hidden" id="idCurso" value="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="naoDesativar">Não</button>
                <button type="button" class="btn btn-primary" id="simDesativar">Sim</button>
            </div>
        </div>
    </div>
</div>




<script>
    // Script para mudar o status de Publicar para Ativo
    document.querySelectorAll('.toggle-status').forEach(input => {
        input.addEventListener('change', function() {
            const id = this.dataset.id;
            const status = this.checked ? 'Ativo' : 'Pendente';
            // Requisição AJAX com fetch
            fetch('<?= URL_BASE ?>curso/atualizarStatus', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id_curso: id,
                        status_curso: status
                    })
                })

                .then(response => response.json())
                .then(data => {
                    if (!data.sucesso) {
                        alert('Erro ao atualizar status');
                        this.checked = !this.checked
                    }
                })

                .catch(() => {
                    alert('Erro de comunicação.')
                    this.checked = !this.checked
                })

        })
    })


    // Script para abrir o modal e desativar o curso
    function abrirModalDesativar(idCurso) {

        if ($('#desativarCurso').hasClass('show')) {
            return;
        }
        document.getElementById('idCurso').value = idCurso
        $('#desativarCurso').modal('show');


        // Ao clicar no botão SIM - pegar o ID
        document.getElementById('simDesativar').addEventListener('click', function() {

            const idCurso = document.getElementById('idCurso').value

            if (idCurso) {
                desativarCurso(idCurso)
            }

        })

        // Para o btn do Daniel que não funcionava
        document.getElementById('naoDesativar').addEventListener('click', function() {
            $('#desativarCurso').modal('hide');
        })


        // Função em AJAX para realizar uma solicitação ao controller curso, chamando o método desatiavar
        function desativarCurso(idCurso) {

            fetch(`<?= URL_BASE ?>curso/desativar/${idCurso}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => {
                    // Se o código de reposta não for OK, lançar um erro
                    if (!response.ok) {
                        throw new Error(`Erro HTTP: ${response.status}`)
                    }
                    return response.json()
                })
                .then(data => {
                    // Se a resposta for OK, fecha o Modal e recarrega a página
                    if (data.sucesso) {
                        console.log("Curso desativado com SUCESSO!")
                        $('#desativarCurso').modal('hide');
                        setTimeout(() => {
                            location.reload();
                        }, 500) // Delay carregar

                    } else {
                        console.log("Erros ao desativar o curso!")
                        alert(data.mensagem)
                    }
                })
                .catch(error => {
                    console.error('Erro: ', error)
                    alert(data.mensagem)
                })
        }

    }
</script>