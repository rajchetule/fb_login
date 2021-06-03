@extends('layouts.index')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Member List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Add member</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Member</h3>
                                <div class="box-tools float-right">
                                <a href="{{ route('member-list') }}" class="btn btn-success btn-sm btn-flat">Member list</a>
                            </div>
                            </div>
                            <form role="form" action="{{ route('member-edit', ['id' => $member->id]) }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputName" name="name" value="{{ $member->name }}" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputName1">Shop Name</label>
                                                <input type="text" class="form-control" id="exampleInputShopName" name="shop_name" value="{{ $member->shop_name }}" placeholder="Enter Shop name">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{ $member->email }}" placeholder="Enter email">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Contact</label>
                                                <input type="text" class="form-control" id="exampleInputContact" name="contact" value="{{ $member->contact }}" placeholder="Enter contact number">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">City </label>
                                                <input type="text" class="form-control" id="exampleInputCity" name="city" value="{{ $member->city }}" placeholder="Enter city">
                                            </div>
                                        </div>
                                        <div class=" col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Address </label>
                                                <input type="text" class="form-control" id="exampleInputAddress" name="address" value="{{ $member->address }}" placeholder="Enter Address">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
