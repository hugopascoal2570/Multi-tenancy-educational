<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Turma;
use App\Models\User;
use Illuminate\Http\Request;

class TurmaTeacherController extends Controller
{
    protected $teacher, $turma;

    public function __construct(User $teacher, Turma $turma)
    {
        $this->teacher = $teacher;
        $this->turma = $turma;

    }
    
    public function teachers($idTurma)
    {

        if (!$turmas = $this->turma->find($idTurma)) { 
          return redirect()->back();
        }
        
        $teachers = $turmas->teachers()->where('turma_id', $idTurma)->get();

        return view('admin.pages.turmas.teacher.teacher', compact('turmas','teachers'));
    }


    public function turmas($idTeacher)
    {
        if (!$teacher = $this->teacher->find($idTeacher)) {
            return redirect()->back();
        }

        $turmas = $teacher->turmas()->paginate();

        return view('admin.pages.turmas.teacher.teacher', compact('teacher', 'turmas'));
    }


    public function teachersAvailable(Request $request, $idTurma)
    {
        if (!$turma = $this->turma->find($idTurma)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $teachers = $turma->teachersAvailable($request->filter)->all();
        

        return view('admin.pages.turmas.teacher.available', compact('turma', 'teachers', 'filters'));
    }


    public function attachTeachersTurma(Request $request, $idTurma)
    {



        if (!$turma = $this->turma->find($idTurma)) {
            return redirect()->back();
        }

        if (!$request->teachers || count($request->teachers) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos um turma');
        }

        $turma->teachers()->attach($request->teachers);

        return redirect()->route('turmas.teachers', $turma->id);
    }

    public function detachTeacherTurma($idTurma, $idTeacher)
    {
        $turma = $this->turma->find($idTurma);
        $teacher = $this->teacher->find($idTeacher);

        if (!$turma || !$teacher) {
            return redirect()->back();
        }

        $turma->teachers()->detach($teacher);

        return redirect()->route('turmas.teachers', $turma->id);
    }
}
