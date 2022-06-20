<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateClassRoom;
use App\Http\Requests\StoreUpdateTurma;
use App\Models\ClassRoom;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Room;
use App\Models\Sala;
use App\Models\Subject;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;

class TurmaController extends Controller
{

    protected $repository, $model;
    public function __construct(Turma $turma, User $user)
    {
        $this->repository = $turma;
        $this->model = $user;

        $this->middleware(['can:salas']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = $this->repository->paginate();

        return view('admin.pages.turmas.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Room::all(); 

        $teachers = $this->model->latest()->RoleTeacher()->paginate();

        return view('admin.pages.turmas.create',compact('classes','teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateTurma $request)
    {

        $data = $request->all();

        $data['tenant_id'] = auth()->user()->tenant_id;

        $turma = $this->repository->create($data);

        $turma->teachers()->sync($data['teacher']);

        return redirect()->route('turmas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        if (!$turma = $this->repository::find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.turmas.show', compact('turma'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$turmas = $this->repository->find($id)) {
            return redirect()->back();
        }
        
        $classes = Room::all(); 

        $teachers = $this->model->latest()->RoleTeacher()->get();


        return view('admin.pages.turmas.edit', compact('turmas','classes','teachers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateTurma $request, $id)
    {
        $turma = Turma::find($id);

        $data = $this->repository->find($id);

        $turma->update($request->all());

        $turma->teachers()->sync($data['teacher']);


        return redirect()->route('turmas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turma = $this->repository
        ->with('teachers')
        ->where('id', $id)
        ->first();

    if (!$turma)
        return redirect()->back();


    if ($turma->teachers->count() > 0) {
        return redirect()
            ->back()
            ->with('error', 'Existem professores vinculados a esta turma, portanto não pode deletar');
    }
    $turma->delete();

        return redirect()->route('turmas.index');
    }
}
