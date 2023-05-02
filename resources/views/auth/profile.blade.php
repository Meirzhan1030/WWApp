@extends('layouts.app')

@section('title', 'PROFILE PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="pagetitle">
                    <h1>{{__('messages.myprof')}}</h1>
                </div><!-- End Page Title -->
            </div>
        </div>
    </div>
    <section class="section profile">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{asset(\Illuminate\Support\Facades\Auth::user()->ava)}}" alt="Profile" class="rounded-circle">
                        <h2>{{\Illuminate\Support\Facades\Auth::user()->name}}</h2>
                        <h3>{{__('messages.role')}}: {{\Illuminate\Support\Facades\Auth::user()->role->name}}</h3>
                    </div>
                </div><br>
            </div>


            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">{{__('messages.info')}}</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">{{__('messages.editinfo')}}</button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <h5 class="card-title">{{__('messages.details')}}</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">{{__('messages.name')}}</div>
                                    <div class="col-lg-9 col-md-8">{{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.company')}}</div>
                                    <div class="col-lg-9 col-md-8">Narxoz company</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.job')}}</div>
                                    <div class="col-lg-9 col-md-8">Student</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.country')}}</div>
                                    <div class="col-lg-9 col-md-8">Kazakhstan</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.address')}}</div>
                                    <div class="col-lg-9 col-md-8">Zhandosova 55</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.phone')}}</div>
                                    <div class="col-lg-9 col-md-8">+7 (777) 777 77 77</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">{{__('messages.email')}}</div>
                                    <div class="col-lg-9 col-md-8">{{\Illuminate\Support\Facades\Auth::user()->email}}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('users.updateInfo') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">{{__('messages.profimg')}}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="file" class="form-control" name="ava">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">{{__('messages.name')}}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name" value="{{\Illuminate\Support\Facades\Auth::user()->name}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">{{__('messages.email')}}</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="email" type="email" class="form-control" id="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">{{__('buttons.save')}}</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
