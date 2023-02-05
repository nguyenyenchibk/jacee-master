<?php

namespace App\Services;

use App\Services\Interfaces\BaseServiceInterface;

abstract class Repository implements BaseServiceInterface
{
    protected $model;

    public function __construct()
    {
        $this->set();
    }

    abstract public function get();


    public function set()
    {
        $this->model = app()->make(
            $this->get()
        );
    }

    public function update($model, array $data)
    {
        if ($model) {
            $model->update($data);
            return $model;
        }

        return false;
    }
}
