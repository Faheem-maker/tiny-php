<?php

namespace app\migrations;

class MakeUsersTable
{
    public function up()
    {
        $tableCmd = db()->createTable('users');

        $tableCmd->id();
        $tableCmd->string('username');
        $tableCmd->string('email');
        $tableCmd->string('password');
        $tableCmd->timestamps();

        $tableCmd->execute();
    }

    public function down()
    {
        db()->dropTable('users');
    }
}
