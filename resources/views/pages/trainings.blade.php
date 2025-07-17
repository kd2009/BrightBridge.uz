@extends("main2.main")

@section("content")

<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3>Trainings</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ bradcam_area -->

<!-- Trainings Videos Section -->
<div class="featured_candidates_area candidate_page_padding">
    <div class="container">
        <div class="row g-1 justify-content-start">
            @foreach ($trainings as $training) 
                @php
                    preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]{11})/', 
                               $training->youtube, $matches);
                    $youtubeID = $matches[1] ?? '';
                @endphp

                <div class="col-12 col-md-6 d-flex justify-content-start">
                    <div class="single_candidates">
                        <div class="video-container">
                            <iframe 
                                src="https://www.youtube.com/embed/{{ $youtubeID }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        </div> 
                        <h4>{{ $training->title }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination Controls -->
        <div class="d-flex justify-content-center mt-4">
            {{ $trainings->links() }}
        </div>
    </div>
</div>

<style>
    .featured_candidates_area {
        max-width: 1400px;
        margin: 0 auto;
    }

    .single_candidates {
        width: 100%;
        max-width: 600px;
        min-height: 450px;
        padding: 15px;
        background: white;
        border-radius: 10px;
        box-shadow: none;
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
    }

    .video-container {
        width: 100%;
        aspect-ratio: 16 / 9;
        background: #000;
        border-radius: 10px;
        overflow: hidden;
    }

    .video-container iframe {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 10px;
    }

    h4 {
        font-size: 22px;
        font-weight: bold;
        color: #333;
        margin-top: 10px;
        text-align: center;
    }

    body {
        background-color: #F9F9F9 !important;
    }
</style>

@endsection
