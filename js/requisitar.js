var $equip        = $(".equip"),
    $altequip     = $(".altequip"),
    $hora         = $(".hora"),
    $althorai     = $(".althorai"),
    $althoraf     = $(".althoraf"),
    $sala         = $(".sala"),
    $altsala      = $(".altsala"),
    $finish       = $(".finish"),
    $voltar       = $(".voltar"),
    $ir           = $(".ir"),
    $select       = $(".select"),
    $texto        = $("#opcao"),
    $getout       = $(".getout"),
    $equiptf      = false,
    $horatf       = false,
    $salatf       = false,
    $finishtf     = false,
    $valh1        = false,
    $valh2        = false,
    $clicou       = false,
    $countButton  = 1,
    $geti,
    $arrayi,
    $tam,
    $equipamento,
    $horai,
    $horaf,
    i,
    $salas;

$getout.click(function(e){
  e.preventDefault();
});

function validar()
{
  switch($countButton){
    case 1:
      $equipamento = ($('#Equipamentos :selected').text());
      $equiptf = true;
      break;
    case 2:
      if($valh1 && $valh2){
        $horatf  = true;
      }
      break;
    case 3:
      $salas = ($('#salas').val());
      $salatf  = true;
      $finishtf = true;
      break;
  }
}


function valH1(){
  //Fazer uma array com os valores do select e comparar se eles sao maiores ou menores que o valor selecionado
  $horai = ($('#Horai :selected').text());
  $valh1 = true;
  $geti = $('#Horaf').text();
  console.log($('#Horaf option').val());
  $geti = $geti.trim();
  $geti = $geti.replace(/ /g, "");
  $arrayi = $geti.split("\n");
  console.log($arrayi);
  $tam = $arrayi.length;
  for (i = 0; i < $tam; i++) {
    if($horai >= $arrayi[i]){
      console.log($('#Horaf option:nth-child('+(i+2)+')').text());
      $('#Horaf option:nth-child('+(i+2)+')').prop("disabled", true).trigger("chosen:updated");
    }
  }
  validar();
}

function valH2(){
  $horaf = ($('#Horaf :selected').text());
  $valh2 = true;
  validar();
}


$('body').on('click', function(){
  if($equiptf && $countButton == 1){
    $(".alert1").addClass("none");
  } else if ($equiptf == false && $countButton == 1){
    $(".alert1").removeClass("none");
    $texto.text('um Equipamento!');
  }
  if($horatf && $countButton == 2){
    $(".alert2").addClass("none");
  } else if ($horatf == false && $countButton == 2){
    $(".alert2").removeClass("none");
    if($valh1 == false && $valh2 == false){
      $texto.text('os dois Horários!');
    } else {
      $texto.text('o outro Horário!');
    }
  }
  if($salatf && $countButton == 3){
    $(".alert3").addClass("none");
  } else if ($salatf == false && $countButton == 3){
    $(".alert3").removeClass("none");
    $texto.text('uma Sala!');
  }
  if($finishtf && $countButton == 4){
    $('input[type=text]#equip').val($equipamento);
    $('input[type=text]#horai').val($horai);
    $('input[type=text]#horaf').val($horaf);
    $('input[type=text]#sala').val($salas);
  }
});


$voltar.click(function(e){
  $(".voltar").prop("disabled", true);
  if($countButton <= 1){
    $countButton = 1;
  } else {
    $countButton--;
    botao($voltar);
  }
  e.preventDefault();
});

$ir.click(function(e){
  $clicou = true;
  if($equiptf && $countButton == 1 && $clicou){
    ir();
    $clicou = false;
  }
  if($horatf && $countButton == 2 && $clicou){
    ir();
    $clicou = false;
  }
  if($salatf && $countButton == 3 && $clicou){
    ir();
    $clicou = false;
  }
  e.preventDefault();
});

function ir(){
  $(".ir").prop("disabled", true);
  if($countButton == 4){
    $countButton = 4;
  } else {
    $countButton++;
    botao($ir);
  }
}

function mudar($botao){
  if($botao == $ir){
    setTimeout(function(){
      $(".ir > .icone").addClass("none");
      $(".ir > .nome").text("Salvando...");
    },100);
  }
  if($botao == $voltar){
    setTimeout(function(){
      $(".voltar > .icone").addClass("none");
      $(".voltar > .nome").text("Voltando...");
    },100);
  }
}

function desmudar($botao){
  if($botao == $ir){
    $(".ir > .icone").removeClass("none");
    $(".ir > .nome").text("Próximo");
    $(".ir").prop("disabled", false);
  }
  if($botao == $voltar){
    $(".voltar > .icone").removeClass("none");
    $(".voltar > .nome").text("Anterior");
    $(".voltar").prop("disabled", false);
  }
}

function botao($botao){
  switch($countButton){
    case 1:
      mudar($botao);
      setTimeout(function(){
        equip();
        desmudar($botao);
      }, 600);
      break;

    case 2:
      $equiptf = true;
      mudar($botao);
      setTimeout(function(){
        hora();
        desmudar($botao);
      }, 600);
      break;
      
    case 3:
      $equiptf = true;
      $horatf  = true;
      mudar($botao);
      setTimeout(function(){
        sala();
        desmudar($botao);
      }, 600);
      break;

    case 4:
      $equiptf = true;
      $horatf  = true;
      $salatf  = true;
      mudar($botao);
      setTimeout(function(){
        finish();
        desmudar($botao);
      }, 600);
      break;
  }
};

function verif(){
  if($equiptf){
    $(".parte1").addClass("risco");
  }
  if($horatf){
    $(".parte2").addClass("risco");
  }
  if($salatf){
    $(".parte3").addClass("risco");
  }
  if($finishtf){
    $(".parte4").addClass("risco");
  }
}

function equip(){
  switch($countButton){
    case 2:
      $countButton--;
      break;

    case 3:
      $countButton -= 2;
      break;

    case 4:
      $countButton -= 3;
      break;
  }
    $(".string").addClass("desativado");
    verif();
    $(".Slide-Container").addClass("none");
    $(".parte1, .slide1").removeClass("none risco desativado desativar");
    $(".ponto1").addClass("ativo");
}

function hora(){
  if($equiptf){
    switch($countButton){
      case 1:
        $countButton++;
        break;

      case 3:
        $countButton--;
        break;

      case 4:
        $countButton -= 2;
        break;
    }
  }
  $(".string").addClass("desativado");
  verif();
  $(".Slide-Container").addClass("none");
  $(".parte2, .ponto2, .linha1, .slide2").removeClass("none risco desativado desativar");
  $(".ponto2").addClass("ativo");
  $(".pontinho2").addClass("ativinho");
}

function sala(){
  if($horatf){
    switch($countButton){
      case 1:
        $countButton += 2;
        break;

      case 2:
        $countButton++;
        break;

      case 4:
        $countButton--;
        break;
    }
  }
  $(".string").addClass("desativado");
  verif();
  $(".Slide-Container").addClass("none");
  $(".linha1, .linha2, .slide3").removeClass("none");
  $(".parte3, .ponto3").removeClass("risco desativado desativar");
  $(".ponto3").addClass("ativo");
  $(".pontinho3").addClass("ativinho");
}

function finish(){
  if($salatf){
    switch($countButton){
      case 1:
        $countButton += 3;
        break;

      case 2:
        $countButton += 2;
        break;

      case 3:
        $countButton++;
        break;
    }
  }
  $(".string").addClass("desativado");
  verif();
  $(".Slide-Container").addClass("none");
  $(".linha-ativo, .slide4").removeClass("none");
  $(".parte4, .ponto4").removeClass("risco desativado desativar");
  $(".ponto4").addClass("ativo");
  $(".pontinho4").addClass("ativinho");
}

$equip.click(function(){
  equip();
});

$hora.click(function(){
  if($equiptf){
    hora();
  }
});

$sala.click(function(){
  if($horatf){
    sala();
  }
});

$finish.click(function(){
  if($salatf){
    finish();
  }
});

function abrirModal(){
  $(".modal").addClass("invalido");
}

$altequip.click(function(){
  equip();
});

$althorai.click(function(){
  hora();
});

$althoraf.click(function(){
  hora();
});

$altsala.click(function(){
  sala();
});