<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearningController extends Controller
{
    public function index(){
        $user = Auth::user();
        $my_courses = $user->courses()->with('category')->orderBy('id','DESC')->get();

        foreach($my_courses as $course){
            $totalQuestionsCount = $course->questions()->count();
            $answeredQuestionsCount = StudentAnswer::where('user_id', $user->id)->whereHas('question', function ($query) use ($course){
                $query->where('course_id', $course->id);
            })->distinct()->count('course_question_id');

            if($answeredQuestionsCount < $totalQuestionsCount){
                $firstUnansweredQuestion = CourseQuestion::where('course_id', $course->id)->whereNotIn('id', function($query) use ($user){
                    $query->select('question_id')->from('student_answers')->where('user_id', $user->id);
                })->orderBy('id', 'asc')->first();
            }
        }

        return view('student.courses.index',[
            'user' => $user,
            'my_courses' => $my_courses 
        ]);
    }
}
