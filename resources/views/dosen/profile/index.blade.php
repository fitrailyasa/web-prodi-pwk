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
                                    value="{{ $profile->nip ?? old('nip') }}" placeholder="198005172009031001">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="nidn">NIDN<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nidn" name="nidn"
                                    value="{{ $profile->nidn ?? old('nidn') }}" placeholder="0110058801">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="position">Jabatan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $profile->position ?? old('position') }}" placeholder="Dosen">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="group">Golongan<span class="text-danger">*</span></label>
                                <select class="form-control" id="group" name="group" required>
                                    <option value="">-- Pilih Golongan --</option>
                                    <option value="I"
                                        {{ ($profile->group ?? old('group')) == 'I' ? 'selected' : '' }}>Golongan I
                                    </option>
                                    <option value="II"
                                        {{ ($profile->group ?? old('group')) == 'II' ? 'selected' : '' }}>Golongan II
                                    </option>
                                    <option value="III"
                                        {{ ($profile->group ?? old('group')) == 'III' ? 'selected' : '' }}>Golongan
                                        III</option>
                                    <option value="IV"
                                        {{ ($profile->group ?? old('group')) == 'IV' ? 'selected' : '' }}>Golongan IV
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="rank">Pangkat<span class="text-danger">*</span></label>
                                <select class="form-control" id="rank" name="rank" required>
                                    <option value="">-- Pilih Pangkat --</option>
                                    <!-- Options akan diisi lewat JS -->
                                </select>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="bio">Tentang<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Tuliskan tentang diri Anda...">{{ $profile->bio ?? old('bio') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="education">Pendidikan<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="education" name="education" rows="3" placeholder="Tuliskan riwayat pendidikan Anda...">{{ $profile->education ?? old('education') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="expertise">Bidang Keahlian<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="expertise" name="expertise" rows="3" placeholder="Tuliskan bidang keahlian Anda...">{{ $profile->expertise ?? old('expertise') }}</textarea>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="google_scholar">Google Scholar<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="google_scholar" name="google_scholar"
                                    value="{{ $profile->google_scholar ?? old('google_scholar') }}" placeholder="https://scholar.google.com/citations?user=1234567890">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="scopus_id">Scopus ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="scopus_id" name="scopus_id"
                                    value="{{ $profile->scopus_id ?? old('scopus_id') }}" placeholder="1234567890abcdef">
                            </div>

                            <div class="form-group col-md-4">
                                <label for="sinta_id">SINTA ID<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sinta_id" name="sinta_id"
                                    value="{{ $profile->sinta_id ?? old('sinta_id') }}" placeholder="98765432">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="research_interests">Minat Penelitian<span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="research_interests" name="research_interests" rows="3" placeholder="Tuliskan minat penelitian Anda...">{{ $profile->research_interests ?? old('research_interests') }}</textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="achievements">Pencapaian<span class="text-danger">*</span></label>
                                <textarea class="form-control" id="achievements" name="achievements" rows="3" placeholder="Tuliskan pencapaian Anda...">{{ $profile->achievements ?? old('achievements') }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="whatsapp">WhatsApp<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                                    value="{{ $profile->whatsapp ?? old('whatsapp') }}" placeholder="+6281234567890">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="linkedin">LinkedIn<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ $profile->linkedin ?? old('linkedin') }}" placeholder="https://linkedin.com/in/username">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="other">Lainnya</label>
                                <textarea class="form-control" id="other" name="other" rows="3" placeholder="Tuliskan informasi lainnya...">{{ $profile->other ?? old('other') }}</textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    const pangkatOptions = {
        I: [
            {value: 'I/a', text: 'I/a - Juru'},
            {value: 'I/b', text: 'I/b - Juru Tingkat I'},
            {value: 'I/c', text: 'I/c - Juru Muda'},
            {value: 'I/d', text: 'I/d - Juru Muda Tingkat I'}
        ],
        II: [
            {value: 'II/a', text: 'II/a - Pengatur Muda'},
            {value: 'II/b', text: 'II/b - Pengatur Muda Tingkat I'},
            {value: 'II/c', text: 'II/c - Pengatur'},
            {value: 'II/d', text: 'II/d - Pengatur Tingkat I'}
        ],
        III: [
            {value: 'III/a', text: 'III/a - Penata Muda'},
            {value: 'III/b', text: 'III/b - Penata Muda Tingkat I'},
            {value: 'III/c', text: 'III/c - Penata'},
            {value: 'III/d', text: 'III/d - Penata Tingkat I'}
        ],
        IV: [
            {value: 'IV/a', text: 'IV/a - Pembina'},
            {value: 'IV/b', text: 'IV/b - Pembina Tingkat I'},
            {value: 'IV/c', text: 'IV/c - Pembina Utama Muda'},
            {value: 'IV/d', text: 'IV/d - Pembina Utama Madya'},
            {value: 'IV/e', text: 'IV/e - Pembina Utama'}
        ]
    };

    const groupSelect = document.getElementById('group');
    const rankSelect = document.getElementById('rank');

    function populateRanks(selectedGroup, selectedRank = '') {
        rankSelect.innerHTML = '<option value="">-- Pilih Pangkat --</option>';
        if (selectedGroup && pangkatOptions[selectedGroup]) {
            pangkatOptions[selectedGroup].forEach(pangkat => {
                const option = document.createElement('option');
                option.value = pangkat.value;
                option.textContent = pangkat.text;
                if (pangkat.value === selectedRank) {
                    option.selected = true;
                }
                rankSelect.appendChild(option);
            });
            rankSelect.disabled = false;
        } else {
            rankSelect.disabled = true;
        }
    }

    groupSelect.addEventListener('change', function() {
        populateRanks(this.value);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const selectedGroup = groupSelect.value;
        const selectedRank = "{{ $profile->rank ?? old('rank') ?? '' }}";
        populateRanks(selectedGroup, selectedRank);
    });
</script>
</x-admin-layout>
