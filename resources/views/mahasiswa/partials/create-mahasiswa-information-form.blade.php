<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Tambah Mahasiswa') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Isi Data Mahasiswa") }}
        </p>
    </header>

    <form method="post" action="{{ route('mahasiswa.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="nim" :value="__('NIM')" />
            <x-text-input id="nim" name="nim" type="text" class="mt-1 block w-full"  required autofocus autocomplete="nim" />
        </div>

        <div>
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full"  required  autocomplete="nama" />
        </div>
        <div class="col-sm-10">
            <x-input-label for="gender" :value="__('Gender')" />
                <select class="form-control select2" name="gender" id="gender" style="width: 100%;">
                    <option value="Laki-Laki" {{ old('gender') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                    </option>
                    <option value="Perempuan"
                        {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                @error('gender')
                    <small class="text-danger font-italic">{{ $message }}</small>
                @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="submit">{{ __('Save') }}</x-primary-button>

            <!-- @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif -->
        </div>
    </form>
</section>
