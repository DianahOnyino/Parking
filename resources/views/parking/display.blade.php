@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Parking Records
                        <a class="float-right" href="#" data-open="#">
                            Add
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>

                        <div class="small reveal" id="createChildRecordModal" data-reveal>
                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection