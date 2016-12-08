@extends('layouts.metronic.asset')

@section('page-level-styles')
    <link href="{!! asset('metronic/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />') !!}">
    <link href="{!! asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
        <!-- BEGIN CONTENT -->
<div class="page-content-wrapper">

    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="fa fa-building-o font-dark"></i>
                            <span class="caption-subject bold uppercase"> Add {!! $location->name !!} Asset</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-xs sbold green" href="{!! url('/asset-by-group/' . $group) !!}">
                                <i class="fa fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <form role="form" id="form_sample_1" method="post" action="{!! url('asset-by-group/' . $group . '/save') !!}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="site_id" value="{!! session('gSite') !!}">
                            {{--form-body--}}
                            <div class="form-body">
                                <div class="row">
                                    @if ($errors->has('site_id'))
                                        <div class="alert alert-danger alert-dismissable col-md-12">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                            <strong>Error!</strong> {!! $errors->first('site_id') !!}
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group  @if ($errors->has('name')) has-error @endif">
                                                    <label>Name <span class="required"> * </span></label>
                                                    <input type="text" name="name" class="form-control" placeholder="Name" value="{!! old('name') !!}" autofocus>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">{!! $errors->first('name') !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group  @if ($errors->has('code')) has-error @endif">
                                                    <label>{!! $codeLabel !!} <span class="required"> * </span></label>
                                                    <input type="text" name="code" class="form-control" placeholder="{!! $codeLabel !!}" value="{!! old('code') !!}">
                                                    @if ($errors->has('code'))
                                                        <span class="help-block">{!! $errors->first('code') !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                <div class="form-group  @if ($errors->has('location_id')) has-error @endif">
                                                    <label>{!! $locationLabel !!}</label>
                                                    {!! $locationSelect !!}
                                                    @if ($errors->has('location_id'))
                                                        <span class="help-block">{!! $errors->first('location_id') !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group  @if ($errors->has('asset_type_id')) has-error @endif">
                                                    <label>Asset Type</label>
                                                    {!! $assetType !!}
                                                    @if ($errors->has('asset_type_id'))
                                                        <span class="help-block">{!! $errors->first('asset_type_id') !!}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--asset-tab--}}
                                    <div id="asset-tab" class="col-md-12">
                                        <ul class="nav nav-tabs">
                                            <li class="active">
                                                <a href="#tab_general" data-toggle="tab"> General </a>
                                            </li>
                                            <li>
                                                <a href="#tab_images" data-toggle="tab"> Images </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_general">
                                                <div class="col-md-12" id="form-detail"></div>
                                            </div>
                                            <div class="tab-pane" id="tab_images">
                                                <div class="tab-pane" id="tab_images">
                                                    @include('assets.images')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--end of asset-tab--}}
                                    <br>
                                    <div class="col-md-12 ">
                                        <button type="submit" class="btn btn-sm sbold green pull-right">Save</button>
                                    </div>
                                </div>
                            </div>
                            {{--end of form--}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT BODY -->

</div>
<!-- END CONTENT -->
@endsection

@section('page-level-plugins')
    <script src="{!! asset('metronic/assets/global/plugins/jquery.blockui.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/moment.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/fancybox/source/jquery.fancybox.pack.js') !!}" type="text/javascript"></script>
    {{--<script src="{!! asset('metronic/assets/global/plugins/plupload/js/plupload.full.min.js') !!}" type="text/javascript"></script>--}}
    <script src="{!! asset('metronic/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/jquery-repeater/jquery.repeater.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}" type="text/javascript"></script>

@endsection

@section('page-level-scripts')
    {{--<script src="{!! asset('metronic/assets/pages/scripts/form-validation.min.js') !!}" type="text/javascript"></script>--}}
    {{--<script src="{!! asset('metronic/assets/pages/scripts/ecommerce-products-edit.js') !!}" type="text/javascript"></script>--}}
    <script>
        var ajaxUrl = '{!! url('/ajax') !!}';
        var assetFormUrl = '{!! $assetFormUrl !!}';
        var csrfToken = '{!! csrf_token() !!}';

        jQuery(document).ready(function() {
            $('.mt-repeater').repeater({
                initEmpty: true,
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
                isFirstItemUndeletable: true
            });

            $('#asset-type').trigger('change');

            var form1 = $('#form_sample_1');
            var error1 = $('.alert-danger', form1);
            var success1 = $('.alert-success', form1);
            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block help-block-error', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",  // validate all fields including form hidden input
                messages: {
                    select_multi: {
                        maxlength: jQuery.validator.format("Max {0} items allowed for selection"),
                        minlength: jQuery.validator.format("At least {0} items must be selected")
                    }
                },
                rules: {
                    name: {
                        minlength: 3,
                        required: true
                    },
                    code: {
                        minlength: 3,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    success1.hide();
                    error1.show();
                    App.scrollTo(error1, -200);
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    var cont = $(element).parent('.input-group');
                    if (cont) {
                        cont.after(error);
                    } else {
                        element.after(error);
                    }
                },

                highlight: function (element) { // hightlight error inputs
                    $(element).closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element).closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label.closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                }
            });
        });
    </script>
{{--    <script src="{!! asset('scripts/plupload.js') !!}" type="text/javascript"></script>--}}
    <script src="{!! asset('scripts/asset.js') !!}"></script>
@endsection