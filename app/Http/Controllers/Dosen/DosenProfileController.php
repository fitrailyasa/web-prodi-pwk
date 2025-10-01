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
        $messages = [
            'bio.string' => 'Field Tentang harus berupa teks.',
            'bio.max' => 'Field Tentang maksimal :max karakter.',
            'nip.string' => 'Field NIP harus berupa teks.',
            'nip.max' => 'Field NIP maksimal :max karakter.',
            'nidn.string' => 'Field NIDN harus berupa teks.',
            'nidn.max' => 'Field NIDN maksimal :max karakter.',
            'rank.string' => 'Field Pangkat harus berupa teks.',
            'rank.max' => 'Field Pangkat maksimal :max karakter.',
            'group.string' => 'Field Golongan harus berupa teks.',
            'group.max' => 'Field Golongan maksimal :max karakter.',
            'education.string' => 'Field Pendidikan harus berupa teks.',
            'education.max' => 'Field Pendidikan maksimal :max karakter.',
            'expertise.string' => 'Field Bidang Keahlian harus berupa teks.',
            'expertise.max' => 'Field Bidang Keahlian maksimal :max karakter.',
            'google_scholar.url' => 'Format URL Google Scholar tidak valid.',
            'google_scholar.max' => 'Field Google Scholar maksimal :max karakter.',
            'scopus_id.string' => 'Field Scopus ID harus berupa teks.',
            'scopus_id.max' => 'Field Scopus ID maksimal :max karakter.',
            'sinta_id.string' => 'Field Sinta ID harus berupa teks.',
            'sinta_id.max' => 'Field Sinta ID maksimal :max karakter.',
            'research_interests.string' => 'Field Minat Riset harus berupa teks.',
            'research_interests.max' => 'Field Minat Riset maksimal :max karakter.',
            'achievements.string' => 'Field Prestasi harus berupa teks.',
            'achievements.max' => 'Field Prestasi maksimal :max karakter.',
            'whatsapp.string' => 'Field WhatsApp harus berupa teks.',
            'whatsapp.max' => 'Field WhatsApp maksimal :max karakter.',
            'linkedin.url' => 'Format URL LinkedIn tidak valid.',
            'linkedin.max' => 'Field LinkedIn maksimal :max karakter.',
            'img.image' => 'File harus berupa gambar.',
            'img.mimes' => 'Format gambar harus jpeg, png, atau jpg.',
            'img.max' => 'Ukuran gambar maksimal :max kilobyte.',
            'other.string' => 'Field Lainnya harus berupa teks.',
            'other.max' => 'Field Lainnya maksimal :max karakter.',
        ];

        $request->validate([
            'bio' => 'nullable|string|max:1000',
            'nip' => 'nullable|string|max:20',
            'nidn' => 'nullable|string|max:20',
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
        ], $messages);

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

        return redirect()->route('dosen.profile.index')->with('alert', 'Profile berhasil diperbarui.');
    }
}
