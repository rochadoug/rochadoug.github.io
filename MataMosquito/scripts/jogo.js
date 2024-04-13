var largura = 0,altura = 0
var vidas = 1
var pontos = 0
var intervalo
var tempo = 30
var timer = 0


function pegarTamJanela() {
    largura = window.innerWidth
    altura = window.innerHeight  
}

var funCronometro = function(){
   var cronometro = setInterval(function(){
        if(tempo == 0){
            clearInterval(cronometro)
            clearInterval(intervalo)
            sessionStorage.setItem('ptkey',pontos)
            window.location.href = './winner.html'
        }
    document.getElementById('crono').innerHTML = tempo
        if(tempo > 0){
            tempo--
        }
    },1000)
}

pegarTamJanela()

function gerenciarVidas(modo){
    var imgsrc = Array('./imagens/coracao_cheio.png','./imagens/coracao_vazio.png')
    
    if(modo == 'init'){
        document.getElementById('v1').src = imgsrc[0]
        document.getElementById('v2').src = imgsrc[0]
        document.getElementById('v3').src = imgsrc[0]
        vidas = 1
        pontos = 0
    } else {
        document.getElementById('v'+vidas).src = imgsrc[1]       
        vidas++
    }
}

function randomizarPosicao(){
    if(document.getElementById('mosquitoId') != null){   
        document.getElementById('mosquitoId').remove()

        if(vidas <=3 ){
            gerenciarVidas(2)
        }else{
            clearInterval(intervalo)
            sessionStorage.setItem('ptkey',pontos)
          window.location.href = './gameover.html'
        }
    }
    var posX = Math.floor(Math.random() * (largura - 90))
    var posY = Math.floor(Math.random() * (altura - 90))
    
    var mTam = Math.floor(Math.random()*3)
    var mSide = Math.floor(Math.random()*2)

    var mosquito = document.createElement("img")
    mosquito.src = './imagens/mosca.png'
    mosquito.className = (mTam == 0 ? 'mosquito1' : mTam == 1 ? 'mosquito2' : 'mosquito3') + ' ' + (mSide == 0 ? 'ladoA' : 'ladoB' )
    mosquito.style.left = posX + 'px'
    mosquito.style.top = posY + 'px'
    mosquito.style.position = 'absolute'
    mosquito.id = 'mosquitoId'
    mosquito.onclick = function(){
        pontos++
        this.remove()     
    }
    document.body.appendChild(mosquito)
}

var criarMosquito = function(){
    if(intervalo){
        clearInterval(intervalo)
    }

    intervalo = setInterval(function(){
        randomizarPosicao()
    },setarNivel())
}

function iniciaJogo(){
    funCronometro()
    criarMosquito()
    gerenciarVidas('init')
    document.getElementById('iniciar').style.visibility = 'hidden'
}

function setarNivel(){
    var strNivel = sessionStorage.getItem('nivel')

    switch(strNivel){
        case 'easy': return 2300
        case 'normal': return 1100
        case 'hard': return 900
        case 'chuck': return 750
    }
    
}