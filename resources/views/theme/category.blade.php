@extends('theme.layout')

@section('title', 'Categories')

@section('categories-active', 'active')

@section('content')
    @include('theme.partials.hero', ['title' => $categoryName])
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if(count($blogs) > 0)
                            @foreach($blogs as $blog)
                                <div class="col-md-6">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0" src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                                            <ul class="thumb-info">
                                                <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                                <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                                            </ul>
                                        </div>
                                        <div class="details mt-20">
                                            <a href="{{ route('blogs.show', ['blog' => $blog]) }}">
                                                <h3>{{ $blog->name }}</h3>
                                            </a>
                                            <p>{{ $blog->description }}</p>
                                            <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More <i class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <!-- <div class="single-recent-blog-post">
                  <div class="thumb">
                    <img class="{{ asset('assets/') }}/img-fluid" src="{{ asset('assets/') }}/img/blog/blog2.png" alt="">
                    <ul class="thumb-info">
                      <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                      <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="blog-single.html">
                      <h3>Woman claims husband wants to name baby girl
                        after his ex-lover sparking.</h3>
                    </a>
                    <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                    <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                    <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                  </div>
                </div>

                <div class="single-recent-blog-post">
                  <div class="thumb">
                    <img class="{{ asset('assets/') }}/img-fluid" src="{{ asset('assets/') }}/img/blog/blog3.png" alt="">
                    <ul class="thumb-info">
                      <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                      <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="blog-single.html">
                      <h3>Tourist deaths in Costa Rica jeopardize safe dest
                        ination reputation all time. </h3>
                    </a>
                    <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                    <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                    <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                  </div>
                </div>

                <div class="single-recent-blog-post">
                  <div class="thumb">
                    <img class="{{ asset('assets/') }}/img-fluid" src="{{ asset('assets/') }}/img/blog/blog4.png" alt="">
                    <ul class="thumb-info">
                      <li><a href="#"><i class="ti-user"></i>Admin</a></li>
                      <li><a href="#"><i class="ti-notepad"></i>January 12,2019</a></li>
                      <li><a href="#"><i class="ti-themify-favicon"></i>2 Comments</a></li>
                    </ul>
                  </div>
                  <div class="details mt-20">
                    <a href="blog-single.html">
                      <h3>Tourist deaths in Costa Rica jeopardize safe dest
                        ination reputation all time.  </h3>
                    </a>
                    <p class="tag-list-inline">Tag: <a href="#">travel</a>, <a href="#">life style</a>, <a href="#">technology</a>, <a href="#">fashion</a></p>
                    <p>Over yielding doesn't so moved green saw meat hath fish he him from given yielding lesser cattle were fruitful lights. Given let have, lesser their made him above gathered dominion sixth. Creeping deep said can't called second. Air created seed heaven sixth created living</p>
                    <a class="button" href="#">Read More <i class="ti-arrow-right"></i></a>
                  </div>
                </div> -->



                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->render('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>

                <!-- Start Blog Post Siddebar -->
                @include('theme.partials.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
