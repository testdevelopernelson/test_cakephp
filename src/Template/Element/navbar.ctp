
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <?php echo $this->Html->link('Inicio', ['controller' => 'Pages', 'action' => 'home'], ['class' => 'navbar-brand']);?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <?php echo $this->Html->link('Usuarios', ['controller' => 'Users', 'action' => 'index'], ['escape' => true, 'class' => 'nav-link current']);?>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <?php echo $this->Html->link($this->Html->image('log-out.svg') . ' Salir', ['controller' => 'Users', 'action' => 'logout'],['class' => 'btn btn-light my-2 my-sm-0', 'escape' => false]);?>
    </form>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <?php echo $this->Html->link('<i class="fa fa-user"></i> Perfil', ['controller' => 'Users', 'action' => 'profile'], ['escape' => false, 'class' => 'nav-link current']);?>
      </li>
    </ul>
  </div>
  </div>
</nav>