@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="{{asset('/assets/admin/js/pages/wizard.js')}}"></script>
    <script src="{{asset('/assets/admin/js/pages/dropzone.js')}}"></script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Account Settings</h3>
        </div>
        

        <div class="card">
            <div class="card-header">
                <h6>Account Information</h6>
            </div>
            <div class="card-body">
                <div class="content">
                    <form method="PUT" action="alumni" id="basic-wizard-3" class="form-wizard-2 icon-wizard">
                        

                        <h3><i class="icon-fa icon-fa-user"></i>Information</h3>
                        <section>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>Gender</label>
                                            <select id="gender" name="gender" class="form-control" value="{{ $alumni->gender }}">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Current Employment Status</label>
                                            <select id="gender" name="gender" class="form-control">
                                                <option>Unemployed</option>
                                                <option>Employed Part-Time</option>
                                                <option>Employed Full-Time</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Birthday *</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control ls-datepicker required" id="birthday" name="birthday">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                        <i class="icon-fa icon-fa-calendar"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Address *</label>
                                        <textarea id="Address" name="address" class="form-control required" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <h3><i class="icon-fa icon-fa-phone"></i>Contact</h3>
                        <section>                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Phone No. *</label>
                                        <div class="input-group">
                                        <input type="text" id="phone" name="phone" class="form-control required">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                        <i class="icon-fa icon-fa-mobile"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Landline</label>
                                        <div class="input-group">
                                            <input type="text" id="landline" name="landline" class="form-control">
                                            <div class="input-group-append">
                                            <span class="input-group-text">
                                                        <i class="icon-fa icon-fa-phone"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <h3><i class="icon-fa icon-fa-file-image-o"></i>Images</h3>
                        <section>
                            <div class="row">
                                <div class="col-lg-6">                     
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Profile Picture</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        <br><small class="text-muted">
                                            A square professional or formal image is required. Otherwise, this is to promote your profile if you are still looking for a job.
                                        </small>
                                    </div>
                                </div>
                                <div class="col-lg-6">                                                         
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">Proof</label>
                                        <input type="file" class="form-control-file required" id="exampleFormControlFile1">
                                        <br><small class="text-muted">You can use a picture of your diploma as your proof.
                                            This is crucial for the admin to decide if your account is to be approved or not.
                                        </small>
                                    </div>
                                </div>
                            </div>   
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
