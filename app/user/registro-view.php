<?php
    if(isset($_POST['user_reg']) && isset($_POST['clave_reg']) && isset($_POST['nom_complete_reg'])){
        $nombre_reg=MysqlQuery::RequestPost('nom_complete_reg');
        $user_reg=MysqlQuery::RequestPost('user_reg');
        $clave_reg=md5(MysqlQuery::RequestPost('clave_reg'));
        $clave_reg2=MysqlQuery::RequestPost('clave_reg');
        $email_reg=MysqlQuery::RequestPost('email_reg');

        $asunto="Cadastro de conta";
        $cabecera="De: Help Desk Service<helpdesk@service.com>";
        $mensaje_mail="Olá".$nombre_reg.", Obrigado por se registrar na LinuxStore El Salvador. Os dados da conta são os seguintes:\nNome Completo: ".$nombre_reg."\nNome de usuario: ".$user_reg."\nDica: ".$clave_reg2."\nEmail: ".$email_reg."\n Página principal: http://www.linuxstore.com/index.php";

        
        if(MysqlQuery::Guardar("cliente", "nombre_completo, nombre_usuario, email_cliente, clave", "'$nombre_reg', '$user_reg', '$email_reg', '$clave_reg'")){

            /*----------  Enviar correo con los datos de la cuenta 
                mail($email_reg, $asunto, $mensaje_mail, $cabecera);
            ----------*/

            echo '
                <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">INSCRIÇÃO FEITO COM SUCESSO</h4>
                    <p class="text-center">
                      Conta criada com sucesso, agora você pode logar, você já é um usuário!
                    </p>
                </div>
            ';
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCORREU UM ERRO!</h4>
                    <p class="text-center">
                      ERRO DE REGISTO: Por favor, tente novamente.
                    </p>
                </div>
            '; 
        }
    }
?>
<div class="container">
  <div class="row">
    <div class="col-sm-8">
      <div class="panel panel-success">
        <div class="panel-heading text-center"><strong>Para se inscrever você deve preencher todos os campos deste formulário</strong></div>
        <div class="panel-body">
            <form role="form" action="" method="POST">
            <div class="form-group">
              <label><i class="fa fa-male"></i>&nbsp;Nome completo</label>
              <input type="text" class="form-control" name="nom_complete_reg" placeholder="Nome completo" required="" pattern="[a-zA-Z ]{1,40}" title="Nombre Apellido" maxlength="40">
            </div>
            <div class="form-group has-success has-feedback">
              <label class="control-label"><i class="fa fa-user"></i>&nbsp;Nome de usuario</label>
              <input type="text" id="input_user" class="form-control" name="user_reg" placeholder="Nome de usuario" required="" pattern="[a-zA-Z0-9]{1,15}" title="Ejemplo7 maximo 15 caracteres" maxlength="20">
              <div id="com_form"></div>
            </div>
            <div class="form-group">
              <label><i class="fa fa-key"></i>&nbsp;Senha</label>
              <input type="password" class="form-control" name="clave_reg" placeholder="Senha" required="">
            </div>
            <div class="form-group">
              <label><i class="fa fa-envelope"></i>&nbsp;Email</label>
              <input type="email" class="form-control"  name="email_reg"  placeholder="Email" required="">
            </div>
            <button type="submit" class="btn btn-danger">Criar uma conta</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-sm-4 text-center hidden-xs">
      <img src="img/linux.png" class="img-responsive" alt="Image">
      <h2 class="text-primary">Obrigado! por nos preferir</h2>
    </div>

  </div>
</div>

<script>
    $(document).ready(function(){
        $("#input_user").keyup(function(){
            $.ajax({
                url:"./process/val.php?id="+$(this).val(),
                success:function(data){
                    $("#com_form").html(data);
                }
            });
        });
    });
</script>