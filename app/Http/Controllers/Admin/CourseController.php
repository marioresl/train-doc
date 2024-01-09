<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use App\Models\UserSession;
use Illuminate\Http\Request;
use Prometa\Sleek\Facades\Sleek;
use DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('created_at', 'desc')->withCount('users')->with('users.personalData')->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::with('personalData')->get();
        return view('courses.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            DB::transaction(function () use ($request)  {
                $course = Course::create([
                    'name' => $request->name,
                    'date' => $request->date,
                    'duration' => $request->duration
                ]);

                if ($course) {
                    $course->users()->sync($request->users);
                }

                foreach ($request->users as $userId) {
                    UserSession::create([
                        'user_id' => $userId,
                        'hours' => $request->duration,
                        'date' => $request->date,
                        'type' => 'claim'
                    ]);
                }
            });
            Sleek::raise('Die Einheit wurde erstellt und bei allen Mitgleidern wurden die Stunden abgezogen.', 'success');
        }catch (\Exception $e){
            info($e);
            Sleek::raise('Fehlgeschalgen!', 'danger');
        }

        return redirect()->route('admin.courses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $course = Course::where('id', $course->id)->withCount('users')->first();

        return view('courses.show',compact('course'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
