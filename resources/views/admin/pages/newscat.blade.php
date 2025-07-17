@extends("admin.main")

@section('content')

    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->
                <button class="btn btn-default" style="margin-top: 5px;"><a href="{{route('addnewscat')}}"><font color="black">Add a Category</font></a></button>

            <div class="tab-content">
               <br>
                <div class="col-lg-12">
                    <!-- Table for job listing -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)

                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
</td>
                                    <td>
                                        <!-- Edit and Delete buttons in the same row -->
                                        <a href="{{route('editnewscat',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('dellnewscat',['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!--/category-tab-->

        </div>
    </div>

@endsection

