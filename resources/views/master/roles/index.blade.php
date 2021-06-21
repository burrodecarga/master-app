<x-app-layout>

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <div class="container w-50 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">

        <div class="flex items-center justify-between">
            <div>
               <h1 class="text-center text-xl font-bold text-gray-500 my-2">{{__('List of Roles')}}</h1>

            </div>
            <div>
                <a href="{{route('roles.create')}}" title="{{__('add new record')}}" class="btn btn-outline-primary hover:bg-white hover:text-white"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>

        <table id="roles" class="table table-striped table-bordered text-sm" style="width:100%">
            <thead>
                <tr>
                    <th width="50%">Name</th>
                    <th width="30%">users</th>
                    <th width="20%">{{_('actions')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role )
                   <tr>
                    <td>{{$role->name}}</td>
                    <td>{{$role->users->count()}}</td>
                    <td class="text-center flex items-center justify-between">
                        <a href="{{route('roles.edit',$role->id)}}"
                            class="btn btn-outline-primary text-capitalize" data-toggle="tooltip"
                            data-placement="top" title="{{__('Edit record')}} ">

                            <i class="fa fa-pen" aria-hidden="true"></i>
                        </a>

                        <form id="delete-form{{$role->id}}" action="{{route('roles.destroy',$role->id)}}"
                            method="POST"  class="borrar-role">
                            @csrf
                            @method('DELETE')
                            <button type="submit" role="button"
                            class="btn btn-outline-danger text-capitalize"
                            data-toggle="tooltip"
                            data-placement="top" title="{{__('Delete record')}} "
                            >  <i class="fa fa-trash" aria-hidden="true"
                            ></i></button>
                        </form>
                    </td>

                </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>user</th>
                    <th>{{_('actions')}}</th>
            </tfoot>
        </table>
    </div>




    <script src="{{ asset('js/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>

    {{-- <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script> --}}
<script>
    $(document).ready(function() {
    $('#roles').DataTable({
        "columnDefs": [{ "targets": [2], "orderable": false }],
         "stateSave": true
    });


   $('.borrar-role').submit(function(e){
      e.preventDefault()
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
     this.submit()
     }
})
          })




} );
</script>


</x-app-layout>
