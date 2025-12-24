<?php

namespace App\Controllers\Api;

use App\Models\ProductModel;
use CodeIgniter\RESTful\ResourceController;

class Products extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $model = new ProductModel();
        $rows  = $model->orderBy('id', 'DESC')->findAll();

        return $this->respond(['data' => $rows]);
    }

    public function show($id = null)
    {
        $model = new ProductModel();
        $row   = $model->find($id);

        if ($row === null) {
            return $this->failNotFound('Product not found');
        }

        return $this->respond(['data' => $row]);
    }

    public function create()
    {
        $payload = $this->request->getJSON(true) ?? [];

        $rules = [
            'name'  => 'required|min_length[2]|max_length[150]',
            'price' => 'required|decimal',
            'stock' => 'required|is_natural',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $model = new ProductModel();
        $id    = $model->insert([
            'name'  => $payload['name'],
            'price' => $payload['price'],
            'stock' => $payload['stock'],
        ], true);

        return $this->respondCreated([
            'message' => 'Created',
            'data'    => $model->find($id),
        ]);
    }

    public function update($id = null)
    {
        $model = new ProductModel();
        $row   = $model->find($id);

        if ($row === null) {
            return $this->failNotFound('Product not found');
        }

        $payload = $this->request->getJSON(true) ?? [];

        $rules = [
            'name'  => 'if_exist|required|min_length[2]|max_length[150]',
            'price' => 'if_exist|required|decimal',
            'stock' => 'if_exist|required|is_natural',
        ];

        if (! $this->validateData($payload, $rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $model->update($id, $payload);

        return $this->respond([
            'message' => 'Updated',
            'data'    => $model->find($id),
        ]);
    }

    public function delete($id = null)
    {
        $model = new ProductModel();
        $row   = $model->find($id);

        if ($row === null) {
            return $this->failNotFound('Product not found');
        }

        $model->delete($id);

        return $this->respondDeleted(['message' => 'Deleted']);
    }
}