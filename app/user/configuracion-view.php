<?php if(!$_SESSION['nombre']==""&&!$_SESSION['tipo']==""){ 
        
        /*Script para eliminar cuenta*/
        if(isset($_POST['usuario_delete']) && isset($_POST['clave_delete'])){
          $usuario_delete=MysqlQuery::RequestPost('usuario_delete');
          $clave_delete=md5(MysqlQuery::RequestPost('clave_delete'));
         
          $sql=Mysql::consulta("SELECT * FROM cliente WHERE nombre_usuario= '$usuario_delete' AND clave='$clave_delete'");

          if(mysqli_num_rows($sql)>=1){
             MysqlQuery::Eliminar("cliente", "nombre_usuario='$usuario_delete' and clave='$clave_delete'");
             echo '<script type="text/javascript"> window.location="eliminar.php"; </script>';
          }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">Ocorreu um erro</h4>
                    <p class="text-center">
                        Nao podes eliminar porque os dados sao incorrectos!
                    </p>
                </div>
            '; 
          }
        }
         
         
        /*Script para actualizar datos de cuenta*/
        if(isset($_POST['name_complete_update']) && isset($_POST['old_user_update']) && isset($_POST['new_user_update']) && isset($_POST['old_pass_update']) && isset($_POST['new_pass_update'])){

          $nombre_complete_update=MysqlQuery::RequestPost('name_complete_update');
          $old_user_update=MysqlQuery::RequestPost('old_user_update');
          $new_user_update=MysqlQuery::RequestPost('new_user_update');
          $old_pass_update=md5(MysqlQuery::RequestPost('old_pass_update'));
          $new_pass_update=md5(MysqlQuery::RequestPost('new_pass_update'));
          $email_update=MysqlQuery::RequestPost('email_update');
          
           $sql=Mysql::consulta("SELECT * FROM cliente WHERE nombre_usuario= '$old_user_update' AND clave='$old_pass_update'");
           
          if(mysqli_num_rows($sql)>=1){
            MysqlQuery::Actualizar("cliente", "nombre_completo='$nombre_complete_update', nombre_usuario='$new_user_update', email_cliente='$email_update', clave='$new_pass_update'", "nombre_usuario='$old_user_update' and clave='$old_pass_update'");

            $_SESSION['nombre']=$new_user_update;
            $_SESSION['clave']=$new_pass_update;

            echo '
              <div class="alert alert-info alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="text-center">CONTA ATUALIZADA</h4>
                  <p class="text-center">
                    Os seu dados foram actualizados com sucesso!
                  </p>
              </div>
            ';
          }else{
            echo '
              <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4 class="text-center">Ocorreu um erro!</h4>
                  <p class="text-center">
                    os dados introduzidos sao invalidos. Por favor tenta novamente!</p>
                  </p>
              </div>
            '; 
          }
        }
        ?>
        <div class="container">
          <div class="row well">
            <div class="col-sm-3">
              <img src="img/settings.png" alt="Image" class="img-responsive">
            </div>
            <div class="col-sm-9 lead">
              <h2 class="text-info">Bem-vindo à configuração da conta</h2>
              <p>Pode <strong>atualizar os dados</strong> da sua conta ou você pode <strong>Deletar sua conta</strong> permanentemente se você não deseja mais ser um usuário</p>
            </div>
          </div><!--Fin row well-->
          
          <div class="row">
            <div class="col-sm-8">
              <div class="panel panel-info">
                <div class="panel-heading text-center"><i class="fa fa-retweet"></i>&nbsp;&nbsp;<strong>Actualizar dados de conta</strong></div>
                <div class="panel-body">
                    <form action="" method="post" role="form">
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-male"></i>&nbsp;&nbsp;Nome completo</label>
                      <input type="text" class="form-control" placeholder="Nome completo" name="name_complete_update" required="" pattern="[a-zA-Z ]{1,40}" title="Nombre Apellido" maxlength="40">
                    </div>
                    <div class="form-group">
                      <label class="text-danger"><i class="fa fa-user"></i>&nbsp;&nbsp;Nome de usuario actual</label>
                      <input type="text" class="form-control" placeholder="Nome de usuario actual" name="old_user_update" required="" pattern="[a-zA-Z0-9 ]{1,30}" title="Ejemplo7" maxlength="20">
                    </div>
                    <div class="form-group  has-success has-feedback">
                      <label class="text-primary"><i class="fa fa-user"></i>&nbsp;&nbsp;Nome de usuario novo</label>
                      <input type="text" class="form-control" id="input_user" placeholder="Nome de usuario novo" name="new_user_update" required="" pattern="[a-zA-Z0-9 ]{1,30}" title="Ejemplo7" maxlength="20">
                      <div id="com_form"></div>
                    </div>
                    <div class="form-group">
                      <label class="text-danger"><i class="fa fa-key"></i>&nbsp;&nbsp;Senha atual</label>
                      <input type="password" class="form-control" placeholder="Senha atual" name="old_pass_update" required="">
                    </div>
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-unlock-alt"></i>&nbsp;&nbsp;Nova Senha</label>
                      <input type="password" class="form-control" placeholder="Nova Senha" name="new_pass_update" required="">
                    </div>
                    <div class="form-group">
                      <label class="text-primary"><i class="fa fa-envelope-o"></i>&nbsp;&nbsp;Email</label>
                      <input type="email" class="form-control"  placeholder="Digite o seu email" name="email_update" required="">
                    </div>
                    <button type="submit" class="btn btn-info">Actualizar dados</button>
                  </form>
                </div>
              </div>
            </div><!--Fin col 8-->
            <div class="col-sm-4 text-center well">
              <br><br><br><br><br><br><br><br>
              <img src="img/delete_user.png" alt="Image"><br><br><br>
              <button class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar conta</button>
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                      <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title text-center text-danger" id="myModalLabel">Deseja excluir sua conta?</h4>
                    </div>
                    <form action="" method="post" role="form" style="padding:20px;">
                      <p class="text-warning">Se você tem certeza de que deseja excluir sua conta, digite seu nome de usuário e senha</p>
                      <div class="input-group input-group-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" class="form-control" name="usuario_delete" placeholder="Nome de usuario" required="">
                      </div><br>
                      <div class="input-group input-group-sm">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" class="form-control" name="clave_delete" placeholder="Senha" required="">
                      </div><br>
                      
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar conta</button>
                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <br><br><br><br><br><br><br>
            </div>
          </div>
        </div>
<?php
}else{
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <img src="img/Stop.png" alt="Image" class="img-responsive animated slideInDown"/><br>
                <img src="img/SadTux.png" alt="Image" class="img-responsive"/>
                
            </div>
            <div class="col-sm-7 animated flip">
                <h1 class="text-danger">Desculpe, esta página é apenas para usuários registados</h1>
                <h3 class="text-info text-center">Faça login para obter acesso</h3>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
    </div>
<?php
}
?>
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