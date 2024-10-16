<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $user_id = auth()->user()->id;

        $category = Category::insert([
            'name' => $request->name,
            'user_id' => $user_id
        ]);

        if ($category) {
            return redirect()->route('category.index')->with('success', 'Kategoriya mucaffaqiyatli qo`shildi');
        } else {
            return redirect()->back()->with('error', 'Kategoriya allaqachon mavjud');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {

        $update = Category::find($id);
        $update->update([
            'name' => $request->name,
        ]);

        if ($update) {
            return redirect()->route('category.index')->with('success', 'Kategoriya mucaffaqiyatli tahrirlandi');
        }
        else {
            return redirect()->back()->with('error', 'Kategoriya tahrirlashdi xatolik yuz berdi');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Category::find($id)->delete();

        if ($delete) {
            return redirect()->route('category.index')->with('success', 'Kategoriya mucaffaqiyatli o`chirildi');
        }
        else {
            return redirect()->back()->with('error', 'Kategoriya o`chirishda xatolik yuz berdi');
        }
    }
}
