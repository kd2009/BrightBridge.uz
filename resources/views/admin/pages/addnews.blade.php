@extends("admin.main")

@section('content')

    <div class="container-fluid">
        <form action="" method="post" enctype="multipart/form-data">

            @csrf

            <!-- Title Input -->
            <input style="width:300px;" type="text" placeholder="Title" name="title" required class="form-control">

            <!-- About Input -->
            <input style="width:300px;" type="text" placeholder="About" name="about" required class="form-control">

            <!-- Info Textarea -->
            <textarea class="form-control" name="info" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter full information'" placeholder="Enter full information" style="width: 40%;"></textarea>

            <!-- Picture Input -->
            Picture <br>
            <input style="width:300px;" type="file" name="img" />

            <!-- Category Select -->
            <select name="cat_id" class="form-control" required class="form-control" style="width: 24%;">
                <option value="">Job Category</option>
                @foreach($cat as $item)
                    <option value="{{ $item->id }}">{{$item->title}}</option>
                @endforeach
            </select>

            <!-- Optional YouTube Link Input -->
            <input style="width:300px;" type="url" placeholder="YouTube Link (Optional)" name="youtube" class="form-control">

            <!-- Submit Button -->
            <input style="width:300px;" type="submit" class="button" value="Submit">

        </form>
    </div>

@endsection
