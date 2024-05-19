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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <divc class="card-body">
                    <div class="container">
                        <form action="{{ route('admin.categories.update', $item) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            <div class="mb-3">
                                <label for="category_title_input" class="form-label">Title</label>
                                <input type="text" class="form-control" id="category_title_input" placeholder="Title" name="title" value="{{ $item->title }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_short_content_input" class="form-label">Short_content</label>
                                <input type="text" class="form-control" id="category_short_content_input" placeholder="short_content" name="short_content" value="{{ $item->short_content }}">
                                @error('short_content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_content_input" class="form-label">Content</label>
                                <input type="text" class="form-control" id="category_content_input" placeholder="content" name="content" value="{{ $item->content }}">
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_photo_upload" class="form-label">Photo</label>
                                <input type="file" class="form-control" id="category_photo_input" placeholder="Photo URL" name="photo" value="{{ $item->photo }}">
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
