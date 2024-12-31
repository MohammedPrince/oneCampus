<?php

namespace App\Repositories;

class TestRepository
{

    public function __construct()
    {
       //Setting up the repository constructor
    }

    public function testFuncation($param1 = 10, $param2)
    {
       //Do all your database oprations here

       return $param2;
    }
}
