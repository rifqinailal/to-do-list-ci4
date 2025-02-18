<?php

namespace App\Controllers\Web;
use App\Controllers\BaseController;

class TasksController extends BaseController
{
    public function index()
    {
        $apiUrl = "http://localhost:8080/api/tasks";

        $response = @file_get_contents($apiUrl);
        $tasks = json_decode($response, true);
        
        // Data tasks ada di dalam key 'data_tasks'
        return view('index', ['tasks' => $tasks['data_tasks']]);
    }
}
