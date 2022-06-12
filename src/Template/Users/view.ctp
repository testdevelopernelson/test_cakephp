<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
    <h2 class="text-center">Información del usuario</h2>
	<div class="row justify-content-center">
    
		<div class="col-12 col-md-8 col-lg-8 pb-5">
            <?= $this->Html->link('<i class="fa fa-arrow-left"></i>' .' Regresar', ['action' => 'index'], ['class' => 'btn btn-secondary mb-2', 'escape' => false]) ?>
                <div class="card rounded-10">
                    <div class="card-header p-0">
                        <div class="bg-info text-white text-center py-2">
                            <h3><i class="fa fa-user"></i> Usuario</h3>
                        </div>
                    </div>
                    <div class="card-body p-3 view">
                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-info"></i></div>                                    
                                    <h4 for=""><?php echo $user['name'];?></h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                    <h4 for=""><?php echo $user['email'];?></h4>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($user['mobile'])):?>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-mobile text-info"></i></div>
                                        <h4 for=""><?php echo $user['mobile'];?></h4>
                                    </div>
                                </div>
                            </div>
                        <?php endif;?>
                        <?php if(!empty($user['city'])):?>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-building text-info"></i></div>
                                    <h4 for=""><?php echo $user['city'];?></h4>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user-check text-info"></i></div>
                                    <h4 for=""><?php echo $user['role'] == 'admin' ? 'Admin' : 'Visitante' ;?></h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            <!--Form with header-->
        </div>
	</div>
</div>
