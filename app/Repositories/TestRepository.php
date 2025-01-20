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


    public function addLanguage($data)
    {
        $language = Language::where('status', 'active')->where('label', $data['label'])->get();

        if ($language->isEmpty()) {
            if ($language = Language::create($data)) {
                return ['success' => true, 'status' => 'Inserted', 'message' => 'Inserted successfully'];
            } else {
                return ['success' => false, 'status' => 'Error', 'message' => __('v.language_error')];
            }
        } else {
            return ['success' => false, 'status' => 'Exists', 'message' => __('v.language_exist')];
        }
    }


}
