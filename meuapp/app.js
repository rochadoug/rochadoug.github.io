
function calculoProva() {
    let brinde = ['caneta','chaveiro','garrafa','camisa','livro','mochila']
    let cliente = Array();

    for (let index = 0, premio =0; index < 1000; index++,premio++) {
        
        if(premio > 5)
            premio = 0;
        cliente[index] = brinde[premio];
    }
}

function voltar(){
    location.href = '/'
}

function excluir(id = ''){
    
    location.href = 'perguntas.php?perg=remover&id='+id
   
}