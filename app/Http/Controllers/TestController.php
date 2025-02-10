<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test\TestRequest;
use App\Services\TestService;

class TestController extends Controller
{
    protected $testService;

    public function __construct(TestService $testService)
    {
        $this->testService = $testService;
    }

    public function index(TestRequest $request)
    {
        $data = $request->validated();

        $param1 = 1;
        $param2 = '2';

        $result = $this->testService->testFuncation($param1, $param2);

    }

    public function store(TestRequest $request)
    {
        $data = $request->validated();

        $result = $this->testService->addLanguage($data);

        if ($result['success']) {
            return redirect()->route('languages')->with('Success', $result['message']);
        } elseif ($result['status'] === 'Exists') {
            return redirect()->route('languages')->with('Exist', $result['message']);
        } else {
            return redirect()->route('languages')->with('Error', $result['message']);
        }
    }

}
