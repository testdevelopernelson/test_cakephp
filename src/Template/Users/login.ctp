<div class="container">
    <div class="row form-login">
        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <?php echo $this->Flash->render('auth'); ?>
            <?php echo $this->Form->create();?>
                <fieldset>
                    <h2>Iniciar Sesión</h2>
                    <hr class="colorgraph">
                    <div class="form-group">
                        <?php echo $this->Form->control('email', ['class' => 'form-control input-lg', 'type' => 'text', 'label' => 'Correo Electrónico', 'div' => false]);?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->control('password', ['class' => 'form-control input-lg', 'type' => 'password', 'label' => 'Contraseña', 'div' => false]);?>
                    </div>
                    <span class="button-checkbox">
                        <a href="" class="btn btn-link pull-right">¿Olvidó su contraseña?</a>
                    </span>
                    <hr class="colorgraph">
                    <div class="row button-login">
                        <div class="col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
                            <?php echo $this->Form->button('Ingresar', ['class' => 'btn btn-lg btn-success btn-block']);?>
                        </div>
                    </div>
                </fieldset>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>