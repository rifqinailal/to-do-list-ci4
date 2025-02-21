<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;

class TasksController extends BaseController
{
    public function index()
    {
        $apiUrl = "http://localhost:8080/api/tasks";
        $client = \Config\Services::curlrequest();
        $response = $client->get($apiUrl);
        $tasks = json_decode($response->getBody(), true);

        // Data tasks ada di dalam key 'data_tasks'
        return view('index', ['tasks' => $tasks['data_tasks']]);
    }

    public function detail($id)
    {
        // Tambahkan slash setelah tasks/
        $apiUrl = "http://localhost:8080/api/task/" . $id;
        $client = \Config\Services::curlrequest();
        $response = $client->get($apiUrl);
        $task = json_decode($response->getBody(), true);

        // Kirim data dalam format array
        return view('detail', ['task' => $task]);
    }

    public function delete($id)
    {
        $apiUrl = "http://localhost:8080/api/task/delete/" . $id;
        $client = \Config\Services::curlrequest();

        try {
            $response = $client->delete($apiUrl);

            // Redirect ke halaman index dengan pesan sukses
            return redirect()->to('/index')->with('message', 'Task berhasil dihapus');
        } catch (\Exception $e) {
            // Redirect ke halaman index dengan pesan error
            return redirect()->to('/index')->with('error', 'Gagal menghapus task');
        }
    }

    public function create()
    {
        $apiUrl = "http://localhost:8080/api/tasks";
        $client = \Config\Services::curlrequest();

        // Ambil data dari form
        $title = $this->request->getPost("title");
        $description = $this->request->getPost("description");
        $deadline = $this->request->getPost("deadline"); // Format: YYYY-MM-DD

        // Konversi format tanggal jika perlu
        $formattedDate = date('Y-m-d', strtotime($deadline));

        // Data yang akan dikirim ke API
        $data = [
            "title" => $title,
            "description" => $description,
            "deadline" => $formattedDate
        ];

        // Kirim request ke API
        $response = $client->post($apiUrl, [
            "json" => $data,
            "http_errors" => false
        ]);

        // Ambil hasil respons dari API
        $result = json_decode($response->getBody(), true);

        // Redirect kembali ke halaman utama dengan pesan sukses/gagal
        return redirect()->to('/index')->with('message', $result['message'] ?? 'Gagal menambahkan tugas');
    }
}
