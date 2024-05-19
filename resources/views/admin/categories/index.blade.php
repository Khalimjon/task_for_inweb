@extends('layouts.admin')

@section('title')
    Categories
@endsection

@section('content')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="d-flex justify-content-between">
                <div><h1>Categories</h1></div>
                <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add
                </a>
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
                            <th>Title</th>
                            <th>User

                            </th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <a href="{{route('admin.categories.show', $item->id)}}" class="btn btn-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{route('admin.categories.edit', $item->id)}}" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', ['category'=> $item->id])}}"  method = 'post' class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger py-2"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </section>
@endsection
