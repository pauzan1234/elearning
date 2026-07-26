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

                <a href="#" onclick="openModal()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
                    + Tambah Pengguna
                </a>
            </div>

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
            <!-- Modal -->
            <div id="userModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

                <div class="bg-white rounded-xl shadow-lg w-full max-w-lg p-6">

                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold">Tambah Pengguna</h2>

                        <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 text-2xl">
                            &times;
                        </button>
                    </div>

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Nama</label>
                            <input type="text" name="name"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Email</label>
                            <input type="email" name="email"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-1 font-medium">Role</label>
                            <select name="role"
                                class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500">
                                <option>Admin</option>
                                <option>Dosen</option>
                                <option>Mahasiswa</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label>Password</label>

                            <input type="password" name="password" class="w-full border rounded-lg px-3 py-2">
                        </div>
                        <div class="flex justify-end gap-2 mt-6">
                            <button type="button" onclick="closeModal()"
                                class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">
                                Batal
                            </button>

                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            <script>
                function openModal() {
                    const modal = document.getElementById('userModal');
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                }

                function closeModal() {
                    const modal = document.getElementById('userModal');
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }
            </script>
            <div class="mt-5">
                {{--
                {{ $users->links() }}
                 --}}
            </div>

        </div>

    </div>
</x-app-layout>
