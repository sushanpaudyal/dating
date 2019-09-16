@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>Add Dating Profile</h1>
            <div> <strong> <br />
                    Add Dating Profile for free by filling out the form below
                </strong>
                <div> <br />
                    <h6 class="inner">Personal Information:</h6>
                    <br />


                    <form action="{{route('step2')}}" method="post">



                        @csrf
                        <table width="80%" cellpadding="10" cellspacing="10">
                            <tr>
                                <td align="left" valign="top" class="body" ><strong> DOB:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="dob" id="dob" type="text" size="22" /></td>
                            </tr>


                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Gender:</strong></td>
                                <td align="left" valign="top">
                                    <select name="gender" id="gender" style="width: 143px;">
                                        <option>Select</option>
                                        <option value="Male"> Male </option>
                                        <option value="Female"> Female </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Height:</strong></td>
                                <td align="left" valign="top">
                                    <select name="height" id="height" style="width: 143px">
                                        <option>Feet/Inches</option>
                                        <option value="4' 0'"> 4'0"" </option>
                                        <option value="4' 1'"> 4' 1"" </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Marital Status:</strong></td>
                                <td align="left" valign="top">
                                    <select name="maritial_status" id="maritial_status" style="width: 143px;">
                                        <option>Select maritial status</option>
                                        <option value="Unmarried"> Unmarried </option>
                                        <option value="Married"> Married </option>
                                        <option value="Divorced">Divorced</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Annulled">Annulled</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Body Type:</strong></td>
                                <td align="left" valign="top">
                                    <select name="body_type" id="body_type" style="width: 143px;">
                                        <option>Select body type</option>
                                        <option value="Slim"> Slim </option>
                                        <option value="Average"> Average </option>
                                        <option value="Athletic"> Athletic </option>
                                        <option value="heavy"> Heavy </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Complexion:</strong></td>
                                <td align="left" valign="top">
                                    <select name="body_type" id="body_type" style="width: 143px;">
                                        <option >Select</option>
                                        <option value="Very Fair">Very Fair</option>
                                        <option value="Fair">Fair</option>
                                        <option value="Wheatish">Wheatish</option>
                                        <option value="Dark">Dark</option>
                                    </select>
                                </td>
                            </tr>



                            <tr>
                                <td align="left" valign="top" class="body" ><strong> City:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="city" id="city" type="text" size="22" /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> State:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="state" id="state" type="text" size="22" /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Country:</strong></td>
                                <td align="left" valign="top">
                                    <select name="country" id="country" style="width: 143px;">
                                        <option >Select</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_name}}">{{$country->country_name}}</option>
                                            @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Language:</strong></td>
                                <td align="left" valign="top">
                                    <select name="language" id="language" multiple style="width: 143px;">
                                        <option >Select</option>
                                        @foreach($languages as $language)
                                            <option value="{{$language->name}}">{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td></td>
                                <td><input type="submit" class="button" value="Submit" /></td>
                            </tr>


                        </table>
                    </form>

                </div>
                <div>
                </div>

                <div class="clear"></div>
            </div>

@endsection