@extends("admin.main")

@section('content')

    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Title Input -->
            <input style="width:300px;" type="text" placeholder="Title" name="title" required class="form-control">

            

            <!-- Optional YouTube Link Input -->
            <input style="width:300px;" type="url" placeholder="YouTube Link" name="youtube" class="form-control">

            <!-- Submit Button -->
            <input style="width:300px;" type="submit" class="button" value="Submit">

        </form>
    </div>

@endsection
