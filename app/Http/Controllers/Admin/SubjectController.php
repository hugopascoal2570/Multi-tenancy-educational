<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    protected $repository;

    public function __construct(Subject $subject)
    {
        $this->repository = $subject;
    }
    public function index()
    {
        $subjects = $this->repository->paginate();

        return view('admin.pages.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateSubject $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('subjects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$subject = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$subject = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateSubject $request, $id)
    {
        if (!$subject = $this->repository->find($id)) {
            return redirect()->back();
        }

        $subject->update($request->all());

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$subject = $this->repository->find($id)) {
            return redirect()->back();
        }

        $subject->delete();

        return redirect()->route('subjects.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $subjects = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter);
                }
            })
            ->paginate();

        return view('admin.pages.subjects.index', compact('subjects', 'filters'));
    }
}
