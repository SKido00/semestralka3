@extends('layouts.app')

@section('content')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/aircraftajax.js') }}"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="aircraft-header">{{ __('Aircraft') }}
                        <button type="button" class="btn btn-xs btn-primary float-right add">Add Aircraft</button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <table id="aircraft" class="table table-bordered table-condensed table-striped">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>acType</th>
                                    <th>acWakeTurb</th>
                                    <th>acName</th>
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
                                                <h5 class="modal-title">New Aircraft</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="id">

                                                <div class="form-group">
                                                    <label for="acType">acType</label>
                                                    <input type="text" name="acType" class="form-control input-sm">
                                                </div>
                                                <div class="form-group">
                                                    <label for="acWakeTurb">acWakeTurb</label>
                                                    <input type="text" name="acWakeTurb" class="form-control input-sm">
                                                </div>
                                                <div class="form-group">
                                                    <label for="acName">acName</label>
                                                    <input type="text" name="acName" class="form-control input-sm">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary btn-save">Save</button>
                                                <button type="button" class="btn btn-primary btn-update">Update</button>
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
