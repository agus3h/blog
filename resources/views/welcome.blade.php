@extends('layouts.app')

@section('nav')
 <ul class="nav-menu nav navbar-nav">
   @foreach($kategori as $k)
    <li class="cat-3"><a href="{{route('artikel.kategori',$k->nama)}}">{{$k->nama}}</a></li>
   @endforeach
</ul>
@endsection

@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- post Atas -->
            @foreach($artikel as $ar)
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="#"><img src="{{asset('public/uploads/'.$ar->gambar)}}" height="500px" height="500px"></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="#">{{$ar->kategori->nama}}</a>
                            <span class="post-date">{{Carbon\Carbon::parse($ar->created_at)->diffForHumans()}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('artikel.detail',$ar->judul)}}">{{$ar->judul}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post Atas -->

       @endforeach
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>
            <div class="clearfix visible-md visible-lg"></div>
        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="clearfix visible-md visible-lg"></div>

                    <!-- post Content-->
                    @foreach($artikelall as $all)
                <div class="col-md-6">
                        <div class="post">
                            <a class="post-img" href="#">
                                <img src="{{asset('public/uploads/'.$all->gambar)}}"
                                    alt="" width="250px" height="250px"></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-2" href="#">{{$all->kategori->nama}}</a>
                                    <span class="post-date">{{Carbon\Carbon::parse($all->created_at)->diffForHumans()}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('artikel.detail',$all->judul)}}">{{$all->judul}}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- /post Content -->

                    <div class="clearfix visible-md visible-lg"></div>
                </div>
            </div>
            
            <div class="col-md-4">
                <!-- post widget Terkait -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>
                    @foreach($artikelread as $ar)
                    <div class="post post-widget">
                        <a class="post-img" href="#">
                             <img src="{{asset('public/uploads/'.$ar->gambar)}}"
                                    alt="" width="75px" height="75px"></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="{{route('artikel.detail',$ar->judul)}}">{{$ar->judul}}</a></h3>
                        </div>
                    </div>
                      @endforeach
                </div>
            </div>
          
        </div>
        <!-- /row Terkait -->
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