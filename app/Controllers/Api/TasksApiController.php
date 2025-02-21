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

    public function detail($id)
    {
        $data = $this->model->find($id);

        if (empty($data)) {
            return $this->failNotFound('Task tidak ditemukan');
        }

        return $this->respond($data);
    }
    public function create()
    {

        $rules = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'deadline' => 'required|valid_date[Y-m-d]'
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
            'deadline' => $this->request->getVar('deadline')
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
            'status' => 'required',
            'deadline' => 'required|valid_date[Y-m-d]'
        ]);

        if (!$rules) {
            $response = [
                'message' => $this->validator->getErrors()
            ];

            return $this->failValidationErrors($response);
        }

        $this->model->update($id, [
            'title' => esc($this->request->getVar('title')),
            'description' => esc($this->request->getVar('description')),
            'status' => esc($this->request->getVar('status')),
            'deadline' => $this->request->getVar('deadline')
        ]);

        $respond = [
            'message' => 'data berhasil diubah',
        ];

        return $this->respond($respond);
    }

    public function delete($id = null)
    {
        $this->model->delete($id);

        $response = [
            'message' => 'Data berhasil dihapus'
        ];

        return $this->respondDeleted($response);
    }
}
