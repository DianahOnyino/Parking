@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="MainController" ng-init="next_available_spot = ''">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Stock Items
                    </div>

                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection