<?php

namespace App\Repositories;

define('DEL_FLAG', 0);
define('NUMBER', 3);

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

    public function paginate()
    {
        return $this->model->where('del_flag', '=', DEL_FLAG)->orderByDesc('id')->paginate(NUMBER);
    }

    public function getAll()
    {
        return $this->model->where('del_flag', '=', DEL_FLAG)->orderByDesc('id')->get();
    }

    public function create($attributes = [])
    {
        $attributes['ins_id'] = Auth::user()->id;
        $attributes['upd_id'] = Auth::user()->id;
        $attributes['del_flag'] = DEL_FLAG;
        return $this->model->create($attributes);
    }

    public function findByID($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $attributes)
    {
        $attributes['upd_id'] = Auth::user()->id;
        $findResult = $this->findByID($id);
        if (!$findResult) {
            return false;
        }
        $findResult->update($attributes);
        return $findResult;
    }

    public function fill($attributes = [])
    {
        $attributes['ins_id'] = Auth::user()->id;
        $attributes['upd_id'] = Auth::user()->id;
        $attributes['del_flag'] = DEL_FLAG;
        $result = $this->model->fill($attributes);
        return $result;
    }

    public function delete($id, $attributes = [])
    {
        $attributes['upd_id'] = Auth::user()->id;
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