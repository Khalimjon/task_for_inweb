@extends('layouts.admin')

@section('title')
    {{ $item->title }}
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex justify-content-between">
                <div><h1>{{$item->title}}</h1></div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>ID</th>
                            <td>{{ $item->id }}</td>
                        </tr>
                        <tr>
                            <th>Title</th>
                            <td>{{ $item->title }}</td>
                        </tr>
                        <tr>
                            <th>Short Content</th>
                            <td>{{ $item->content }}</td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td>{{ $item->content }}</td>
                        </tr>
                        <tr>
                            <th>Photo Url</th>
                            <td>
                                {{ $item->photo ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $item->category->title }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
@endsection
