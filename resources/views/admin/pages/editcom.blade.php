@extends("admin.main")


@section('content')


    <div class="container-fluid">

        <form action="" method="post">

                                              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        
            <input type="text" value="<?=$com[0]['author']?>" name="author" id=""><br>
            <input type="text" value="<?=$com[0]['text']?>" name="text" id=""><br>


            <select name="comment_id" id="" style="width: 167px;background-color: lightgrey">
                <option value="0" name="0">Disagree</option>
                <option value="1" name="1">Agree</option>

            </select><br>






            <input type="submit" ><br>
        </form>

    </div>

@endsection