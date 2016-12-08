@extends('layouts.metronic.asset')

@section('page-level-styles')
    <link href="{!! asset('metronic/assets/global/plugins/datatables/datatables.min.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!}" rel="stylesheet" type="text/css" />
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
                                <span class="caption-subject bold uppercase"> Asset List</span>
                            </div>
                            <div class="actions">
                                <a class="btn btn-xs sbold green" href="{!! url('asset/add') !!}">
                                    <i class="fa fa-plus"></i> Add New
                                </a>
                                <a class="accordion-toggle btn btn-sm sbold green" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
                                    <i class="fa fa-search-plus"></i> Advanced Search
                                </a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            @if (session('message'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                    <strong>Info!</strong> {{ session('message') }}
                                </div>
                            @endif
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div id="collapse_1" class="panel-collapse collapse">
                                            <form role="form" action="" method="post">
                                                {!! csrf_field() !!}
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control search-input" placeholder="Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Location</label>
                                                                {!! $location !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label>Asset Type</label>
                                                                {!! $assetType !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" name="submit" value="search" class="btn btn-sm sbold green"><i class="fa fa-search"></i> Search</button>
                                                        <button type="button" class="btn btn-sm sbold green search-close"><i class="fa fa-close"></i> Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Asset Name</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                            </table>
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
    <script src="{!! asset('metronic/assets/global/scripts/datatable.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/datatables/datatables.min.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('metronic/assets/global/plugins/bootbox/bootbox.min.js') !!}" type="text/javascript"></script>
@endsection

@section('page-level-scripts')
    <script>
        $(function() {
            $('#sample_1').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{!! route('asset.data') !!}',
                    data: {
                        's_name': '{!! $sName !!}',
                        's_location': '{!! $sLocation !!}',
                        's_type': '{!! $sType !!}'
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'code', name: 'code' },
                    { data: 'type', name: 'type' },
                    { data: 'location', name: 'location' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, "width": "280px" }
                ]
            });

            $('#collapse_1').on('shown.bs.collapse', function () {
                $('.search-input').focus();
            });

            $('.search-close').click(function() {
                $('#collapse_1').collapse('hide');
            })
        });
    </script>
    <script src="{!! asset('metronic/assets/global/scripts/delete-confirmation.js') !!}" type="text/javascript"></script>
@endsection