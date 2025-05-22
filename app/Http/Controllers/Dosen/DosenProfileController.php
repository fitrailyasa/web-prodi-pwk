<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\DosenProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DosenProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->dosenProfile;
        return view('dosen.profile.index', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:1000',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
            'position' => 'nullable|string|max:100',
            'rank' => 'nullable|string|max:100',
            'group' => 'nullable|string|max:100',
            'education' => 'nullable|string|max:1000',
            'expertise' => 'nullable|string|max:1000',
            'google_scholar' => 'nullable|url|max:255',
            'scopus_id' => 'nullable|string|max:50',
            'sinta_id' => 'nullable|string|max:50',
            'research_interests' => 'nullable|string|max:1000',
            'achievements' => 'nullable|string|max:1000',
            'whatsapp' => 'nullable|string|max:20',
            'linkedin' => 'nullable|url|max:255',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:5048',
            'other' => 'nullable|string|max:1000',
        ]);

        $profile = Auth::user()->dosenProfile;

        if (!$profile) {
            $profile = new DosenProfile();
            $profile->user_id = Auth::id();
        }

        // Handle image upload
        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($profile->img && Storage::exists('public/profile/' . $profile->img)) {
                Storage::delete('public/profile/' . $profile->img);
            }

            $image = $request->file('img');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile', $imageName);
            $profile->img = $imageName;
        }

        $profile->bio = $request->bio;
        $profile->nip = $request->nip;
        $profile->nidn = $request->nidn;
        $profile->position = $request->position;
        $profile->rank = $request->rank;
        $profile->group = $request->group;
        $profile->education = $request->education;
        $profile->expertise = $request->expertise;
        $profile->google_scholar = $request->google_scholar;
        $profile->scopus_id = $request->scopus_id;
        $profile->sinta_id = $request->sinta_id;
        $profile->research_interests = $request->research_interests;
        $profile->achievements = $request->achievements;
        $profile->whatsapp = $request->whatsapp;
        $profile->linkedin = $request->linkedin;
        $profile->other = $request->other;

        $profile->save();

        return redirect()->route('dosen.profile.index')->with('success', 'Profile updated successfully');
    }
}
