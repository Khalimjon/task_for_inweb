@extends('layouts.admin')


@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create Pages</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
      <div class="container-fluid">
            <div class="container">
                <form action="{{ route('admin.pages.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="page_title_input" class="form-label">Title</label>
                        <input type="text" class="form-control" id="page_title_input" placeholder="Title" name="title" value="{{ old('title') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pages_short_content_input" class="form-label">Short_content</label>
                        <input type="text" class="form-control" id="pages_short_content_input" placeholder="short_content" name="short_content" value="{{ old('short_content') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="pages_content_input" class="form-label">Content</label>
                        <input type="text" class="form-control" id="pages_content_input" placeholder="content" name="content" value="{{ old('short_content') }}">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
      </div>
    </section>
@endsection

