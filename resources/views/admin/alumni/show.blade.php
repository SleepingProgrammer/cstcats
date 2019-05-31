@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
@stop

@section('content')
    <div class="main-content page-profile">
        <div class="page-header">
            <h3 class="page-title">Alumni Profile</h3>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tabs tabs-default">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#education" role="tab">Education</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#experience" role="tab">Experience</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="avatar-container">
                                                <img src="/assets/admin/img/avatars/avatar-lg.png" alt="Admin Avatar" class="img-fluid">
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <h4>{{ $alumni->user->name }}</h4>
                                            <p class="detail-row"><i class="icon-fa icon-fa-map-marker"></i> {{ (!empty($alumni->address)) ? $alumni->address : "Not Set"  }}</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-birthday-cake"></i> {{ $alumni->birthdate }}</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-neuter"></i> {{(!empty($alumni->gender)) ? $alumni->gender : "Not Set" }}</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-mobile"></i> {{(!empty($alumni->phone)) ? $alumni->phone : "Not Set" }}</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-phone"></i> {{(!empty($alumni->landline)) ? $alumni->landline : "Not Set" }}</p>
                                            <p class="detail-row"><i class="icon-fa icon-fa-envelope"></i> {{(!empty($alumni->email)) ? $alumni->email : "Not Set" }}</p>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="messages" role="tabpanel">
                                    <ul class="media-list activity-list">
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-thumbnail" src="/assets/admin/img/avatars/avatar1.png" alt="Generic placeholder image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">User 1 <span>sent a message</span></h4>
                                                <small>Today at 3.50pm</small>
                                                <p class="mt-2">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ac placerat odio. Nulla erat neque, finibus vitae euismod at, sodales a mi. Phasellus convallis, neque vitae vehicula iaculis, turpis est fermentum magna, quis finibus dolor dolor posuere purus. Maecenas pulvinar dolor non sodales interdum."</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object img-thumbnail" src="/assets/admin/img/avatars/avatar2.png" alt="Generic placeholder image">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">User 2 <span>sent a message</span></h4>
                                                <small>Yesterday at 9pm</small>
                                                <p class="mt-2">
                                                    “Donec porttitor risus tortor, nec scelerisque elit dictum vitae.”
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="education" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-10"></div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-full btn-success"><i class="icon-fa icon-fa-plus"></i> Add Education</button>
                                        </div>
                                    </div>
                                    <ul class="media-list activity-list">
                                        <li class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">BSIT<span> Bachelor of Science in Information Technology</span></h4>
                                                <small>Batch 2019</small>
                                            </div>
                                            <div class="media-right">
                                                <button class="btn btn-danger"> &times </button>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                    <h4 class="media-heading">CSIT<span> Computer Science and Information Technology</span></h4>
                                                    <small>Batch 2014</small>
                                            </div>
                                            <div class="media-right">
                                                <button class="btn btn-danger"> &times </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-pane" id="experience" role="tabpanel">
                                    <div class="row">
                                        <div class="col-lg-10"></div>
                                        <div class="col-lg-2">
                                            <button class="btn btn-full btn-success"><i class="icon-fa icon-fa-plus"></i> Add Experience</button>
                                        </div>
                                    </div>
                                    <ul class="media-list activity-list">
                                        <li class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">Call Center Agent <br><span> Accenture</span></h4>
                                                <small>January 2018 to February 2019</small>
                                            </div>
                                            <div class="media-right">
                                                <button class="btn btn-danger"> &times </button>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-body">
                                                <h4 class="media-heading">Operations Manager <br><span> Jollibee</span></h4>
                                                <small>January 2015 to December 2017</small>
                                            </div>
                                            <div class="media-right">
                                                <button class="btn btn-danger"> &times </button>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
