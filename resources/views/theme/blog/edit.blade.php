@extends('theme.layout')

@section('title', 'Edit Blog')

@section('content')
    @include('theme.partials.hero', ['title' => $blog->name])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('updateBlogSuccess'))
                        <div class="alert alert-success">
                            {{ session('updateBlogSuccess') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update', ['blog' => $blog])  }}" class="form-contact contact_form" method="post"
                          novalidate="novalidate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input class="form-control border" name="name" type="text"
                                   placeholder="Enter your blog title" value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <select class="form-control border" name="category_id">
                                <option>Select Category</option>
                                @if(count($categories) > 0)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                                @if($category->id === $blog->category_id)
                                                    selected
                                                @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-select border" placeholder="Blog description" name="description"
                                      rows="5" cols="143.5">
                                {{ $blog->description }}
                            </textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>
                        <div class="form-group text-center text-md-right mt-3">
                            <button type="submit" class="button button--active button-contactForm">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->
@endsection
