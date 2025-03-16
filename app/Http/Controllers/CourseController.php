<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.courses.create',[
            'categories' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer',
            'cover' => 'required|image|mimes:png,jpg,svg'
        ]);

        DB::beginTransaction();
        try{
            if($request->hasFile('cover')){
                $coverPath = $request->file('cover')->store('product_store', 'public');
                $validate['cover'] = $coverPath;
            }
            $validate['slug'] = Str::slug($request->name);
            $newCourse = Course::create($validate);
            DB::commit();
            return redirect()->route('dashboard.courses.index');
        }
        catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessage([
                'system_error' => ['system error!'. $e->getMessage()]
            ]);
            throw $error;
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
