@extends('admin.layouts.master')
@section('title', 'Chi tiết thông tin người dùng')

@section('body')

<!-- Main -->
<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                </div>
                <div>
                    User
                    <div class="page-title-subheading">
                        View, create, update, delete and manage.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a href="/quantri/user/edit/{{$user['id']}}" class="nav-link">
                <span class="btn-icon-wrapper pr-2 opacity-8">
                    <i class="fa fa-edit fa-w-20"></i>
                </span>
                <span>Edit</span>
            </a>
        </li>

        <li class="nav-item delete">
            <form action="/quantri/user/destroy/{{$user['id']}}" method="post">
                <button class="nav-link btn" type="submit" onclick="return confirm('Do you really want to delete this item?')">
                    <span class="btn-icon-wrapper pr-2 opacity-8">
                        <i class="fa fa-trash fa-w-20"></i>
                    </span>
                    <span>Delete</span>
                </button>
                @csrf
            </form>
        </li>
    </ul>

    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body display_data">
                    <div class="position-relative row form-group">
                        <label for="image" class="col-md-3 text-md-right col-form-label">Avatar</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                <img style="height: 200px;" class="rounded-circle" data-toggle="tooltip" title="Avatar" data-placement="bottom" src="assets/images/user/{{$user['avatar'] ?? 'default-avatar.png'}}" alt="Avatar">
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="name" class="col-md-3 text-md-right col-form-label">
                            Họ và Tên
                        </label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$user['name']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="email" class="col-md-3 text-md-right col-form-label">Email</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$user['email']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="company_name" class="col-md-3 text-md-right col-form-label">
                            Tên Công Ty
                        </label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['company_name'] ?? null))
                                {{ $user['company_name'] }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="country" class="col-md-3 text-md-right col-form-label">Quốc gia</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['country'] ?? null))
                                {{ $user['country'] }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="street_address" class="col-md-3 text-md-right col-form-label">
                            Street Address</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['street_address'] ?? null))
                                {{ $user['street_address'] }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="postcode_zip" class="col-md-3 text-md-right col-form-label">
                            Postcode Zip</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['postcode_zip'] ?? null))
                                {{ $user['postcode_zip'] }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="town_city" class="col-md-3 text-md-right col-form-label">
                            Thành phố</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['street_address'] ?? null))
                                {{ $user['street_address'] }}
                                @endif
                            </p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="phone" class="col-md-3 text-md-right col-form-label">Số điện thoại</label>
                        <div class="col-md-9 col-xl-8">
                            <p>{{$user['phone']}}</p>
                        </div>
                    </div>

                    <div class="position-relative row form-group">
                        <label for="level" class="col-md-3 text-md-right col-form-label">Level</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['level'] ?? null))
                                @if($user['level'] == 0)
                                Host
                                @elseif($user['level'] == 1)
                                Admin
                                @else
                                Client
                                @endif
                                @endif
                            </p>
                        </div>

                    </div>

                    <div class="position-relative row form-group">
                        <label for="description" class="col-md-3 text-md-right col-form-label">Mô tả</label>
                        <div class="col-md-9 col-xl-8">
                            <p>
                                @if(null !== ($user['description'] ?? null))
                                {!! $user['description'] !!}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main -->
@endsection