@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <div style="margin-top:15px;">
                        <ul>
                            Endpoints
                            <li>
                                Store
                                <ul>
                                    <li> Add : api/tracker_record/store   <i style="color:cadetblue">attributes to fill [user_id,time_in]</i></li>
                                    <li> Update : api/tracker_record/store/{id}   <i style="color:cadetblue">attributes to fill [id,time_out]</i></li>
                                </ul>
                            </li>
                            <li>
                                Fetch
                                <ul>
                                    <li> api/tracker_record/user/{id} <i style="color:cadetblue">id = user's id</i></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
