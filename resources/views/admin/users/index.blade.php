@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="/assets/admin/js/users/users.js"></script>
    <script src="/assets/admin/js/users/mod_users.js"></script>
    <script src="/assets/admin/js/pages/notifications.js"></script>
@stop

@section('content')

    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Users</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Users/</li>
            </ol>
            <div class="page-actions">
                @if(Auth::user()->role=="admin")
                    <button type="button" id="btn-add" class="btn btn-primary" data-toggle="modal" data-target="#moderator_modal"><i class="icon-fa icon-fa-plus"></i> New Moderator</button>
                @endif
            </div>
            
            <!-- User Modal -->
            <div class="modal fade" id="moderator_modal" tabindex="-1" role="dialog" aria-labelledby="moderator_modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <form id="frmUser" action="users" method="post">
                                {{csrf_field()}}                                
                                <div class="modal-header">
                                    <h5 class="modal-title" id="moderator_modalLabel">User Editor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="email"  name="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password"  name="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-sm-2 col-form-label">Confirm</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="password_confirmation"  name="password_confirmation" placeholder="Retype Password">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" id="can_post" name="can_post" value="1">
                                    <input type="hidden" class="form-control" id="can_comment" name="can_comment" value="1">
                                    <input type="hidden" class="form-control" id="approved" name="approved" value="1">
                                    <input type="hidden" class="form-control" id="role" name="role" value="moderator">
                                    <input type="hidden" class="form-control" id="registeredFrom" name="registeredFrom" value="Admin Form">
                                    <input type="hidden" id="user_id" name="user_id" value="">
                                    
                                    <button type="button" id="moderator-btn-save" class="btn btn-primary">Save</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h6>All Users</h6>

                        <div class="card-actions">

                        </div>
                    </div>
                    <div class="card-body">
                            <div class="tabs tabs-default">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @if(Auth::user()->role=="admin")
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#moderators" role="tab">Moderators</a>
                                            </li>
                                        @endif
                                        <li class="nav-item">
                                            <a class="nav-link {{ (Auth::user()->role=="moderator") ? "active" : "" }}" data-toggle="tab" href="#users" role="tab">Users</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#applicants" role="tab">Applicants</a>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        @if(Auth::user()->role=="admin")
                                            <div class="tab-pane active" id="moderators" role="tabpanel">
                                                <table id="moderators-datatable" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Registered On</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                        </thead>
                                                        @foreach($moderators as $user)
                                                        <tr id="user{{ $user->id }}">
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->created_at}}</td>
                                                            <td>
                                                                <button type="button" class="btn btn-default btn-sm edit-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-pencil"></i> Edit</button>
                                                                <button type="button" class="btn btn-default btn-sm delete-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-trash"></i> Delete</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                            </div>
                                        @endif
                                        <div class="tab-pane {{ (Auth::user()->role=="moderator") ? "active" : "" }}" id="users" role="tabpanel">                                   
                                            <table id="users-datatable" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Registered On</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                @foreach($users as $user)
                                                <tr id="user{{ $user->id }}">
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View User</a>
                                                        <button type="button" class="btn btn-default btn-sm edit-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-trash"></i> Edit</button>
                                                        <button type="button" class="btn btn-default btn-sm delete-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-trash"></i> Delete</button>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="applicants" role="tabpanel">                                   
                                            <table id="applicants-datatable" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Registered On</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                @foreach($applicants as $user)
                                                <tr id="user{{ $user->id }}">
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->created_at}}</td>
                                                    <td>
                                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-default btn-sm"><i class="icon-fa icon-fa-search"></i> View Applicant</a>
                                                        <button type="button" class="btn btn-default btn-sm edit-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-trash"></i> Edit</button>
                                                        <button type="button" class="btn btn-default btn-sm delete-user" value="{{ $user->id }}"> <i class="icon-fa icon-fa-trash"></i> Delete</button>
                                                    </td>
                                                    </tr>
                                                @endforeach
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
