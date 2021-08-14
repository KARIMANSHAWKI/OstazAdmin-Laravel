@extends('dashboard.layouts.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            @foreach ($trainerCount as $key => $value)
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div class="widget-content">
                            <div class="w-header">
                                <div class="w-info">
                                    <h6 class="value">{{ $value }} Teachers</h6>
                                </div>
                            </div>
                            <div class="w-content">
                                <div class="w-info">
                                    <p class="value"> {{ $key }} <span>Total number</span> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-trending-up">
                                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                            <polyline points="17 6 23 6 23 12"></polyline>
                                        </svg></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value"> All Teachers</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="w-info">
                                <p class="value"> {{$allTrainerCount}} <span>Total number</span> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trending-up">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value"> All Programs</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="w-info">
                                <p class="value"> {{$programsCount}} <span>Total number</span> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trending-up">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                <div class="widget widget-card-four">
                    <div class="widget-content">
                        <div class="w-header">
                            <div class="w-info">
                                <h6 class="value"> All Students</h6>
                            </div>
                        </div>
                        <div class="w-content">
                            <div class="w-info">
                                <p class="value"> {{$studentsCount}} <span>Total number</span> <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-trending-up">
                                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                        <polyline points="17 6 23 6 23 12"></polyline>
                                    </svg></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
