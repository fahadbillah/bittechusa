<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $users = $this->table('users', array('id' => 'userId', 'primary_key' => 'userId'));
        $users->addColumn('firstName', 'string', array('limit' => 30))
              ->addColumn('lastName', 'string', array('limit' => 30))
              ->addColumn('email', 'string', array('limit' => 100))
              ->addColumn('password', 'string', array('limit' => 40))
              ->addColumn('userType', 'enum', array('values' => array('admin', 'student')))
              ->addColumn('accountStatus', 'enum', array('values' => array('active', 'not_yet_active', 'banned')))
              ->addColumn('profilePic', 'text', array('null' => true))
              ->addColumn('created', 'timestamp', array('default' => 'CURRENT_TIMESTAMP'))
              ->addColumn('updated', 'timestamp', array('default' => 'CURRENT_TIMESTAMP', 'update' => 'CURRENT_TIMESTAMP'))
              ->addIndex(array('email'), array('unique' => true))
              ->create();
    }
}
