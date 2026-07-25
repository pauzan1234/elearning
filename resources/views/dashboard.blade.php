<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">



        <div class="max-w-7xl mx-auto py-8 px-4">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">
                        Manajemen Pengguna
                    </h1>
                    <p class="text-gray-500">
                        Daftar seluruh pengguna sistem.
                    </p>
                </div>

                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
                    + Tambah Pengguna
                </a>
            </div>
            @php
                $users = [
                    (object) [
                        'id' => 1,
                        'name' => 'Andi Saputra',
                        'email' => 'andi@mail.com',
                        'created_at' => now(),
                    ],
                    (object) [
                        'id' => 2,
                        'name' => 'Budi Santoso',
                        'email' => 'budi@mail.com',
                        'created_at' => now(),
                    ],
                    (object) [
                        'id' => 3,
                        'name' => 'Citra Lestari',
                        'email' => 'citra@mail.com',
                        'created_at' => now(),
                    ],
                ];
            @endphp
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-300 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-xl shadow overflow-hidden">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                No
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Nama
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Email
                            </th>

                            <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Dibuat
                            </th>

                            <th class="px-6 py-3 text-center text-sm font-semibold text-gray-700">
                                Aksi
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    {{ $loop->iteration }}
                                </td>

                                <td class="px-6 py-4 font-medium">
                                    {{ $user->name }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>

                                <td class="px-6 py-4">
                                    {{ $user->created_at->format('d M Y') }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="#"
                                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm">
                                            Edit
                                        </a>
                                        {{--
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                                                Hapus
                                            </button>

                                        </form>
--}}
                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="text-center py-8 text-gray-500">
                                    Belum ada data pengguna.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-5">
                {{--
                {{ $users->links() }}
                 --}}
            </div>

        </div>

    </div>
</x-app-layout>
