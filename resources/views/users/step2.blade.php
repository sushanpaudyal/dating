@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>Add Dating Profile</h1>
            <div> <strong> <br />
                    Add Dating Profile for free by filling out the form below
                </strong>
                <div> <br />
                    <h6 class="inner">Add Dating Profile :</h6>
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
                                        <option>Select</option>
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