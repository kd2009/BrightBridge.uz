@extends("admin.main")

@section('content')

    <div class="container-fluid">
        <div class="category-tab"><!--category-tab-->

            <div class="tab-content">

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <br>
                <div class="col-lg-12">
                    <button class="btn btn-default" style="margin-top: 5px;">
                        <a href="{{route('addnews')}}"><font color="black">Add News</font></a>
                    </button>
                    <p class="help-block text-danger"></p>

                    <!-- Table for company listing -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Img</th>
                                <th>Id</th>
                                <th>Title</th>
                                <th>About</th>
                                <th>Info</th>
                                <th>YouTube</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($news as $item)
                            <?php $category = \App\Newscategory::where(['id' => $item->cat_id])->first(); ?>

                                <tr>
                                    <td>
                                        <img style="width: 50px;height: 50px;border-radius: 50%;" src="../{{ $item->img }}">
                                    </td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->about }}</td>
                                    <td>{{ $item->info }}</td>
                                    <td>{{ $item->youtube }}</td>
                                    <td>{{ $category->title ?? 'No Category' }}</td>
                                    <td>
                                        <!-- Edit and Delete buttons in the same row -->
                                        <a href="{{route('editnews',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('dellnews',['id'=>$item->id])}}" class="btn btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this news?');">
                                           Delete
                                        </a>
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
