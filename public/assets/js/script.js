const cepInput = document.getElementById('cep');

if (cepInput) {
    cepInput.addEventListener('blur', function () {
        let cep = this.value.replace(/\D/g, '');

        if (!/^\d{8}$/.test(cep)) {
            return;
        }

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro ao buscar CEP');
                }
                return response.json();
            })
            .then(data => {
                if (data.erro) {
                    alert('CEP não encontrado.');
                    return;
                }

                let logradouro = data.logradouro;
                let bairro = data.bairro;
                let cidade = data.localidade;
                let uf = data.uf;

                //alert(logradouro);

                document.getElementById('endereco').value = `${logradouro} - ${bairro}, ${cidade}/${uf}`;
            })
            .catch(error => {
                alert('Erro ao buscar o endereço.');
                console.error(error);
            });
    });
}

//Função para fazer o texto do data-tts ser falado
function speak(text){
    if ('speechSynthesis' in window){
        const utterance = new SpeechSynthesisUtterance(text);
        utterance.lang = 'pt-BR';
        window.speechSynthesis.cancel();//parar a fala anterior
        window.speechSynthesis.speak(utterance);
    }
}

//Seleciona todos os elementos da tela para leitura
document.querySelectorAll('[data-tts]').forEach(el => {
    const texto = el.getAttribute('data-tts');

    //Falar ao clicar
    el.addEventListener('click', function(){
        speak(texto);
    });

    //Falar ao focar
    el.addEventListener('focus', function(){
        speak(texto);
    });
});

//Link de redefinição de senha
function enviarEmail(event){
    event.preventDefault();
    const msg = document.getElementById('mensagem');
    msg.style.display = "block";

    //Desativar o input e o button
    document.getElementById('email').disabled = true;
    event.target.querySelector("button").disabled = true;

    //Após 5 segundos redirecionar para a index
    setTimeout(() => {
        window.location.href = "index.php";
    },5000);
}


let pixel = 0.5; //medida em pixel que vai aumentar ou diminiur a fonte
function aumentarFonte(){
    const elementos = document.querySelectorAll('body, body *'); 

    elementos.forEach(el => {
        const estilo = window.getComputedStyle(el);
        const tamanho = parseFloat(estilo.fontSize);

        if (!isNaN(tamanho)){
            el.style.fontSize = (tamanho + pixel) + "px";
        }
    });
}
function diminuirFonte(){
    const elementos = document.querySelectorAll('body, body *'); 

    elementos.forEach(el => {
        const estilo = window.getComputedStyle(el);
        const tamanho = parseFloat(estilo.fontSize);

        if (!isNaN(tamanho)){
            el.style.fontSize = (tamanho - pixel) + "px";
        }
    });
}