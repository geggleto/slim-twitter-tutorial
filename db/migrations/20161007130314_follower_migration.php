<?php

use Phinx\Migration\AbstractMigration;

class FollowerMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('followers');
        $table->addColumn('user_id', 'integer')
            ->addColumn('follows_user_id', 'integer')
            ->addIndex(array('user_id'))
            ->addIndex(array('follows_user_id'))
            ->save();
    }
}
