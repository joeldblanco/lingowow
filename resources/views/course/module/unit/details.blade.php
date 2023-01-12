<x-app-layout>
    <div class="bg-white font-sans" x-data="{ addUser: false }" x-cloak>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">

                <div class="w-full flex text-gray-500">
                    Bread / Crumbs
                </div>

                <div class="mt-10 mb-20">
                    <h2 class="text-3xl font-bold text-center text-gray-500 mb-12">Participants ({{ count($users) }})
                    </h2>
                    @role('admin')
                        <div class="w-full flex justify-end mb-6">
                            <button @click="addUser = true"
                                class="text-center leading-10 text-3xl font-bold text-white capitalize rounded-full bg-lw-blue w-10 mr-10 hover:bg-lw-light_blue">+</button>
                        </div>
                    @endrole
                    <table class="text-left w-full border-collapse">
                        <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Username</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Name</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Email</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                    Role</th>
                                <th
                                    class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-600 border-b border-gray-400">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-200">
                                    <td class="py-4 px-6 border-b border-gray-400"><a
                                            href="{{ route('profile.show', $user->id) }}"
                                            class="hover:text-blue-600 hover:underline">{{ $user->username }}</a></td>
                                    <td class="py-4 px-6 border-b border-gray-400">{{ $user->first_name }}
                                        {{ $user->last_name }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400">{{ $user->email }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 capitalize">
                                        {{ $user->getRoleNames()->first() }}</td>
                                    <td class="py-4 px-6 border-b border-gray-400 text-gray-500">
                                        <a href="#" title="Edit"><i class="fas fa-cog m-1"></i></a>
                                        <a href="#" title="Unenrol"><i class="fas fa-trash m-1"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>

        <livewire:unit.add-user :unit_id="$unit_id"/>

    </div>
</x-app-layout>
