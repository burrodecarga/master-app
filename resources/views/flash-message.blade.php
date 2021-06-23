
    @if ($message = Session::get('success'))
    <div class="my-2 bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('error'))
    <div class="my-2 bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('warning'))
    <div class="my-2 bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-warning alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($message = Session::get('info'))
    <div class="my-2 bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-info alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif


    @if ($errors->any())
    <div class="my-2 bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Please check the form below for errors
    </div>
    @endif
