@extends('layouts.admin')

@section('title')
    edit
@endsection

@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex justify-content-between">
                <div><h1>Update</h1></div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <divc class="card-body">
                    <div class="container">
                        <form action="{{ route('admin.product.update', $item) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="post_title_input" class="form-label">Title</label>
                                <input type="text" class="form-control" id="post_title_input" placeholder="Title" name="title" value="{{ $item->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_short_content_input" class="form-label">Short content</label>
                                <input type="text" class="form-control" id="post_short_content_input" placeholder="Short content" name="short_content" value="{{ $item->short_content }}">
                                @error('short_content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_content_input" class="form-label">Content</label>
                                <textarea class="form-control" id="post_content_input" placeholder="Main content" name="content">{{ $item->content }}</textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="post_photo_input" class="form-label">Photo</label>
                                <input type="text" class="form-control" id="post_photo_input" placeholder="Photo URL" name="photo" value="{{ $item->photo }}">
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">category</label>
                                <select name="category_id" id="category_id" class="form-control form-select">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{$category->title}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                       </div>
                </div>
            </div>
        </section>
@endsection
