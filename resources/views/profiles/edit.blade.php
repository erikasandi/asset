@extends('layouts.metronic.asset')

@section('page-level-style-plugins')
    <link href="{!! asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('page-level-styles')
    <link href="{!! asset('metronic/assets/pages/css/profile.min.css') !!}" rel="stylesheet" type="text/css" />
@endsection

    @section('content')
            <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">

        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE BAR -->
            <!-- END PAGE BAR -->

            <!-- BEGIN PAGE TITLE-->
            {{--<h1 class="page-title"> User Profile--}}
            {{--<small></small>--}}
            {{--</h1>--}}
            <!-- END PAGE TITLE-->

            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN PROFILE SIDEBAR -->
                    <div class="profile-sidebar">
                        <!-- PORTLET MAIN -->
                        <div class="portlet light profile-sidebar-portlet ">
                            <!-- SIDEBAR USERPIC -->
                            <div class="profile-userpic">
                                <img src="@if(isset($user->userDetail->avatar)){!! asset('uploads/avatars/' . $user->userDetail->avatar) !!}@else{!! asset('images/avatar.jpg') !!}@endif" class="img-responsive" alt=""> </div>
                            <!-- END SIDEBAR USERPIC -->
                            <!-- SIDEBAR USER TITLE -->
                            <div class="profile-usertitle">
                                <div class="profile-usertitle-name"> {!! $user->name !!} </div>
                                <!-- div class="profile-usertitle-job"> Developer </div -->
                            </div>
                            <!-- END SIDEBAR USER TITLE -->
                            <!-- SIDEBAR BUTTONS -->
                            <!-- div class="profile-userbuttons">
                                <button type="button" class="btn btn-circle green btn-sm">Follow</button>
                                <button type="button" class="btn btn-circle red btn-sm">Message</button>
                            </div -->
                            <!-- END SIDEBAR BUTTONS -->
                            <!-- SIDEBAR MENU -->
                            <div class="profile-usermenu">
                                <ul class="nav">
                                    <li >
                                        <a href="{!! url('user-profile/' . $user->id) !!}">
                                            <i class="icon-home"></i> Overview </a>
                                    </li>
                                    <li class="active">
                                        <a href="{!! url('user-profile/' . $user->id . '/edit') !!}">
                                            <i class="icon-settings"></i> Account Settings </a>
                                    </li>
                                    <!--li>
                                        <a href="page_user_profile_1_help.html">
                                            <i class="icon-info"></i> Help </a>
                                    </li-->
                                </ul>
                            </div>
                            <!-- END MENU -->
                        </div>
                        <!-- END PORTLET MAIN -->
                    </div>
                    <!-- END BEGIN PROFILE SIDEBAR -->

                    <!-- BEGIN PROFILE CONTENT -->
                    <div class="profile-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light ">
                                    <div class="portlet-title tabbable-line">
                                        <div class="caption caption-md">
                                            <i class="icon-globe theme-font hide"></i>
                                            <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                                        </div>
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#change_info" data-toggle="tab">Personal Info</a>
                                            </li>
                                            <li>
                                                <a href="#change_avatar" data-toggle="tab">Change Avatar</a>
                                            </li>
                                            <li>
                                                <a href="#change_password" data-toggle="tab">Change Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="tab-content">
                                            <!-- PERSONAL INFO TAB -->
                                            <div class="tab-pane active" id="change_info">
                                                <form role="form" method="post" action="{!! url('user-profile/' . $user->id . '/update') !!}">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input type="text" name="name" class="form-control" value="{!! $user->name !!}" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Mobile Number</label>
                                                        <input type="text" name="mobile_phone" class="form-control" value="@if(isset($user->userDetail->mobile_phone)){!! $user->userDetail->mobile_phone !!}@endif" /> </div>
                                                    <div class="margiv-top-10">
                                                        <button type="submit" class="btn green"> Save Changes </button>
                                                        <a href="{!! url('user-profile/' . $user->id) !!}" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END PERSONAL INFO TAB -->
                                            <!-- CHANGE AVATAR TAB -->
                                            <div class="tab-pane" id="change_avatar">
                                                <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                                    eiusmod. </p>
                                                <form action="{!! url('user-profile/' . $user->id.'/update-avatar') !!}" role="form" enctype="multipart/form-data" method="post">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="{!! asset('metronic/assets/layouts/layout/img/avatar.png') !!}" width="200px" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="avatar">
                                                                </span>
                                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                        </div>
                                                        <!-- div class="clearfix margin-top-10">
                                                            <span class="label label-danger">NOTE! </span>
                                                            <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                        </div -->
                                                    </div>
                                                    <div class="margin-top-10">
                                                        <button type="submit" class="btn green"> Submit </button>
                                                        <a href="{!! url('user-profile/' . $user->id) !!}" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE AVATAR TAB -->
                                            <!-- CHANGE PASSWORD TAB -->
                                            <div class="tab-pane" id="change_password">
                                                <form action="{!! url('user-profile/' . $user->id . '/update-password') !!}" method="post">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group">
                                                        <label class="control-label">New Password</label>
                                                        <input name="new_password" type="password" class="form-control" /> </div>
                                                    <div class="form-group">
                                                        <label class="control-label">Re-type New Password</label>
                                                        <input name="new_password2" type="password" class="form-control" /> </div>
                                                    <div class="margin-top-10">
                                                        <button type="submit" class="btn green"> Change Password </button>
                                                        <a href="{!! url('user-profile/' . $user->id) !!}" class="btn default"> Cancel </a>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- END CHANGE PASSWORD TAB -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE CONTENT -->
                </div>
            </div>
        </div>
    </div>
    @endsection

@section('page-level-plugins')
    <script src="{!! asset('metronic/assets/global/plugins/jquery.sparkline.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('metronic/assets/pages/scripts/profile.min.js') !!}" type="text/javascript"></script>
@endsection