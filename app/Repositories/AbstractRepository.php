<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

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
        return $this->model->where('del_flag', '=', 0)->get();
    }

    public function create($attributes = [])
    {
        $attributes['ins_id'] = 1;
        $attributes['upd_id'] = 1;
        $attributes['del_flag'] = 0;
        return $this->model->create($attributes);
    }

    public function findByID($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $attributes)
    {
        $attributes['upd_id'] = 1;
        $findResult = $this->findByID($id);
        if (!$findResult) {
            return false;
        }
        $findResult->update($attributes);
        return $findResult;
    }

    public function fillData($attributes = [])
    {
        $result = $this->model->fill($attributes);
        return $result;
    }

    public function delete($id, $attributes = [])
    {
        $attributes['upd_id'] = 1;
        $findResult = $this->findByID($id);
        if (!$findResult) {
            return false;
        }
        $findResult->update($attributes);
        return $findResult;
    }

    public function search($keyword)
    {
        return $this->model->where('name', 'like', '%' . "$keyword " . '%')->get();
    }
}