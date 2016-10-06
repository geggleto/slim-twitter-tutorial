<?php

use Phinx\Migration\AbstractMigration;

class UserMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('users');
        $table->addColumn('username', 'string', array('limit' => 32))
            ->addColumn('password', 'string', array('limit' => 255))
            ->addColumn('email', 'string', array('limit' => 100))
            ->addColumn('created', 'datetime')
            ->addIndex(array('username', 'email'), array('unique' => true))
            ->save();
    }
}
