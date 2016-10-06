<?php

use Phinx\Migration\AbstractMigration;

class FeedMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('feeds');
        $table->addColumn('user_id', 'integer')
            ->addColumn('contents', 'string', array('limit' => 140))
            ->addIndex(array('user_id'))
            ->save();
    }
}
