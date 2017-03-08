<?php

use PHPUnit\Framework\TestCase;
use \ConnectFour\Users;

/**
 * @covers Users
 */
final class UsersTest extends TestCase
{
    public function testSetUserName()
    {
        $name = 'name';
        $user = new Users('name');
        $this->assertEquals($user->getName(), 'name');
    }

}
