<?php

namespace App\Services;

use App\Repositories\TestRepository;

class TestService
{
    protected $testRepository;

    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function testFuncation($param1,$param2)
    {
        return $this->testRepository->testFuncation($param1,$param2);
    }

    public function addLanguage($data)
    {
        return $this->testRepository->addLanguage($data);
    }
}
