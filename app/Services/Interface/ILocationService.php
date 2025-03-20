<?php

namespace App\Services\Interface;

interface ILocationService
{
    public function get(int $id = null);
    public function list();
    public function create(array $post = null);
    public function update(int $id, array $post = null);
    public function delete(int $id = null);
    public function dataTable(array $post = null);
}
