<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use  App\Http\Requests\Dashboard\GeneralRequest;


class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->all();


        return view('dashboard.categories.index')->with('categories', $categories);
    }

    public function store(GeneralRequest $request){
        $data = $request->all();
        $categoryData = $this->category->create($data);
        return response()->json(['message'=> 'Category added  successfully :)', 'data' => $categoryData]);

    }

    public function edit($id){

        $category = $this->category->getUserById($id);

        return response()->json(['category' => $category]);
    }


    public function update(GeneralRequest $request, $id){
        $data = $request->all();
        $record = $this->category->update($data, $id);
        return response()->json(['message'=> 'Category data updated successfully :)', 'data' => $record]);
    }

    public function destroy($id)
    {
            $this->category->delete($id);
            return response()->json(['success' =>'Category  Deleted Successfully']);

    }

}
