<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\City;
use App\Coverage;
use App\Event;
use App\Staff;
use App\Member;
use App\Hospital;
use App\Opinion;
use App\Speciality;
use Illuminate\Http\Request;
use App\Procedure;
use App\Release;
use Carbon\Carbon;
use Parsedown;

/**
 * Class PublicController
 * @package App\Http\Controllers
 */
class PublicController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $events = Event::where('ends_at', '>=', Carbon::now())->orderBy('starts_at', 'asc')->get();
        $announcements = Announcement::take(3)->get();
        $opinions = Opinion::take(3)->orderBy('id', 'desc')->get();
        $coverages = Coverage::orderBy('published_at', 'desc')->take(2)->get();

        $firstCoverage = $coverages->first();
        $secondCoverage = $coverages[1];

        return view('home', [
            'events' => $events,
            'sliderImages' => $this->getSliderImages(),
            'announcements' => $announcements,
            'opinions' => $opinions,
            'firstCoverage' => $firstCoverage,
            'secondCoverage' => $secondCoverage,
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function members()
    {
        $settings = $this->getMemberSearchSettings();

        return view('members', $settings);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function education()
    {
        $settings = $this->getMemberSearchSettings();

        return view('education', $settings);
    }

    public function resources()
    {
        return view('resources');
    }

    public function cares()
    {
        return view('cares');
    }

    public function media()
    {
        return view('posts.index');
    }

    public function ask()
    {
        $settings = $this->getMemberSearchSettings();
        $staff = Staff::orderBy('order')->get();
        $procedures = Procedure::get();

        return view('ask', array_merge($settings, [
            'staff' => $staff,
            'procedures' => $procedures,
        ]));
    }

    public function who()
    {
        $staff = Staff::where('exco', true)->orderBy('order', 'asc')->get();

        return view('who', [
            'staff' => $staff,
        ]);
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    public function case()
    {
        $data = (new Parsedown())->parse(
            \file_get_contents(resource_path('markdown/claude.md'))
        );
        return view('study.show', [
            'data' => $data
        ]);
    }

    protected function getMemberSearchSettings()
    {
        $specialities = Speciality::orderBy('title')->get();
        $hospitals = Hospital::orderBy('title')->get();

        $cities = City::orderBy('title')->with('country')->get();

        return [
            'specialities' => $specialities,
            'hospitals' => $hospitals,
            'cities' => $cities,
            'totalMembers' => Member::count(),
        ];
    }

    protected function getSliderImages()
    {
        return array_map(function ($image) {
            return asset('images/hero/' . $image);
        }, config('sasmfos.hero.images'));
    }
}
