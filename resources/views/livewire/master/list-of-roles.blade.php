<div class="container w-1/2 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">

    <section class="bg-white shadow my-2 text-center">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-gray-500 text-2xl italic font-bold">
           {{__('list of roles')}}
        </div>
    </section>

 @foreach ($roles as $role )
<x-table>
  <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Users
                </th>

                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
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
                      <h2 x-on:click="open = ! open" class="cursor-pointer hover:text-green-500 has-tooltip">List of user</h2> <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Click to List of User</span>
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
                  <a href="#" class="text-indigo-600 hover:text-indigo-900 has-tooltip" >
                    <i class="fas fa-highlighter fa-2x"></i>
                    <span class='tooltip rounded shadow-lg p-1 bg-gray-100 text-red-500 -mt-8'>Edit the Role</span>
                </a>
                </td>
              </tr>
            </tbody>
          </table>
</x-table>
    @endforeach
    <div class="my-2">
    {{$roles->links()}}
</div>
</div>

<x-role-modal-form></x-role-modal-form>

