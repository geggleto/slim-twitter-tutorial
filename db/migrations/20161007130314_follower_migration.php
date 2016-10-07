<?php

use Phinx\Migration\AbstractMigration;

class FollowerMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('followers');
        $table->addColumn('person_id', 'integer')
            ->addColumn('follower_id', 'integer')
            ->addIndex(array('person_id'))
            ->addIndex(array('follower_id'))
            ->save();
    }
}
