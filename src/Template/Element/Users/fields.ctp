<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user text-info"></i></div>                                    
            <?php echo $this->Form->control('name', ['class' => 'form-control', 'placeholder' => 'Nombre y Apellido*', 'label' => false, 'required' => false]);?>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
            <?php echo $this->Form->control('email', ['class' => 'form-control', 'placeholder' => 'Correo electrónico*', 'label' => false, 'required' => false, 'autocomplete' => 'off']);?>
        </div>
        
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-mobile text-info"></i></div>
            <?php echo $this->Form->control('mobile', ['class' => 'form-control', 'placeholder' => 'Celular', 'label' => false, 'required' => false]);?>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-building text-info"></i></div>
            <?php echo $this->Form->control('city', ['class' => 'form-control', 'placeholder' => 'Ciudad', 'label' => false, 'required' => false]);?>
        </div>
    </div>
</div>

<div class="form-group">
    <div class="input-group mb-2">
        <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-user-check text-info"></i></div>
            <?php echo $this->Form->control('role', ['type' => 'select', 'options' => ['admin' => 'Admin', 'visitor' => 'Visita'],'class' => 'form-control', 'placeholder' => 'Ciudad', 'label' => false, 'required' => false]);?>
        </div>
    </div>
</div>