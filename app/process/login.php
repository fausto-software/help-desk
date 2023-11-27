<?php 
    $nombre=MysqlQuery::RequestPost("nombre_login");
    $clave=md5(MysqlQuery::RequestPost("contrasena_login"));
    $radio=MysqlQuery::RequestPost('optionsRadios');
    if($nombre!="" && $clave!="" && $radio!=""){
        if($radio=="admin"){
            $sql=Mysql::consulta("SELECT * FROM administrador WHERE nombre_admin= '$nombre' AND clave='$clave'");
            if(mysqli_num_rows($sql)>=1){
                $reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
                $_SESSION['nombre']=$reg['nombre_admin'];
                $_SESSION['id']=$reg['id_admin'];
                $_SESSION['nombre_completo']=$reg['nombre_completo'];
                $_SESSION['email']=$reg['email_admin'];
                $_SESSION['clave']=$clave;
                $_SESSION['tipo']="admin";
            }else{
               echo '
                    <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="text-center">OCORREU UM ERRO!</h4>
                        <p class="text-center">
                            Nome de usuário ou senha incorreta
                        </p>
                    </div>
                '; 
            }
        }elseif($radio=="user"){
            $sql=Mysql::consulta("SELECT * FROM cliente WHERE nombre_usuario= '$nombre' AND clave='$clave'");
            if(mysqli_num_rows($sql)>=1){
                $reg=mysqli_fetch_array($sql, MYSQLI_ASSOC);
                $_SESSION['nombre']=$reg['nombre_usuario'];
                $_SESSION['nombre_completo']=$reg['nombre_completo'];
                $_SESSION['email']=$reg['email_cliente'];
                $_SESSION['clave']=$clave;
                $_SESSION['tipo']="user";
            }else{
                echo '
                    <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="text-center">OCORREU UM ERRO!</h4>
                        <p class="text-center">
                            Nome de usuário ou senha incorreta
                        </p>
                    </div>
                '; 
            }
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="text-center">OCORREU UM ERRO!</h4>
                    <p class="text-center">
                        Você não selecionou um usuário válido
                    </p>
                </div>
            ';
        }
    }else{
        echo '
            <div class="alert alert-danger alert-dismissible fade in col-sm-3 animated bounceInDown" role="alert" style="position:fixed; top:70px; right:10px; z-index:10;"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="text-center">OCORREU UM ERRO!</h4>
                <p class="text-center">
                    Você não pode deixar nenhum campo vazio
                </p>
            </div>
        ';
    }