@extends('rider.layouts.app')

@section('style')

    <style>

    </style>

@endsection



@section('content')

    <div style="padding:10px;">

        <div style="padding: 0 20px;">
            <h1 style="text-align: center">Turvy Wallet</h1>
            <hr/>
            <div style="margin: 10px 5px; padding: 10px; background:#D0D0D0; display: flex; flex-direction: column; justify-content:flex-start; border-radius: 10px;">
                <span>Balance</span>
                <h3>A$0.00</h3>
                <p>Payout scheduled: 13 December</p>
                <button type="button" style="padding: 10px; border-radius: 17px; width: 100px; margin: 10px 0;"><i class="fa fa-star"></i> Cash out</button>
            </div>
            <div style="margin: 20px 5px;">
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <h4>Payment methods</h4>
                    <button type="button" style="padding: 10px; border-radius: 20px; width: 70px; background: black; color: white" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> Add</button>
                    <div id="add" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add a payment method</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="display: flex; flex-direction: column; justify-content: flex-start">
                                        <div id="stripe" style="display:flex;flex-direction: row; align-items: center; margin: 10px 0; cursor: pointer;">
                                            <img src="{{asset('images/stripe.png')}}" width="50px" height="30px"/>
                                            <p style="margin-left: 20px;">Credit or debit card</p>
                                        </div>
                                        <hr/>
                                        <div id="reward" style="display:flex;flex-direction: row; align-items: center;margin: 10px 0; cursor: pointer;">
                                            <img src="{{asset('images/reward.png')}}" width="50px" height="30px"/>
                                            <p style="margin-left: 20px;">Reward Points</p>
                                        </div>
                                        <hr/>
                                        <div id="paypal" style="display:flex;flex-direction: row; align-items: center;margin: 10px 0; cursor: pointer;">
                                            <img src="{{asset('images/paypal.png')}}" width="50px" height="30px"/>
                                            <p style="margin-left: 20px;">PayPal</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: row; justify-content: space-between; margin: 10px 0;">
                    <div style="width: 28%; height: 200px; background: cornflowerblue; padding: 10px; border-radius: 10px;">
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>Credit Card</span>
                            <i class="fa fa-credit-card"></i>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>XXXX-XXXX-XXXX-XXXX-XX</span>
                        </div>
                    </div>
                    <div style="width: 28%; height: 200px; background: rgb(87, 233, 135); padding: 10px;border-radius: 10px;">
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>Reward Points</span>
                            <i class="fa fa-comment"></i>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>admin@turvy.net</span>
                        </div>
                    </div>
                    <div style="width: 28%; height: 200px; background: rgb(0, 174, 255); padding: 10px;border-radius: 10px;">
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>PayPal</span>
                            <i class="fa fa-comment"></i>
                        </div>
                        <div style="display: flex; flex-direction: row; justify-content: space-between;color: white;">
                            <span>admin@turvy.net</span>
                        </div>
                    </div>
                </div>
                <div style="margin: 20px 0">
                    <h4>Profiles</h4>
                    <div style="display: flex; flex-direction: row;align-items: center; margin: 10px 0;">
                        <i class="fa fa-user" style="margin-right: 20px; width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; background: black; border-radius: 50%; color: white;"></i>
                        <div style="width: 100%;"><h5>Personal</h5><hr/></div>
                    </div>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <i class="fa fa-gift" style="margin-right: 20px; width: 25px; height: 25px; display: flex; align-items: center; justify-content: center; background: blue; border-radius: 50%; color: white;"></i>
                        <div style="display: flex;flex-direction: column; width: 100%;"><h5>Business</h5><p>PayPal-admin@turvy.net</p></div>
                    </div>
                </div>
                <div id="modal-reward" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add a payment method</h4>
                            </div>
                            <div class="modal-body">
                                <h1>Reward points</h1>
                            </div>
                        </div>

                    </div>
                </div>
                <div id="modal-stripe" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add credit or debit card</h4>
                            </div>
                            <div class="modal-body">
                                <div style="display: flex; flex-direction: column;">
                                    <div style="display: flex; flex-direction: column;">
                                        <p>Card number</p>
                                        <input type="text" name="card_number" class="form-control"/>
                                    </div>
                                    <div style="display: flex; flex-direction: row; justify-content: space-between; gap: 2;">
                                        <div style="display: flex; flex-direction: column;">
                                            <p>Exp.date</p>
                                            <input type="text" name="card_number" class="form-control"/>
                                        </div>
                                        <div style="display: flex; flex-direction: column;">
                                            <p>Security code</p>
                                            <input type="text" name="card_number" class="form-control"/>
                                        </div>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <p>Country</p>
                                        <select class="form-control">
                                            <option>Australia</option>
                                        </select>
                                    </div>
                                    <div style="display: flex; flex-direction: column;">
                                        <p>Postcode</p>
                                        <input type="text" name="card_number" class="form-control"/>
                                    </div>
                                    <button class="btn btn-primary">Add card</button>
                                    <button class="btn btn-default">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="modal-paypal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Add PayPal</h4>
                            </div>
                            <div class="modal-body">
                                <div style="display: flex; flex-direction: column;">
                                    <p>you will be re-directed to PayPal to verify your account.</p>
                                    <button type="button" class="btn" style="background: #121314; color: white; font-style: italic">PayPal</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



@section('script')

    <script type="text/javascript">

        $(document).ready(function(){
            $('#stripe').on('click', function(){
                $('#add').modal('hide');
                $('#modal-stripe').modal('show');
            });
            $('#reward').on('click', function(){
                $('#add').modal('hide');
                $('#modal-reward').modal('show');
            });
            $('#paypal').on('click', function(){
                $('#add').modal('hide');
                $('#modal-paypal').modal('show');
            });
        })

    </script>

@endsection



