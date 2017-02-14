<?php

use Phinx\Migration\AbstractMigration;

class CreateSession extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        /*
CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
        */

        
        $users = $this->table('ci_sessions', array('id' => false));
        $users->addColumn('id', 'string', array('limit' => 128))
              ->addColumn('ip_address', 'string', array('limit' => 45))
              ->addColumn('timestamp', 'integer', array('limit' => 10))
              ->addColumn('data', 'blob')
              ->addIndex('timestamp', array('name' => 'ci_sessions_timestamp'))
              ->create();
    }
}
