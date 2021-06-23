<x-app-layout>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
    <div class="container w-50 rounded mx-auto my-4 p-6 sm:px-20 bg-white border-b border-gray-200 h-auto">

        <div class="flex items-center justify-between">
            <div>
               <h1 class="text-center text-xl font-bold text-gray-500 my-2">{{__('List of users')}}</h1>

            </div>
            <div>
                <a href="{{route('users.create')}}" title="{{__('add new record')}}" class="btn btn-outline-primary hover:bg-white hover:text-white"><i class="fa fa-plus-circle"></i></a>
            </div>
        </div>

        <table id="users" class="table table-striped table-bordered text-sm" style="width:100%">
            <thead>
                <tr>
                    <th width="10%">Id</th>
                    <th width="40%">Name</th>
                    <th width="30%">Email</th>
                    <th width="20%">{{_('actions')}}</th>
                </tr>
            </thead>
            <tbody>


            </tbody>
            <tfoot>
                <tr>
                    <th width="10%">Id</th>
                    <th width="40%">Name</th>
                    <th width="30%">Email</th>
                    <th width="20%">{{_('actions')}}</th>
            </tfoot>
        </table>
    </div>




    <script src="{{ asset('js/jquery-3.5.1.js') }}" ></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>

    {{-- <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script> --}}
<script>
    $(document).ready(function() {
    $('#users').DataTable({
        columnDefs: [{ "targets": [3], "orderable": false }],
         stateSave: true,
         serverSide:true,
         ajax:"{{url('api/users')}}",
         columns:[
             {data:"id"},
             {data:"name"},
             {data:"email"},
             {data:"btn"}

         ]
    });


   $('.borrar-user').submit(function(e){
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
