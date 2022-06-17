<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRoom;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected $repository;

    public function __construct(Room $room)
    {
        $this->repository = $room;

        $this->middleware(['can:rooms']);
    }
    public function index()
    {
        $rooms = $this->repository->paginate();

        return view('admin.pages.rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateRoom $request)
    {

        $data = $request->all();

        $this->repository->create($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$room = $this->repository->find($id)) {
            return redirect()->back();
        }

        return view('admin.pages.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$room = $this->repository->find($id)) {
            return redirect()->back();
        }
        return view('admin.pages.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateRoom $request, $id)
    {
        if (!$room = $this->repository->find($id)) {
            return redirect()->back();
        }

        $room->update($request->all());

        return redirect()->route('rooms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$room = $this->repository->find($id)) {
            return redirect()->back();
        }

        $room->delete();

        return redirect()->route('rooms.index');
    }

    public function search(Request $request)
    {
        $filters = $request->only('filter');

        $rooms = $this->repository
            ->where(function ($query) use ($request) {
                if ($request->filter) {
                    $query->where('name', $request->filter);
                }
            })
            ->paginate();

        return view('admin.pages.rooms.index', compact('rooms', 'filters'));
    }
}
