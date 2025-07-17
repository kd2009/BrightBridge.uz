@extends("admin.main")


@section('content')


    <div class="container-fluid">
        <form style="" action="" method="post" enctype="multipart/form-data">

            @csrf
           



                        <input  style="width:300px;" type="text" placeholder="Title" name="title" id="" ><br>
                     

        <br>

            <input  style="width:300px;" type="submit" class="button" value="Submit">

        </form>










    </div>

@endsection