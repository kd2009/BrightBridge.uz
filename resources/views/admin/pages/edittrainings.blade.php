@extends("admin.main")

@section("content")
    <div class="col-sm-4">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form_group">
                <label for="title">Title</label><br />
                <input type="text" name="title" class="form-control" value="{{ $news->title ?? '' }}" />
            </div>
            
            <div class="form_group">
                <label for="youtube">YouTube Link</label><br />
                <input type="text" name="youtube" class="form-control" value="{{ $news->youtube ?? '' }}" />
            </div> 
            
            <div class="form_group">
                <button type="submit" class="btn btn-default" style="margin-top: 5px;">Submit</button>
            </div>
        </form>
    </div>
@endsection
