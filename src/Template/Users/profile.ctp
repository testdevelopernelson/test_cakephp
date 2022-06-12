<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <h2 class="text-center">Mi perfil</h2>
	<div class="row justify-content-center">
    
		<div class="col-12 col-md-8 col-lg-8 pb-5">
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i>' .' Regresar', ['action' => 'index'], ['class' => 'btn btn-secondary mb-2', 'escape' => false]) ?>
            <?php echo $this->Form->create($user);?>
                <div class="card rounded-10">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2">
                            <h3><i class="fa fa-user"></i> Usuario</h3>
                            <p class="m-0">Los campos marcados con * son requeridos</p>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!--Body-->
                        <?php echo $this->element('Users/fields');?>

                        <div class="text-center">
                            <?php echo $this->Form->button('Guardar', ['class' => 'btn btn-info btn-block rounded-0 py-2']) ?>
                            <?php echo $this->Html->link('Cambiar contraseña',['controller' => 'Users', 'action' => 'forgot_password'], ['class' => 'btn btn-warning btn-block rounded-0 py-2']) ?>
                        </div>
                    </div>

                </div>
            <?php echo $this->Form->end();?>
        </div>
	</div>
</div>
