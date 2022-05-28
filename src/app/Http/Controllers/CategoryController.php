<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCatagoryRequest;
use App\Http\Requests\UpdateCatagoryRequest;
use App\Repository\CategoryRepositoryInterface as CategoryRepo;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Category Repository
     */
    protected $categoryRepo;

    public function __construct(CategoryRepo $categoryRepo)
    {
        $this->middleware('auth');
        $this->categoryRepo = $categoryRepo;
    }

    public function index()
    {
        $categories= $this->categoryRepo->all();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCatagoryRequest $request)
    {
        $this->categoryRepo->create($request->except('_token'));
        return redirect()->route('category.index')
            ->withSuccess(__('Category added successfully.'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('categories.edit',[
            'category' => $this->categoryRepo->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatagoryRequest $request, $id)
    {
        $this->categoryRepo->update($id,$request->except('_token'));
        return redirect()->route('category.index')
            ->withSuccess(__('Category updated successfully.'));
    }

    /**
     * Update status the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
       if($this->categoryRepo->status($id)) {
           return redirect()->route('category.index')
               ->withSuccess(__('Successfully changed the status of a category'));
       } else {
           return redirect()->route('category.index')
               ->withError(__('Unable to change the status of a category'));
       }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepo->deleteById($id);
        return redirect()->route('category.index')
            ->withSuccess(__('Successfully deleted this category'));
    }
}
