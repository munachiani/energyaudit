@extends('layout.master')
@section('contents')
    <section>
        <div class="section-body">






            <div class="card">
                <div class="card-head card-head-sm style-custom">
                    <header>
                        Manage Users
                        <small class="pull-right">
                            <a href="{{url('dashboard')}}">
                                <i class="fa fa-angle-double-left"></i>&nbsp; Back to Dashboard
                            </a>
                        </small>
                    </header>
                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="datatables-1" class="table table-banded table-hover" cellspacing="1">
                                    <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Role(s)</th>
                                        <th>Status</th>
                                        <th>Region Assigned</th>
                                        <th>State</th>
                                        <th></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>

                                        <td>Adeola Garba Wole</td>
                                        <td>garba@yahoo.com</td>
                                        <td>08034654797</td>
                                        <td>
                                            Disco
                                        </td>
                                        <td>
                                            Active
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="{{url('Users/Edit')}}">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="{{url('Users/Activate')}}">Deactivate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Aloz Aloz Aloz</td>
                                        <td>aloznew@gmail.com</td>
                                        <td>080876767676</td>
                                        <td>
                                            General Supervisor
                                        </td>
                                        <td>
                                            Active
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Edit/fba023e5-05ca-46c6-a079-aabb783ab80a">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Deactivate/fba023e5-05ca-46c6-a079-aabb783ab80a">Deactivate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Fasae Taiwo Damilola</td>
                                        <td>taiwofasae@yahoo.co.uk</td>
                                        <td>07038012196</td>
                                        <td>
                                            Field Agent
                                        </td>
                                        <td>
                                            Active
                                        </td>
                                        <td>
                                            Ikole
                                        </td>
                                        <td>
                                            Ekiti
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Edit/7f18b898-7b5f-4a1d-878f-36bf03b7550c">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Deactivate/7f18b898-7b5f-4a1d-878f-36bf03b7550c">Deactivate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Kayode Yode Kay</td>
                                        <td>korttech@gmail.com</td>
                                        <td>09090909090</td>
                                        <td>
                                            Field Agent
                                        </td>
                                        <td>
                                            Inactive
                                        </td>
                                        <td>
                                            Ikeja, Lagos-Island, Lagos-Mainland, Surulere
                                        </td>
                                        <td>
                                            Lagos, Lagos, Lagos, Lagos
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="{{url('Users/Edit')}}">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="">Activate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Temitope Taiwo Damilola</td>
                                        <td>taiwofasae@mailinator.com</td>
                                        <td>07038012196</td>
                                        <td>
                                            Field Agent
                                        </td>
                                        <td>
                                            Inactive
                                        </td>
                                        <td>
                                            Ikeja
                                        </td>
                                        <td>
                                            Lagos
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Edit/43a142dc-4996-41e9-9562-30aa6f68977a">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Activate/43a142dc-4996-41e9-9562-30aa6f68977a">Activate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Yusuf Ali Ade</td>
                                        <td>yusuf@gmail.com</td>
                                        <td>08098989898</td>
                                        <td>
                                            Disco
                                        </td>
                                        <td>
                                            Active
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Edit/9ffb4144-9e19-4e38-909d-de59134e4af8">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Deactivate/9ffb4144-9e19-4e38-909d-de59134e4af8">Deactivate</a>

                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Yusuf Yusuf Yusuf</td>
                                        <td>yusufn@gmail.com</td>
                                        <td>08078787878</td>
                                        <td>
                                            Disco
                                        </td>
                                        <td>
                                            Active
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>
                                        <td>
                                            Not yet assigned
                                        </td>

                                        <td>
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Edit/c753259b-7be5-4023-860a-152ec0dc3e5c">Edit</a> &nbsp;|&nbsp;
                                            <a class="btn btn-xs btn-raised ink-reaction btn-default" href="/Users/Deactivate/c753259b-7be5-4023-860a-152ec0dc3e5c">Deactivate</a>

                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div><!--end .section-body -->
        <div class="row">
            <div class="col-md-12">
                <div class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <img src="{{url('Content/img/FedRepNig.png')}}" class="footer-logo" />
                            <br/>
                            <p class="col-md-12">
                                        <span>
                                            &copy; Copyright 2016 - Advisory Power Team. All rights reserved.
                                        </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop