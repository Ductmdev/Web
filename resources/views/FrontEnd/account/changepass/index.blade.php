@extends('FrontEnd.layouts.master')
@section('title', 'Change Password')

@section('body')

<!-- Breadcrumb section begin -->
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" src="/admin/assets/images/user/{{$user->avatar ?? 'default-avatar.jpg'}}">
                <span class="font-weight-bold">{{$user->name}}</span>
                <span class="text-black-50">{{$user->email}}</span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Change Password</h4>
                </div>
                @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{$error}}</strong>
                </div>
                @endforeach
                @endif

                @if(session("alert"))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{session("alert")}}</strong>
                </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" value="">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">New Password</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter New Password" value="">
                            @if ($errors->has('new_password'))
                            <span class="text-danger">{{ $errors->first('new_password') }}</span>
                            @endif
                        </div>
                        <div class="col-md-12 mt-3">
                            <label class="labels">Confirm New Password</label>
                            <input type="password" name="cf_password" class="form-control" placeholder="Confirm New Password" value="">
                            @if ($errors->has('cf_password'))
                            <span class="text-danger">{{ $errors->first('cf_password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection