<x-admin-layout>
    <x-slot name="title">
        Profile Dosen
    </x-slot>

    @include('layouts.admin.alert')

    <div class="card">
        <div class="card-body">
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="text-center mb-4">
                        @if ($profile && $profile->img)
                            <img src="{{ asset('storage/profile/' . $profile->img) }}" alt="Profile Image"
                                class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('assets/profile/default.png') }}" alt="Default Profile"
                                class="img-fluid rounded-circle"
                                style="width: 200px; height: 200px; object-fit: cover;">
                        @endif
                    </div>
                </div>
                <div class="col-md-8">
                    <form action="{{ route('dosen.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="img">Profile Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="img" name="img">
                                <small class="form-text text-muted">Max size: 2MB. Allowed formats: JPG, JPEG,
                                    PNG</small>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nip">NIP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip" name="nip"
                                    value="{{ $profile->nip ?? old('nip') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nidn">NIDN<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nidn" name="nidn"
                                    value="{{ $profile->nidn ?? old('nidn') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="position">Jabatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $profile->position ?? old('position') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rank">Pangkat<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="rank" name="rank"
                                    value="{{ $profile->rank ?? old('rank') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="group">Golongan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="group" name="group"
                                    value="{{ $profile->group ?? old('group') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="bio">Tentang<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="bio" name="bio" rows="3">{{ $profile->bio ?? old('bio') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="education">Pendidikan<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="education" name="education" rows="3">{{ $profile->education ?? old('education') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="expertise">Bidang Keahlian<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="expertise" name="expertise" rows="3">{{ $profile->expertise ?? old('expertise') }}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="google_scholar">Google Scholar<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="google_scholar" name="google_scholar"
                                    value="{{ $profile->google_scholar ?? old('google_scholar') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="scopus_id">Scopus ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="scopus_id" name="scopus_id"
                                    value="{{ $profile->scopus_id ?? old('scopus_id') }}">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="sinta_id">SINTA ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sinta_id" name="sinta_id"
                                    value="{{ $profile->sinta_id ?? old('sinta_id') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="research_interests">Minat Penelitian<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="research_interests" name="research_interests" rows="3">{{ $profile->research_interests ?? old('research_interests') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="achievements">Pencapaian<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="achievements" name="achievements" rows="3">{{ $profile->achievements ?? old('achievements') }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="whatsapp">WhatsApp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    value="{{ $profile->whatsapp ?? old('whatsapp') }}">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="linkedin">LinkedIn<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ $profile->linkedin ?? old('linkedin') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="other">Lainnya</label>
                                <textarea class="form-control" id="other" name="other" rows="3">{{ $profile->other ?? old('other') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
