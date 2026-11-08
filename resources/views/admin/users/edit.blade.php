<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-950 leading-tight">
            {{ __('Ubah Data Pengguna & Penetapan Role') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50/30 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-xl p-8 border border-blue-100">
                
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-medium text-blue-950 mb-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-blue-950 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-blue-950 mb-1">Penetapan Role</label>
                        <select name="role" class="w-full rounded-lg border-blue-200 shadow-sm border p-2.5 focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                            <option value="">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ ucfirst($role->name) }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="bg-blue-900 hover:bg-blue-800 text-white font-semibold py-2.5 px-6 rounded-lg shadow transition">Simpan Perubahan</button>
                        <a href="{{ route('admin.users.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2.5 px-6 rounded-lg shadow transition">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>