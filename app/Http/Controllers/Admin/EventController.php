<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Http\Requests\Events\CreateEventRequest;
use App\Http\Requests\Events\UpdateEventRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\ImageManager;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->paginate(10);

        return view('admin.events.index', [
            'events' => $events
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $date = date('Y-m-d H:i:s');

        return view('admin.events.edit', [
            'event' => null,
            'date' => $date,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $data = $request->validated();

        $startAt = $this->getCarbon(
            $request->get('starts_date'),
            $request->get('starts_time')
        );

        $endsAt = $this->getCarbon(
            $request->get('ends_date'),
            $request->get('ends_time')
        );

        $rand_color = "#".substr(md5(rand()), 0, 6);

        $event = Event::create(array_merge($data, [
            'starts_at' => $startAt,
            'ends_at' => $endsAt,
            'color' => $rand_color,
        ]));

        $this->updateImage($event, $request->get('image'));

        return redirect()->route('admin.events.index')->with('success', 'Event Created');
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
    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();

        $startAt = $this->getCarbon(
            $request->get('starts_date'),
            $request->get('starts_time')
        );

        $endsAt = $this->getCarbon(
            $request->get('ends_date'),
            $request->get('ends_time')
        );

        $event->update(array_merge($data, [
            'starts_at' => $startAt,
            'ends_at' => $endsAt
        ]));

        $this->updateImage($event, $request->get('image'));

        return redirect()->route('admin.events.index')->with('success', 'Event Updated');
    }

    protected function getCarbon($date, $time)
    {
        return Carbon::createFromFormat('Y-m-d H:i', $date . ' ' . $time);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event Deleted');
    }

    protected function updateImage(Event $event, string $tempFilename = null)
    {
        if (!$tempFilename) {
            return;
        }

        $temp = explode('.', $tempFilename)[0];

        $imageManager = new ImageManager([
            'driver' => 'imagick'
        ]);

        $image = $imageManager->make(Storage::disk('local')->get('images/temp/' . $temp));
        if ($image->height() > 800) {
            $image->heighten(800, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }
        if ($image->width() > 1000) {
            $image->widen(1000, function (Constraint $constraint) {
                $constraint->upsize();
            });
        }

        $data = $image->encode('png');
        Storage::disk('local')->put('images/events/' . $event->id . '.png', $data);
    }
}
