@extends('dashboard.layouts.app')
@section('content')
    <!--  BEGIN MAIN CONTAINER  -->

                    <div class="layout-px-spacing mt-4">

                        <div class="user-profile layout-spacing">
                            <div class="widget-content widget-content-area">
                                <div class="d-flex justify-content-between">
                                    <h3 class="">Notifications</h3>
                                </div>

                              <div class="row">
                                  <div class="col-5">
                                    <div class="user-info-list">

                                        <div class="">
                                            <ul class="contacts-block list-unstyled">
                                                <li class="contacts-block__item">
                                                    Send To :  <select class="form-select form-control" id="country" name="country" aria-label="Default select example">
                                                        <option value="">All</option>
                                                        <option value="">Students</option>
                                                        <option value="">Trainers</option>

                                                      </select>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="chat-box">
                                        <form method="post" >
                                            <textarea style="margin-bottom:50px;" name="message" class="form-control" id="message"  rows="15"></textarea>
                                            <a href="javascript:void(0);" style="width: 80px; float: right; margin-top: -20px; margin-bottom:20px" class="btn-add">Send</a>
                                        </form>
                                    </div>
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
    @endsection




