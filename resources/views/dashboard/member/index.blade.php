@extends('layouts.index')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Member</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Members </li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card col-12">
                        <div class="card-header">
                        <h3 class="card-title">Member List</h3>
                        <div class="box-tools float-right">
                            <a href="{{ route('member-add') }}" class="btn btn-success btn-sm btn-flat">Add</a>
                        </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="6%">Sr no</th>
                                        <th>Name</th>
                                        <th>Shop_name</th>
                                        <th>Email</th>
                                        <th>Contact</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th width="13%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($members as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->shop_name }}</td>
                                        <td>{{ $member->email }} </td>
                                        <td>{{ $member->contact }}</td>
                                        <td>{{ $member->city }}</td>
                                        <td>{{ $member->address }}</td>
                                        <td>
                                            <a href="{{ route('member-edit', ['id' => $member->id])  }}" class="btn btn-outline-success btn-sm btn-flat">Edit</a>
                                            <a href="{{ url('member-delete/'.$member->id) }}" class="btn btn-outline-danger btn-sm btn-flat">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
