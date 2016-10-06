<?php

use Phinx\Migration\AbstractMigration;

class TweetMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('tweets');
        $table->addColumn('owner_id', 'integer')
            ->addColumn('contents', 'string', array('limit' => 140))
            ->addIndex(array('owner_id'))
            ->save();
    }
}
