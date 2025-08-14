<div class="card card-info card-outline mb-4">
    <div class="card-header">
        <div class="card-title">Cadastro de Curso</div>
    </div>

    <form class="needs-validation" method="POST" action="<?= URL_BASE ?>curso/adicionar" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-4">
                    <img id="img-form" src="<?= URL_BASE ?>upload/sem-foto.jpg" alt="Foto co curso"
                        style="width: 100%; cursor: pointer;"
                        title="Clique na imagem para selecionar uma foto para o curso.">

                    <!-- foto_curso -->
                    <input type="file" id="foto_curso" name="foto_curso" style="display: none;" accept="image/*" required>
                </div>

                <div class="col-md-8">
                    <div class="row g-3">

                        <!-- nome_curso -->
                        <div class="col-md-12">
                            <input type="text" name="nome_curso" class="form-control" id="nome_curso" required placeholder="Informe o nome do curso:">
                        </div>

                        <!-- nivel_curso -->
                        <div class="col-md-4">
                            <select class="form-select form-control" name="nivel_curso" aria-label="Default select example" required>
                                <option selected>Informe o nível do curso</option>
                                <option value="Livre">Livre</option>
                                <option value="Técnico">Técnico</option>
                                <option value="Tecnólogo">Tecnólogo</option>
                                <option value="Graduação">Graduação</option>
                                <option value="Pós-graduação">Pós-graduação</option>
                            </select>
                        </div>

                        <!-- modalidade_curso -->
                        <div class="col-md-4">
                            <select class="form-select form-control" name="modalidade_curso" aria-label="Default select example" required>
                                <option selected>Informe a modalidade do curso</option>
                                <option value="Presencial">Presencial</option>
                                <option value="Online">Online</option>
                                <option value="Híbrido">Híbrido</option>
                            </select>
                        </div>

                        <!-- area_curso -->
                        <div class="col-md-4">
                            <input type="text" name="area_curso" class="form-control" id="area_curso" required placeholder="Informe a área do curso:">
                        </div>

                        <!-- pre_requisito_curso -->
                        <div class="col-md-6">
                            <input type="text" name="pre_requisito_curso" class="form-control" id="pre_requisito_curso" required placeholder="Informe o pré-requisito para o curso:">
                        </div>

                        <!-- valor_curso -->
                        <div class="col-md-3">
                            <input type="number" name="valor_curso" class="form-control" id="valor_curso" required placeholder="Informe o valor do curso:">
                        </div>

                        <!-- carga_horaria_curso -->
                        <div class="col-md-3">
                            <input type="number" name="carga_horaria_curso" class="form-control" id="carga_horaria_curso" required placeholder="Informe a carga horária do curso:">
                        </div>

                        <!-- descricao_curso -->
                        <div class="col-md-12">
                            <textarea class="form-control" name="descricao_curso" id="descricao_curso" cols="30" rows="5" required></textarea>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer justify-content-md-end">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-primary" type="submit">Cadastro do Curso</button>
            </div>
        </div>
    </form>


    <script>

        document.addEventListener('DOMContentLoaded', function(){

            const visualizarImg     = document.getElementById('img-form')
            const arquivo           = document.getElementById('foto_curso')

            visualizarImg.addEventListener('click', function(){
                //console.log("Teste de click na IMG")
                arquivo.click()
            })

            arquivo.addEventListener('change', function(){

                if(arquivo.files && arquivo.files[0]){

                    let render = new FileReader()

                    render.onload = function(e){
                        visualizarImg.src = e.target.result
                    }
                    
                    render.readAsDataURL(arquivo.files[0])
                }

            })





            
        })

    </script>


</div>