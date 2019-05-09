@extends('layouts.app')

@section('content')
    <div class="container-fluid" ng-controller="MainController" ng-init="next_available_spot = ''">
        <div class="grid-x justify-content-center">
            <div class="cell large-12 medium-12 small-12">
                <div class="card">
                    <div class="card-header">
                        Available Parking Spots
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a class=""
                           data-open="nextAvailableVehicleModal">

                            Next Available Spot : <%next_available_spot%>
                        </a> &nbsp;&nbsp;

                        <a class="" href="#" data-open="lowestNumberModal">
                            Available Parking Slot with Lowest Number
                        </a>&nbsp;&nbsp;

                        <a class="float-right" href="#" data-open="parkVehicleModal">
                            Park Vehicle
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </a>

                        <div class="small reveal" id="nextAvailableVehicleModal" data-reveal ng-controller="MainController">
                            <div class="card modal-space-top">
                                <div class="card-body no-padding">
                                    <div class="grid-x">
                                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                                            <label class="centralized-label" for="vehicle_type">
                                                Select Vehicle Type:</label><br>
                                        </div>
                                        <div class="cell large-6 medium-6 small-12">
                                            <select name="vehicle_type" ng-model="vehicle_type" required>
                                                <option value="car">Car</option>
                                                <option value="motorbike">Motorbike</option>
                                                <option value="bus">Bus</option>
                                                <option value="trailer">Trailer</option>
                                            </select>
                                            Vehicle type: <%vehicle_type%>

                                            <a ng-click="displayNextAvailableParkingSpots(vehicle_type)"
                                               style="margin-bottom: -5px;"
                                               class="button" aria-label="Close modal" data-close>
                                                submit
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="small reveal" id="parkVehicleModal" data-reveal>
                            <div class="card modal-space-top">
                                <div class="card-body no-padding">
                                    <div class="grid-x">
                                        <div class="cell large-3 large-offset-1 medium-3 medium-offset-1 small-12">
                                            <label class="centralized-label" for="vehicle_type">
                                                Select Vehicle Type:</label><br>
                                        </div>

                                        <div>
                                            <form action="{!! route('park', $parkingLotStartNo) !!}">
                                                <div class="cell large-6 medium-6 small-12">
                                                    <select name="vehicle_type" required>
                                                        <option value="car">Car</option>
                                                        <option value="motorbike">Motorbike</option>
                                                        <option value="bus">Bus</option>
                                                        <option value="trailer">Trailer</option>
                                                    </select>

                                                    <input type="submit" value="Submit" class="button float-right">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="small reveal" id="createChildRecordModal" data-reveal>
                            <button class="close-button" data-close aria-label="Close modal" type="button">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">
                        <table st-pipe="callServer" st-table="parking_records" class="table responsive table-scroll">
                            <thead class="no_head_style">
                            <tr>
                                <th colspan="4">
                                    <input st-search class="form-control" placeholder="Search ..." type="text"/>
                                </th>
                            </tr>
                            </thead>

                            <thead>
                            <tr>
                                <td></td>
                                <td>Parking Number</td>
                                <td>Occupied</td>
                            </tr>
                            </thead>

                            <tbody ng-show="!isLoading">
                            <tr ng-if="parking_records.length != 0"
                                ng-repeat="parking_record in parking_records track by $index" ng-cloak>
                                <td><% $index+1 %></td>
                                <td><% parking_record.number %></td>
                                <td ng-if="parking_record.occupied == 0">No</td>
                            </tr>
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection