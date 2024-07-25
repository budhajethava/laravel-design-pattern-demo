<?php
namespace App\Services;

use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService
{
    public function __construct(protected CategoryRepositoryInterface $categoryRepository) {
    }

    public function create($request)
    {
        return $this->categoryRepository->create($request);
    }

    public function update($request, $id)
    {
        return $this->categoryRepository->update($request, $id);
    }

    public function delete($id)
    {
        return $this->categoryRepository->delete($id);
    }

    public function all()
    {
        return $this->categoryRepository->all();
    }
    
    public function find($id)
    {
        return $this->categoryRepository->find($id);
    }
}