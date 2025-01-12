@php
    $sidebarCategories = \App\Models\Category::get();
@endphp
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            <div class="form-group mt-30">
                <div class="col-autos">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('subscriber.store') }}" method="post">
                        @csrf
                        <input type="text" name="email" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                           onblur="this.placeholder = 'Enter email'" value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button class="bbtns d-block mt-3 w-100">Subcribe</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Category</h4>
            @if(count($sidebarCategories) > 0)
                <ul class="cat-list mt-20">
                    @foreach($sidebarCategories as $category)
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ $category->name }}</p>
                                <p>(03)</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Post</h4>
            <div class="popular-post-list">
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets/') }}/img/blog/thumb/thumb1.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Accused of assaulting flight attendant miktake alaways</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets/') }}/img/blog/thumb/thumb2.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
                <div class="single-post-list">
                    <div class="thumb">
                        <img class="card-img rounded-0" src="{{ asset('assets/') }}/img/blog/thumb/thumb3.png" alt="">
                        <ul class="thumb-info">
                            <li><a href="#">Adam Colinge</a></li>
                            <li><a href="#">Dec 15</a></li>
                        </ul>
                    </div>
                    <div class="details mt-20">
                        <a href="blog-single.html">
                            <h6>Tennessee outback steakhouse the
                                worker diagnosed</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
