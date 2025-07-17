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
                        <a href="{{route('addtrainings')}}"><font color="black">Add Trainings</font></a>
                    </button>
                    <p class="help-block text-danger"></p>

                    <!-- Table for company listing -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Id</th>
                                <th>Title</th>
                                <th>YouTube</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainings as $item)

                                <tr>
                                   
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                   <td style="width: 300px;">
    @php
        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', 
                   $item->youtube, $matches);
        $youtubeID = $matches[1] ?? '';
    @endphp
    @if ($youtubeID)
        <iframe width="100%" height="170" 
                src="https://www.youtube.com/embed/{{ $youtubeID }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
    @else
        <p>No video available</p>
    @endif
</td>

                                    <td>
                                        <!-- Edit and Delete buttons in the same row -->
                                        <a href="{{route('edittrainings',['id'=>$item->id])}}" class="btn btn-warning">Edit</a>
                                        <a href="{{route('delltrainings',['id'=>$item->id])}}" class="btn btn-danger"
                                           onclick="return confirm('Are you sure you want to delete this training?');">
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
