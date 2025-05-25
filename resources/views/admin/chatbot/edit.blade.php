<!-- Tombol untuk membuka modal -->
<button role="button" class="btn btn-sm m-1 btn-warning" data-bs-toggle="modal"
    data-bs-target=".formEdit{{ $chatbot->id }}">
    <i class="fas fa-edit"></i><span class="d-none d-sm-inline"> {{ __('Edit') }}</span>
</button>

<!-- Modal -->
<div class="modal fade formEdit{{ $chatbot->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            @if (auth()->user()->role == 'admin')
                <form method="POST" action="{{ route('admin.chatbot.update', $chatbot->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormLabel">{{ __('Edit Data') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-left">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Pertanyaan') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text"
                                        class="form-control @error('question_text') is-invalid @enderror"
                                        placeholder="Pertanyaan" name="question_text"
                                        value="{{ old('question_text', $chatbot->question_text) }}" required>
                                    @error('question_text')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Kata Kunci') }}<span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                                        placeholder="Kata kunci (pisahkan dengan koma)" name="keywords"
                                        value="{{ old('keywords', $chatbot->keywords) }}" required>
                                    @error('keywords')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('Jawaban') }}<span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control @error('answers') is-invalid @enderror" placeholder="Jawaban (satu per baris)"
                                        name="answers[]" rows="5" required>{{ old('answers', $chatbot->answers->pluck('answer_text')->implode("\n")) }}</textarea>
                                    @error('answers')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('Tutup') }}</button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> {{ __('Simpan') }}
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</div>
