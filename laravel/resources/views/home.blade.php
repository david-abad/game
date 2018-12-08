@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p>HOLA</p>
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                   

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
