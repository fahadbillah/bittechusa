<?php

use Phinx\Seed\AbstractSeed;

class AdminSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $data = array(
            array(
                'password'    => sha1(123),
                'email'    => 'admin@bittechusa.com',
                'firstName'    => 'Web',
                'lastName'    => 'Admin',
                'userType'    => 'admin',
                'accountStatus'    => 'active',
                'created'    => date('Y-m-d H:i:s'),
                'updated' => date('Y-m-d H:i:s'),
            )
        );

        $posts = $this->table('users');
        $posts->insert($data)
              ->save();
    }
}
