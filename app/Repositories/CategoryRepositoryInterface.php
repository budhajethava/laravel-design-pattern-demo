<?php
namespace App\Repositories;

interface CategoryRepositoryInterface
{
    public function all();

    public function create($request);

    public function update($request, $id);

    public function delete($id);

    public function find($id);

    public function imageUpload($request);

    public function dropImage($category);
}