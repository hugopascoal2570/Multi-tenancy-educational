<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Room;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{

    protected $repository, $model;
    public function __construct(ClassRoom $classroom, User $user)
    {
        $this->repository = $classroom;
        $this->model = $user;

        $this->middleware(['can:classrooms']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classroom = $this->repository->paginate();


        return view('admin.pages.classroom.index', compact('classroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Room::all(); 

        $teachers = $this->model->latest()->RoleUser()->paginate();

        return view('admin.pages.classroom.create',compact('classes','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(['name','sala','user_id','tenant_id']);
        $data['user_id'] = auth()->id();
        $data['tenant_id'] = auth()->user()->tenant_id;

        $classrooms = $this->repository->create($data);
        $classrooms->subjects()->sync($data['disciplina']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
