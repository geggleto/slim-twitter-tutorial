<?php

use Phinx\Migration\AbstractMigration;

class TweetMigration extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('tweets');
        $table->addColumn('user_id', 'integer')
            ->addColumn('contents', 'string', array('limit' => 140))
            ->addColumn('state', 'integer')
            ->addIndex(array('user_id'))
            ->save();
    }
}
