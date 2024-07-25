<?php
namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * all is used to get all categories
     *
     * @return object return categories if found
     * @author Spec Developer
     */
    public function all()
    {
        return Category::all();
    }

    /**
     * create is used to create category
     *
     * @param  Request $request Request parameter
     * @return object  return created category
     * @author Spec Developer
     */
    public function create($request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $data['image'] = $this->imageUpload($request);
        }
        $data['status'] = !empty($request->status) ? $request->status : 0;
        $data['slug'] = Str::slug($request->name);
        return Category::create($data);
    }

    /**
     * update is used to update category
     *
     * @param  Request $request Request parameter
     * @param  int     $id      Category primary id
     * @return object  return updated category
     * @author Spec Developer
     */
    public function update($request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $this->dropImage($category);            
            $data['image'] =  $this->imageUpload($request);
        }
        $data['slug'] = Str::slug($request->name);
        $data['status'] = !empty($request->status) ? $request->status : 0;
        $category->update($data);
        return $category;
    }

    /**
     * delete is used to create delete category
     *
     * @param  int $id category primary id
     * @return return null if category deleted
     * @author Spec Developer
     */
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $this->dropImage($category);
        $category->delete();
    }

    /**
     * find is used to get a category
     *
     * @param  int $id category primary id
     * @return object return category if found
     * @author Spec Developer
     */
    public function find($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * dropImage is used to drop image
     *
     * @param  object $category category record
     * @return true
     * @author Spec Developer
     */
    public function dropImage($category)
    {
        if (Storage::disk('public')->exists('/categories/'.$category->image)) {
            Storage::disk('public')->delete('/categories/'.$category->image);
        }
        return true;
    }

    /**
     * imageUpload is used to upload category image
     *
     * @param  Request $request Request parameter
     * @return return filename if uploaded otherwise empty string will return
     * @author Spec Developer
     */
    public function imageUpload($request)
    {
        $fileName = '';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $fileName = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $destinationPath = "categories/$fileName";
            $storage = Storage::disk('public');
            if (!$storage->exists('categories')) {
                $storage->makeDirectory('categories');
            }
            $storage->put($destinationPath, file_get_contents($file), 'public');
        }
        return $fileName;
    }
}