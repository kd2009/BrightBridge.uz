@extends("main2.main2")

@section("content")
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Category news

                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        
<?php foreach ($blog as $item) { 
    // Extract day and month from created_at timestamp
    $date = strtotime($item->created_at);
    $day = date('d', $date);  // Day as two digits
    $month = date('M', $date); // Month as abbreviated name (e.g., Jan, Feb)
?>

    <article class="blog_item">
        <div class="blog_item_img">
            <img class="card-img rounded-0" src="../<?=$item->img?>" alt="">
            <a href="{{ route('single-blog', ['id' => $item->id]) }}" class="blog_item_date">
                <h3><?=$day?></h3>
                <p><?=$month?></p>
            </a>
        </div>

        <div class="blog_details">
            <a class="d-inline-block" href="{{ route('single-blog', ['id' => $item->id]) }}">
               <h2><?=$item->title?></h2>
            </a>
            <?=$item->about?>
        </div>
    </article>

<?php } ?>




                     

                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                       
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                               <?foreach ($category as $item) {?>

                                <li>

                                    <a href="{{route('newscategory',['id'=>$item->id])}}" class="d-flex">
                                        <p><?=$item->title?></p>
                                    </a>
                                </li>
                               
<?                               }?>
   <li>

                                    <a href="{{route('blogpost')}}" class="d-flex">
                                        <p>All news</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                   <aside class="single_sidebar_widget popular_post_widget">
                    <h3 class="widget_title">Recent Post</h3>
                    @foreach ($recentPosts as $post)
                        <div class="media post_item">
                            <!-- Correct image path -->
                            <img src="{{ asset($post->img) }}" alt="post" style="width: 50px;height: 50px;object-fit: contain;">
                            <div class="media-body">
                                <a href="{{ route('single-blog', ['id' => $post->id]) }}">
                                    <h3>{{ $post->title }}</h3>
                                </a>
                                <p>{{ $post->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                    @endforeach
               </aside> 



                        
                    </div>
                </div>
            </div>
        </div>
    </section>
 @endsection