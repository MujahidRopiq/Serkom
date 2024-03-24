<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('MAHASISWA') }}
        </h2>
    </x-slot>

<div class="flex justify-between gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8" style="padding-top: 3rem !important;">
    <!-- Button -->
    <div style="display: flex; flex-direction: column; justify-content: flex-end; padding-bottom: 4px !important;">
    <x-primary-button class="">
        <a href="{{ route('mahasiswa.create') }}" style="font-size: 14px;">Tambah Mahasiswa</a>
    </x-primary-button>
</div>

    <!-- Input field -->
    <div class="flex-1 ml-3">
        <x-input-label for="search" :value="__('Search')" />
        <form action="/" method="GET">
        <x-text-input id="search" name="search" type="text" class="mt-1 block w-full" />
        </form>
    </div>
</div>

    <div class="py-3"  style="padding-top: 12px !important;">
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
