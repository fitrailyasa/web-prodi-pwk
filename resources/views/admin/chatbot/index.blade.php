<x-admin-table>

    <!-- Title -->
    <x-slot name="title">
        Chatbot
    </x-slot>

    <!-- Button Form Create -->
    <x-slot name="formCreate">
        @include('admin.chatbot.create')
    </x-slot>

    <!-- Button Delete All -->
    <x-slot name="deleteAll">
        {{-- @include('admin.chatbot.deleteAll') --}}
    </x-slot>

    <!-- Search & Pagination -->
    <x-slot name="search">
        @include('layouts.admin.search')
    </x-slot>

    <!-- Table -->
    <table id="" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>{{ __('No') }}</th>
                <th>{{ __('Pertanyaan') }}</th>
                <th>{{ __('Kata Kunci') }}</th>
                <th>{{ __('Jawaban') }}</th>
                <th class="text-center">{{ __('Aksi') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chatbots as $chatbot)
                <tr @if ($chatbot) class="text-muted" @endif>
                    <td>{{ $counter++ }}</td>
                    <td>{{ $chatbot->question_text }}</td>
                    <td>{{ $chatbot->keywords }}</td>
                    <td>
                        <ul class="list-unstyled mb-0">
                            @foreach ($chatbot->answers as $answer)
                                <li>{{ $answer->answer_text }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="manage-row text-center">
                        @if (auth()->user()->role == 'admin')
                            <!-- Edit and Delete Buttons -->
                            @include('admin.chatbot.edit')
                            @include('admin.chatbot.delete')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $chatbots->appends(['perPage' => $perPage, 'search' => $search])->links() }}
</x-admin-table>
