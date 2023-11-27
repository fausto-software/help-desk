<div class="container">
  <div class="row well">
    <div class="col-sm-3">
      <img src="img/tux_repair.png" class="img-responsive" alt="Image">
    </div>
    <div class="col-sm-9 lead">
      <h2 class="text-info">Bem-vindo ao centro de suporte</h2>
      <p>É muito fácil de usar, se você tiver problemas com algum de nossos produtos, pode nos enviar um novo ticket, responderemos e resolveremos seu problema.<br>Se você já nos enviou um ticket, você pode verificar o status dele através do seu <strong>Ticket ID</strong>.</p>
    </div>
  </div><!--fin row 1-->

  <div class="row">
    <div class="col-sm-6">
      <div class="panel panel-info">
        <div class="panel-heading text-center"><i class="fa fa-file-text"></i>&nbsp;<strong>Novo Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/new_ticket.png" alt="">
          <h4>Abra um novo ticket</h4>
          <p class="text-justify">Se você tiver algum problema com alguns dos nossos produtos, denuncie criando um novo ticket e nós o ajudaremos a resolvê-lo. Se você deseja atualizar uma solicitação já realizada, use o formulário à direita <em>Verifique o status do ticked</em>, apenas os <strong>usuarios registados</strong> você pode abrir um novo ticket.</p>
          <p>Para abrir um novo <strong>ticket</strong> clique no seguinte botão</p>
          <a type="button" class="btn btn-info" href="./index.php?view=ticket">Novo Ticket</a>
        </div>
      </div>
    </div><!--fin col-md-6-->
    
    <div class="col-sm-6">
      <div class="panel panel-danger">
        <div class="panel-heading text-center"><i class="fa fa-link"></i>&nbsp;<strong>Verifique o status do Ticket</strong></div>
        <div class="panel-body text-center">
          <img src="./img/old_ticket.png" alt="">
          <h4>Consultar o estado de ticket</h4>
          <form class="form-horizontal" role="form" method="GET" action="./index.php">
            <input type="hidden" name="view" value="ticketcon">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" class="form-control" name="email_consul" placeholder="Email" required="">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-2 control-label">ID Ticket</label>
              <div class="col-sm-10">
                  <input type="text" class="form-control" name="id_consul" placeholder="ID Ticket" required="">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Consultar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div><!--fin col-md-6-->
  </div><!--fin row 2-->
</div><!--fin container-->