<div class="container w-3/4 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">

    <section class="bg-white shadow my-2 text-center">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-500 text-2xl italic font-bold">
            {{__('list of users')}}
        </div>
    </section>
    <section class="bg-white shadow my-2 text-center flex items-center justify-between p-3 text-sm flex-wrap">
        <div class="p-3">
            <input type="text" class="w-content rounded" placeholder="search" wire:model="search">
        </div>
        <div class="p-3">
            @livewire('master.users.create-user')
        </div>
    </section>
       <x-table>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Users
                    </th>

                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user )
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="flex items-center">
                          <div class="flex-shrink-0 h-10 w-10">
                            <img class="h-10 w-10 rounded-full" src="{{$user->profile_photo_url}}" alt="{{$user->name}}">
                          </div>
                          <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">
                            {{$user->name}}
                            </div>
                            <div class="text-sm text-gray-500">
                            {{$user->email}}
                            </div>
                          </div>
                        </div>
                      </td>
                    <td class="px-6 py-4 text-justify has-tooltip">
                        <div class="text-sm text-gray-900">
                            @forelse ($user->roles as $role)
                                <p>{{$role->name}}</p>
                            @empty
                              No hay
                            @endforelse
                        </div>

                    </td>

                    <td class="px-6 py-4  text-right text-sm font-medium">
                        <a href="javascript:void(0)" class="text-indigo-600 hover:text-indigo-900 has-tooltip" wire:click="edit({{$user}})">
                            <i class="fas fa-highlighter fa-2x"></i>
                            <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Edit the
                                Role</span>
                        </a>

                        <a href="javascript:void(0)" class="text-red-600 hover:text-red-900 has-tooltip eliminar" wire:click="deleteConfirm({{$user->id}})">
                            <i class="fas fa-backspace fa-2x"></i>
                            <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Delete the
                                Role</span>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="my-2">
            {{$users->links()}}
        </div>
       </x-table>
</div>
