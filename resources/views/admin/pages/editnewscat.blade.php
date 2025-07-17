
@extends("admin.main")

@section("content")
    <div class="col-sm-4">

        <form action="" method="post" enctype="multipart/form-data">
                                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <div class="form_group">

                <div class="form_group">
                    <label for="exampleInputEmail1">Title</label><br />
                    <input type="text" name="title"  class="form-control"   value="<?=$cat[0]['title']?>"/>
                </div> 
                </div> <div class="form_group">


                <button type="submit" class="btn btn-default" style="margin-top: 5px;">Submit</button>
            </div>
        </form>





@endsection
