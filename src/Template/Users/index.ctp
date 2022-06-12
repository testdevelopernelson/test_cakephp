<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<h3>Usuarios Registrados</h3>
<div class="float-right mt-5 mb-3">
    <?= $this->Html->link($this->Html->image('plus.svg') .' Nuevo usuario', ['action' => 'add'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
</div>
<div class="float-left mt-5 mb-3">
    <?php echo $this->Form->create('Users', ['class' => 'form-inline my-2 my-lg-0']);?>
        <?php echo $this->Form->control('term', ['class' => 'form-control mr-sm-2', 'placeholder' => 'Buscar...', 'label' => false, 'required' => false]);?>
        <?php echo $this->Form->button('Buscar', ['class' => 'btn btn-primary my-2 my-sm-0']) ?>
        <?php echo $this->Html->link('Limpiar', ['action' => 'index'], ['class' => 'btn btn-outline-dark my-2 my-sm-0 ml-2']) ?>
    <?php echo $this->Form->end();?>
</div>
<div class="users index large-9 medium-8 columns content">
    <table class="table">
        <thead class="thead-table">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col" class="actions">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td scope="row"><?= h($user->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td class="actions">
                    <?= $this->Html->link($this->Html->image('eye.svg'), ['action' => 'view', $user->id], ['escape' => false, 'title' => 'Ver detalle']) ?>
                    <?= $this->Html->link($this->Html->image('edit.svg'), ['action' => 'edit', $user->id], ['escape' => false, 'title' => 'Editar']) ?>
                    <?= $this->Form->postLink($this->Html->image('trash.svg'), ['action' => 'delete', $user->id], ['escape' => false, 'title' => 'Eliminar', 'confirm' => '¿Está seguro de eliminar el usuario ' . $user->name . '?']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
