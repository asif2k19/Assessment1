<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')
@extends('layouts.app_layout')

<form class="registration" id="user_registration" action="/postregistration" method="POST">
    {{ csrf_field() }}
<div class="row">

    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">




            <h2>Basic Information <small>Please enter your basic information in the field provide.</small></h2>
            <hr class="colorgraph">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="first_name" >First Name *</label>
                    <div class="form-group">

                        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="last_name" >Last Name *</label>
                    <div class="form-group">

                        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="last_name" >Email *</label>
                <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="4">
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="password" >Password *</label>
                        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="confoirmpassword" >Confirm Password *</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Confirm Password" tabindex="6">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label for="dob" >Date of Birth *</label>


                        <div class="input-group date " data-provide="datepicker">
                            <input type="text" name="dob" id="dob" class="form-control input-lg" placeholder="Enter date of birth" tabindex="5">
                            <div class="input-group-addon ">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                        <!-- <input type="text" name="dob" id="dob" class="form-control input-lg" placeholder="Enter date of birth" tabindex="5"> -->
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="gender" >Gender *</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="male" name="gender" value="male" checked>Male
                        <label class="form-check-label" for="male"></label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="female" name="gender" value="female">Female
                        <label class="form-check-label" for="female"></label>
                      </div>
                </div>

            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label" for="annualincome">Annual Income</label>
                        <input type="number" id="annualincome" name="annualincome" class="form-control input-lg" />

                      </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group">
                    <label for="occupation" >Occupation</label>
                    <select class="form-select form-select-lg mb-3 " aria-label="Default select example" id="occupation" name="occupation">
                        <option value="" selected>Open this select menu</option>
                        <option value="private">Private Job</option>
                        <option value="govt">Government Job</option>
                        <option value="business">Business</option>
                      </select>
                </div>

            </div>
        </div>


        <div class="row">

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                <label for="familytype" >Family Type</label>
                <select class="form-select form-select-lg mb-3 " aria-label="Default select example" id="familytype" name="familytype">
                    <option value="" selected>Open this select menu</option>
                    <option value="joint">Joint Family</option>
                    <option value="nuclear">Nuclear Family</option>

                  </select>
            </div>

        </div>


        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="form-group">
            <label for="manglik" >Manglik</label>
            <select class="form-select form-select-lg mb-3 " aria-label="Default select example" id="manglik" name="manglik">

                <option value="Yes">Yes</option>
                <option value="No">No</option>

              </select>
        </div>

    </div>
    </div>


            <div class="row">
                <div class="col-xs-4 col-sm-3 col-md-3">
                    <!-- <span class="button-checkbox">
        <button type="button" class="btn" data-color="info" tabindex="7">I Agree</button>
        <input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
    </span> -->
                </div>
                <!-- <div class="col-xs-8 col-sm-9 col-md-9">
                    By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
                </div> -->
            </div>

            <h2>Partner Preference <small>Please select preference.</small></h2>
            <hr class="colorgraph">

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="expectedincome">Expected Income</label>
                    <div class="form-group">
                        <p>
                            <label for="amount">Price range:</label>
                            <input type="text" id="amount" name="amount"  readonly style="border:0; color:#f6931f; font-weight:bold;">
                          </p>

                          <div id="slider-range"></div>

                          <input type="hidden" id="start"  name="start" value="0">
                          <input type="hidden" id="finish" name="finish" value="300">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="last_name" >Occupation</label>
                    <div class="form-group">

                        <select class="selectpicker"  name="occupationsearch[]" id="occupationsearch" multiple  >
                            <option>Private Job</option>
                            <option>Government Job</option>
                            <option>Business</option>
                          </select>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="familytypesrch">Family Type</label>
                    <div class="form-group">

                        <select class="selectpicker" name="familytypesearch[]" multiple >
                            <option>Joint Family</option>
                            <option>Nuclear Family</option>

                          </select>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <label for="last_name" >Manglik</label>
                    <div class="form-group">

                        <select class="form-select form-select-lg mb-3 " aria-label="Default select example" id="mangliksrch" name="mangliksrch">

                            <option value="Yes">Yes</option>
                            <option value="No">No</option>

                          </select>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7">


                </div>
                <div class="col-xs-12 col-md-6"><a href="/login" class="btn btn-success btn-block btn-lg">Sign In</a></div>
                <a href="{{ route('google.login') }}" class="btn btn-google btn-user btn-block">
                    <i class="fab fa-google fa-fw"></i> Login with Google
                </a>


            </div>
        </form>
    </div>
</div>
</form>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>





@endsection


@section('scripts')



<script>

$('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '-3d'
});




  $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 10000000,
      values: [ 0, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "Rs" + ui.values[ 0 ] + " - Rs" + ui.values[ 1 ] );
        $("#start").val(ui.values[ 0 ]);
         $("#finish").val(ui.values[ 1 ]);
      }
    });
    $( "#amount" ).val( "Rs" + $( "#slider-range" ).slider( "values", 0 ) +
      " - Rs" + $( "#slider-range" ).slider( "values", 1 ) );

  } );
  </script>





@endsection
