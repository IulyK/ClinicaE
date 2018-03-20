



<?php require_once '../cabecalho.php'; ?>
<?php require_once '../model/Pessoa.php ' ?>
<?php require_once '../Conexao.php'; ?>
<script>
 
 function verifica() {
   var nome = form.nome.value;
   var cpf = form.cpf.value;
   var telefone = form.telefone.value;
   var email = form.email.value;
   var endereco = form.endereco.value;
   var senha = form.senha.value;
   var confirmaSenha = form.confirmaSenha.value;
   if (nome == "") {
     alert('Preencha o campo com o Nome');
     form.nome.focus();
     return false;
   }
   if (cpf == "") {
     alert('Preencha o campo com o CPF');
     form.cpf.focus();
     return false;
   }

   if (email == "") {
     alert('Preencha o campo com o Email');
     form.email.focus();
     return false;
   }

   if (endereco == "") {
     alert('Preencha o campo com o Endereco');
     form.endereco.focus();
     return false;
   }

   if (telefone == "") {
     alert('Preencha o campo com  Telefone');
     form.telefone.focus();
     return false;
   }

   if (senha == "") {
     alert('Preencha o campo com Senha');
     form.senha.focus();
     return false;
   }

   if (confirmaSenha == "") {
     alert('Preencha o campo com Confirma Senha');
     form.confirmaSenha.focus();
     return false;
   }

   if (senha != confirmaSenha) {
     alert("Repita a senha corretamente");
     form.confirmaSenha.focus();
     return false;
   }
   return true;
 }

 function check() {
   if (verifica()) {
     document.form.submit;
   }
 }
 function Apenas_Numeros(caracter) {
   var nTecla = 0;
   if (document.all) {
     nTecla = caracter.keyCode;
   } else {
     nTecla = caracter.which;
   }
   if ((nTecla > 47 && nTecla < 58)
           || nTecla == 8 || nTecla == 127
           || nTecla == 0 || nTecla == 9  // 0 == Tab
           || nTecla == 13) { // 13 == Enter
     return true;
   } else {
     return false;
   }
 }
 function validaCPF(cpf)
 {
   erro = new String;
   if (cpf.value.length == 11)
   {
     cpf.value = cpf.value.replace('.', '');
     cpf.value = cpf.value.replace('.', '');
     cpf.value = cpf.value.replace('-', '');
     var nonNumbers = /\D/;
     if (nonNumbers.test(cpf.value))
     {
       erro = "A verificacao de CPF suporta apenas números!";
     } else
     {
       if (cpf.value == "00000000000" ||
               cpf.value == "11111111111" ||
               cpf.value == "22222222222" ||
               cpf.value == "33333333333" ||
               cpf.value == "44444444444" ||
               cpf.value == "55555555555" ||
               cpf.value == "66666666666" ||
               cpf.value == "77777777777" ||
               cpf.value == "88888888888" ||
               cpf.value == "99999999999") {

         erro = "Número de CPF inválido!"
       }

       var a = [];
       var b = new Number;
       var c = 11;
       for (i = 0; i < 11; i++) {
         a[i] = cpf.value.charAt(i);
         if (i < 9)
           b += (a[i] * --c);
       }

       if ((x = b % 11) < 2) {
         a[9] = 0
       } else {
         a[9] = 11 - x
       }
       b = 0;
       c = 11;
       for (y = 0; y < 10; y++)
         b += (a[y] * c--);
       if ((x = b % 11) < 2) {
         a[10] = 0;
       } else {
         a[10] = 11 - x;
       }

       if ((cpf.value.charAt(9) != a[9]) || (cpf.value.charAt(10) != a[10])) {
         erro = "Número de CPF inválido.";
       }
     }
   } else
   {
     if (cpf.value.length == 0)
       return false
     else
       erro = "Número de CPF inválido.";
   }
   if (erro.length > 0) {
     alert(erro);
     cpf.focus();
     return false;
   }
   return true;
 }
 //envento onkeyup
 function maskCPF(cpf) {
   var evt = window.event;
   kcode = evt.keyCode;
   if (kcode == 8)
     return;
   if (cpf.value.length == 3) {
     cpf.value = cpf.value + '.';
   }
   if (cpf.value.length == 7) {
     cpf.value = cpf.value + '.';
   }
   if (cpf.value.length == 11) {
     cpf.value = cpf.value + '-';
   }
 }
 
 function checarEmail() {
   if (document.forms[0].email.value == ""
           || document.forms[0].email.value.indexOf('@') == -1
           || document.forms[0].email.value.indexOf('.') == -1)
   {
     alert("Por favor, informe um E-MAIL válido!");
     return false;
   }
 }
 

</script>
<div class="col-md-8" >
  <h1 class="page-header">Cadastrar-se</h1>
  <form role="form" method="post" action="gravarPessoa.php" onSubmit="return (verifica())"   >

    <div class="form-group" >
      <label for="nome" class="control-label" >
        Nome
      </label>
      <input required="" name="nome" type="text" class="form-control" id="nome" placeholder="Informe o Nome">
    </div>

    <div class="form-group">
      <label for="endereco" class="control-label">
        Endereço
      </label>
      <input required="" name="endereco" type="text" class="form-control" id="endereco" placeholder="Infome o Endereço">
    </div>

    <div class="form-group">
      <label for="telefone" class="control-label">
        Telefone
      </label>
      <input required="" name="telefone" type="tel" class="form-control" id="telefone" pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"   placeholder="(DDD) 0000-0000">
    </div>

    <div class="form-group">
      <label for="cpf" class="control-label">
        CPF
      </label>
      <input required="" name="cpf" type="text"  class="form-control" id="cpf"  onblur="validaCPF(this);" onKeyPress="return Apenas_Numeros(event);"  placeholder="Informe o CPF">
    </div>

    <div class="form-group">
      <label for="email" class="control-label">
        E-mail
      </label>
      <input required="" name="email" type="email" class="form-control" id="email" onblur="checarEmail();"placeholder="Informe o E-mail">
    </div>

    <div class="form-group">
      <label for="Senha" class="control-label">
        Senha
      </label>
      <input required="" name="senha" type="password" class="form-control" id="senha"placeholder="Informe a Senha">
    </div>
    <div class="form-group">
      <label for="confirmaSenha"  class="control-label">
        Confirma Senha
      </label>
      <input required="" name="confirmaSenha" type="password" class="form-control" id="confirmaSenha" placeholder="Confirme sua Senha">
    </div>

    <button type="submit" class="btn btn-primary" onclick="check();" >Enviar</button>
    <a href="/ClinicaE/index.php"   class="btn btn-default" >Cancelar</a>
  </form>


</div>
<?php require_once '../rodape.php';
?>

