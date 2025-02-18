<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class TasksApiController extends ResourceController
{
    protected $modelName = 'App\Models\TasksModel';
    protected $format = 'json';

    public function index()
    {
        $data = [
            'message' => 'sucsess',
            'data_tasks' => $this->model->findAll()
        ];

        return $this->respond($data, 200);
    }

    public function create()
    {

        $rules = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->insert([
            'title' => esc($this->request->getVar('title')),
            'description' => esc($this->request->getVar('description')),
            'status' => esc($this->request->getVar('status'))
        ]);

        $respond = [
            'message' => 'data berhasil ditambahkan',
        ];

        return $this->respondCreated($respond);
    }

    public function update($id = null)
    {
        $rules = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->update($id,[
            'title' => esc($this->request->getVar('title')),
            'description' => esc($this->request->getVar('description')),
            'status' => esc($this->request->getVar('status'))
        ]);

        $respond = [
            'message' => 'data berhasil diubah',
        ];

        return $this->respond($respond);
    }

    public function delete($id = null){
        $data = [
            'message' => 'sucsess',
            'data_tasks' => $this->model->delete($id)
        ];

        return $this->respondDeleted($data);
    }
}
