@extends('layouts.app')

@section('content')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/meteoajax.js') }}"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="meteo-header">{{ __('METEO Messages') }}
                        <button type="button" class="btn btn-xs btn-primary float-right add">Add METEO Message</button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="meteo" class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>ad_code</th>
                                <th>observation</th>
                                <th>met_text</th>
                                <th width="70">Action</th>
                            </tr>
                            </thead>

                        </table>


                        <!--  -->
                        <div class="modal" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <form class="form" action="" method="POST">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">New METEO Message</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id">

                                            <div class="form-group">
                                                <label for="ad_code">ad_code</label>
                                                <input type="text" name="ad_code" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="observation">observation</label>
                                                <input type="date" name="observation" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="met_text">met_text</label>
                                                <input type="text" name="met_text" class="form-control input-sm">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-save">Save</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--  -->






                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
