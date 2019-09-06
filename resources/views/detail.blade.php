@extends('layouts.app')
@section('content')

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3>{{$artikel_detail->judul}}</h3>
                        <figure class="figure-img">
                            <img class="img-responsive" src="{{asset('public/uploads/'.$artikel_detail->gambar)}}" width="750px" height="500px">
                        </figure>
                       {!!$artikel_detail->body!!}
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="https://github.com/agus3h" class="share-facebook"><i class="fa fa-github"></i></a>
                       <!--  <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                        <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a> -->
                    </div>
                </div>


                <!-- author -->
               <!--  <div class="section-row">
                    <div class="post-author">
                        <div class="media">
                            <div class="media-left">
                                <img class="media-object" src="{{asset('public/frontend/img/author.png')}}" alt="">
                            </div>
                            <div class="media-body">
                                <div class="media-heading">
                                    <h3>John Doe</h3>
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <ul class="author-social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /author -->
            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Featured Posts</h2>
                    </div>
                    @foreach($artikel as $ar)
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{asset('public/uploads/'.$ar->gambar)}}" width="250px" height="250px"></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="#">{{$ar->kategori->nama}}</a>
                                <span class="post-date">{{Carbon\Carbon::parse($ar->created_at)->diffForHumans()}}</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('artikel.detail',$ar->judul)}}">{{$ar->judul}}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- /post widget -->

                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach($kategori as $k)
                            <li><a href="{{route('artikel.kategori',$k->nama)}}" class="cat-1">{{$k->nama}}<span>{{$k->artikel_count}}</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

@endsection


@section('catfooter')
 <ul class="footer-links">
    @foreach($kategori as $k)
    <li><a href="{{route('artikel.kategori',$k->nama)}}">{{$k->nama}}</a></li>
@endforeach
</ul>
@endsection
