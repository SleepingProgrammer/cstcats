@extends('admin.layouts.layout-basic')

@section('scripts')
    <script src="{{asset('/assets/admin/js/pages/wizard.js')}}"></script>
@stop

@section('content')
    <div class="main-content">
        <div class="page-header">
            <h3 class="page-title">Account Settings</h3>
        </div>
        

        <div class="card">
            <div class="card-header">
                <h6>Form Wizard with Validation</h6>
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
                        <h3><i class="icon-fa icon-fa-black-tie"></i>Experience</h3>
                        <section>
                            <div class="form-group">
                                <label>Facebook *</label>
                                <input type="text" id="facebook" name="facebook" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Twitter *</label>
                                <input type="text" id="twitter" name="twitter" class="form-control required">
                            </div>
                            <div class="form-group">
                                <label>Google+ *</label>
                                <input type="text" id="google+" name="google+" class="form-control required">
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
