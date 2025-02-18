<?php

namespace App\Controllers\Api;
use CodeIgniter\RESTful\ResourceController;

class TasksApiController extends ResourceController
{
    protected $modelName = 'App\Models\TasksModel';
    protected $format = 'json' ;

    public function index(){
        $data = [
            'message' => 'sucsess',
            'data_tasks' => $this->model->findAll()
        ];

        return $this->respond($data,200);
    }
}
