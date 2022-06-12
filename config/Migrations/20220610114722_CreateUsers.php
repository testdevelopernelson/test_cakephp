<?php

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table= $this->table('users');
        $table->addColumn('name', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('email', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('mobile', 'string', [
            'default' => null,
            'limit' => 20,
            'null' => false
        ]);
        $table->addColumn('city', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('role', 'string', [
            'default' => 'admin',
            'limit' => 7,
            'null' => false
        ]);
        $table->addColumn('password', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false
        ]);
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false
        ]);
        $table->addIndex([
            'email',
        ],[
            'name' => 'UNIQUE_EMAIL',
            'unique' => true
        ]);

        $table->create();
    }
}
