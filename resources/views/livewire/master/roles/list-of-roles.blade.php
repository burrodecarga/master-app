<div class="container w-3/4 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">

    <section class="bg-white shadow my-2 text-center">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-500 text-2xl italic font-bold">
            {{__('list of roles')}}
        </div>


    </section>
    <section class="bg-white shadow my-2 text-center flex items-center justify-between p-3 text-sm flex-wrap">
        <div class="p-3">
            <input type="text" class="w-content rounded" placeholder="search">
        </div>
        <div class="p-3">
            @livewire('master.roles.create-role')
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
                @foreach ($roles as $role )
                <tr>
                    <td class="px-6 py-4 w-1/2">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 text-gray-400">
                                <i class="fas fa-user-lock fa-2x"></i>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$role->name}}

                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$role->area}}
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-justify has-tooltip">
                        <div class="text-sm text-gray-900">{{$role->users->count()}}</div>
                        <div x-data="{open: false }" class="text-sm text-gray-500">
                            <h2 x-on:click="open = ! open" class="cursor-pointer hover:text-green-500 has-tooltip">List
                                of user</h2><i class="fas fa-users cursor-pointer"  x-on:click="open = ! open"></i> <span
                                class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Click to List of
                                User</span>
                            <div x-show="open">
                                <ul>
                                    @foreach ($role->users as $u )
                                    <li>{{$u->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4  text-right text-sm font-medium">
                        <a href="javascript:void(0)" class="text-indigo-600 hover:text-indigo-900 has-tooltip" wire:click="edit({{$role}})">
                            <i class="fas fa-highlighter fa-2x"></i>
                            <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Edit the
                                Role</span>
                        </a>

                        <a href="javascript:void(0)" class="text-red-600 hover:text-red-900 has-tooltip eliminar" wire:click="deleteConfirm({{$role->id}})">
                            <i class="fas fa-backspace fa-2x"></i>
                            <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Delete the
                                Role</span>
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-table>

    <div class="my-2">
        {{$roles->links()}}
    </div>


<x-jet-dialog-modal wire:model="open_edit">
    <x-slot name="title">
        {{__('Edit Role')}}
    </x-slot>

    <x-slot name="content">

        <div class="flex flex-1 mb-4 items-center ">
            <div class="w-full">
                <x-jet-label value="Name" class="text-justify" />
                <x-jet-input type="text" wire:model="name" class="w-full" />
                <x-jet-input-error for="name"/>
            </div>

            <div class="w-full ml-3">
                <x-jet-label value="Area" class="text-justify" />
                <select class="w-full rounded" wire:model="area">
                    <option value="">Select Area</option>
                    <option value="operativa">operativa</option>
                    <option value="administrativa">administrativa</option>
                    <option value="comun">comun</option>
                </select>
                <x-jet-input-error for="area"/>
            </div>

        </div>

    </x-slot>

    <x-slot name="footer">
        <div>
            <button class="py-2 px-3 rounded bg-yellow-500 text-white hover:bg-yellow-700" wire:click="$set('open_edit',false)">
                cancelar
            </button>

            <button class="py-2 px-3 rounded bg-green-500 text-white hover:bg-green-700" wire:click="update">
               update
            </button>
        </div>
    </x-slot>
</x-jet-dialog-modal>

</div>
