<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MAHASISWA') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding-bottom: 7px !important;">
    <x-primary-button class=""><a href="{{ route('mahasiswa.create') }}" style="font-size: 14px;">Tambah Mahasiswa</a></x-primary-button>
    </div>
    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th class="text-left p-4">NIM</th>
                            <th class="text-left p-4">Nama</th>
                            <th class="text-left p-4">Gender</th>
                            <th class="text-left p-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $data)
                        <tr>
                            <td class="text-left p-4">{{ $data->nim }}</td>
                            <td class="text-left p-4">{{ $data->nama }}</td>
                            <td class="text-left p-4">{{ $data->gender }}</td>
                            <td class="text-right p-4">
                            <x-primary-button><a href="{{ route('mahasiswa.edit', $data->id) }}">Edit</a></x-primary-button>
                                <form action="{{ route('mahasiswa.destroy', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <x-danger-button type="submit">Delete</x-danger-button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
