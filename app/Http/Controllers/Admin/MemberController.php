<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Member;
use App\Country;
use App\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Members\CreateMemberRequest;
use App\Http\Requests\Members\UpdateMemberRequest;
use App\Services\DeleteFileService;
use App\Services\MemberPdfUploadService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $members = Member::where(function ($query) use ($search) {
            if ($search) {
                $query->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            }
        })->where('admin', '!=', true)->orderBy('first_name')->orderBy('last_name')->paginate(10);

        return view('admin.members.index', [
            'search' => $search,
            'members' => $members,
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

        return view('admin.members.edit', [
            'member' => null,
            'countries' => Country::with('cities')->orderBy('title')->get(),
            'cities' => City::orderBy('title')->get(),
            'date' => $date,
            'hospitals' => Hospital::orderBy('title')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateMemberRequest $request)
    {
        $data = $request->validated();
        $date = date('Y-m-d');

        $member = Member::create(array_merge($data, [
            'active' => $request->has('active'),
            'payment_at' => $this->getCarbon($request->get('payment_at_date')),
            'expires_at' => $date === $request->get('expires_at_date') ? null : $this->getCarbon($request->get('expires_at_date')),
            'password' => $request->get('password') ? Hash::make($request->get('password')) : null,
        ]));

        if ($request->get('certificate')) {
            $tempCertificate = $request->get('certificate');
            $certificate = storage_path('app/certificates/' . $member->id . '.pdf');
            (new MemberPdfUploadService)->updatePdf($tempCertificate, $certificate);
        }

        if ($request->get('voucher')) {
            $tempVoucher = $request->get('voucher');
            $vouchers = storage_path('app/vouchers/' . $member->id . '.pdf');
            (new MemberPdfUploadService)->updatePdf($tempVoucher, $vouchers);
        }

        return redirect()->route('admin.members.index')->with('success', 'Member Created');
    }

    protected function getCarbon($date)
    {
        return Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return view('admin.members.show', [
            'member' => $member,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $member->load('city', 'hospitals');
        $date = date('Y-m-d H:i:s');

        return view('admin.members.edit', [
            'member' => $member,
            'date' => $date,
            'hospitals' => Hospital::orderBy('title')->get(),
            'countries' => Country::with('cities')->orderBy('title')->get(),
            'cities' => City::orderBy('title')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMemberRequest $request
     * @param Member $member
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemberRequest $request, Member $member)
    {
        $date = date('Y-m-d');
        $data = $request->validated();
        $member->update(array_merge($data, [
            'coordinates' => json_decode($data['coordinates']),
            'active' => array_key_exists('active', $data),
            'published' => array_key_exists('published', $data),
            'payment_at' => $this->getCarbon($request->get('payment_at_date')),
            'expires_at' => $date === $request->get('expires_at_date') ? null : $this->getCarbon($request->get('expires_at_date')),
        ]));

        if ($request->get('password')) {
            $member->update([
                'password' => $request->get('password') ? Hash::make($request->get('password')) : null,
            ]);
        }

        if ($request->get('certificate')) {
            $tempCertificate = $request->get('certificate');
            $certificate = storage_path('app/certificates/' . $member->id . '.pdf');
            (new MemberPdfUploadService)->updatePdf($tempCertificate, $certificate);
        }

        if ($request->get('voucher')) {
            $tempVoucher = $request->get('voucher');
            $vouchers = storage_path('app/vouchers/' . $member->id . '.pdf');
            (new MemberPdfUploadService)->updatePdf($tempVoucher, $vouchers);
        }

        $this->updateHospitals($member, json_decode($request->get('hospitals'), true));

        return redirect()->route('admin.members.index')->with('success', 'Member ' . $member->name . ' was updated');
    }

    protected function updateHospitals(Member $member, $data): void
    {
        $ids = array_map(static function ($h) {
            $id = $h['id'];

            if (strpos($id, 'new') === 0) {
                return Hospital::firstOrCreate(Arr::only($h, ['city_id', 'title']))->id;
            }

            return $id;
        }, $data);

        $member->hospitals()->sync($ids);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        (new DeleteFileService)->deleteFile(Storage::disk('public')->url('certificates/' . $member->id . '.pdf'));
        (new DeleteFileService)->deleteFile(Storage::disk('public')->url('vouchers/' . $member->id . '.pdf'));
        $member->delete();

        return redirect()->route('admin.members.index')->with('success', 'Member created');
    }
}
