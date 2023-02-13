@extends('layouts.app')

@section('content')
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/flightajax.js') }}"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" id="flights-header">{{ __('Flights') }}
                        <button type="button" class="btn btn-xs btn-primary float-right add">Add Flight</button>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table id="flight" class="table table-bordered table-condensed table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>arcid</th>
                                <th>rule</th>
                                <th>acType</th>
                                <th>adep</th>
                                <th>ades</th>
                                <th>eet</th>
                                <th>dof</th>
                                <th>flevel</th>
                                <th>speed</th>
                                <th>route</th>
                                <th>remark</th>
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
                                            <h5 class="modal-title">New Flight</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="hidden" name="id">

                                            <div class="form-group">
                                                <label for="arcid">arcid</label>
                                                <input type="text" name="arcid" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="rule">rule</label>
                                                <input type="text" name="rule" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="acType">acType</label>
                                                <input type="text" name="acType" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="adep">adep</label>
                                                <input type="text" name="adep" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="ades">ades</label>
                                                <input type="text" name="ades" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="eet">eet</label>
                                                <input type="time" name="eet" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="dof">dof</label>
                                                <input type="date" name="dof" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="flevel">flevel</label>
                                                <input type="text" name="flevel" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="speed">speed</label>
                                                <input type="text" name="speed" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="route">route</label>
                                                <input type="text" name="route" class="form-control input-sm">
                                            </div>
                                            <div class="form-group">
                                                <label for="remark">remark</label>
                                                <input type="text" name="remark" class="form-control input-sm">
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
