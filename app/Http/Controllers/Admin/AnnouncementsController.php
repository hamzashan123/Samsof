<?php

namespace App\Http\Controllers\Admin;

use App\Announcement;
use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\SaveAnnouncementRequest;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.announcements.index', [
            'announcements' => Announcement::OrderBy('created_at', 'desc')->paginate(20),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.announcements.edit', [
            'announcement' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveAnnouncementRequest $request)
    {
        $data = $request->validated();
        $announcement = Announcement::create(array_merge($data, [
            'notify_members' => $request->has('notify_members'),
        ]));
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created successfully');
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
    public function edit(Announcement $announcement)
    {
        return view('admin.announcements.edit', [
            'announcement' => $announcement,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveAnnouncementRequest $request, Announcement $announcement)
    {
        $data = $request->validated();
        $announcement->update(array_merge($data, [
            'notify_members' => $request->has('notify_members'),
        ]));
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        $announcement->delete();
        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted successfully');
    }
}
