<?php

namespace App\Repositories;

abstract class AbstractRepository implements InterfaceRepository
{
    protected $model;


    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = $this->getModel();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    public function findByID($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $attributes)
    {
        $data = $this->model->findByID($id);
        if (!$data) {
            return false;
        }
        $data->update($attributes);
        return $data;
    }

    public function delete($id, array $attributes)
    {
        $data = $this->model->findByID($id);
        if (!$data) {
            return false;
        }
        $data->update($attributes);
        return $data;
    }
}