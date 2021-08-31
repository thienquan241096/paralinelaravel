<?php

namespace App\Repositories;

define('DEL_FLAG', 0);

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
        return $this->model->where('del_flag', '=', DEL_FLAG)->paginate(3);
    }

    public function getAll()
    {
        return $this->model->where('del_flag', '=', DEL_FLAG)->get();
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

    public function fill($attributes = [])
    {
        $attributes['ins_id'] = 1;
        $attributes['upd_id'] = 1;
        $attributes['del_flag'] = 0;
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
        return $this->model->where('name', 'like', '%' . "$keyword" . '%')->where('del_flag', '=', DEL_FLAG)->orderByDesc('id');
    }

    public function get($keyword)
    {
        return $this->search($keyword)->paginate(3);
    }

    public function save()
    {
        return $this->model->save();
    }
}