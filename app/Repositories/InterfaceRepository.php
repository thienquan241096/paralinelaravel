<?php

namespace App\Repositories;

interface InterfaceRepository
{
    public function all();

    public function create($attributes = []);

    public function findByID($id);

    public function update($id, array $attributes);

    public function delete($id, array $attributes);

    public function search($keywword);

    public function fillData($attributes = []);
}