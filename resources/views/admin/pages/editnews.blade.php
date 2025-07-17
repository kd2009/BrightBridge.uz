@extends("admin.main")

@section('content')

    <div class="container-fluid">

        <form action="" method="post" enctype="multipart/form-data">
            @csrf
         

            <!-- Hidden ID field -->
            <input type="hidden" name="id" value="{{ $news->id }}">

            <input style="width:300px;" type="text" placeholder="Title" name="title" value="{{ old('title', $news->title) }}" required class="form-control">

            <!-- Replaced input with textarea for larger text fields -->
            <textarea style="width:80%; height:100px;" placeholder="About" name="about" required class="">{{ old('about', $news->about) }}</textarea>
            <textarea style="width:80%; height:300px;" placeholder="Info" name="info" required class="">{{ old('info', $news->info) }}</textarea>

            <br>Picture <br>
            <input style="width:300px;" type="file" name="img" class="form-control"><br>
            @if($news->img)
                <img src="{{ asset($news->img) }}" alt="Current Image" style="width: 100px; height: 100px; border-radius: 50%;"><br>
            @endif
            <p class="help-block text-danger"></p>

            <!-- YouTube input with embedded preview -->
            <input style="width:100%;" type="text" placeholder="YouTube Link" name="youtube" value="{{ old('youtube', $news->youtube) }}" class="form-control">

            @if($news->youtube)
                @php
                    // Extract video ID from YouTube URL
                    parse_str(parse_url($news->youtube, PHP_URL_QUERY), $youtubeParams);
                    $youtubeId = $youtubeParams['v'] ?? null;
                @endphp

                @if($youtubeId)
                    <br>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $youtubeId }}" frameborder="0" allowfullscreen></iframe>
                @endif
            @endif

            <br>

            <select name="cat_id" class="form-control" required style="width: 24%;">
                <option value="">Job Category</option>
                @foreach($cat as $item)
                    <option value="{{ $item->id }}" {{ $news->cat_id == $item->id ? 'selected' : '' }}>
                        {{ $item->title }}
                    </option>
                @endforeach
            </select>

            <input type="submit" value="Update" class="btn btn-default"><br>
        </form>

    </div>

@endsection
