<?php
use App\User;
$datingCount = User::datingProfileExists(Auth::user()['id']);
if($datingCount == 1){
    $datingCountText = "My Dating Profile";
    $datingCountText2 = "Update Dating Profile for free by filling out the form below";

} else {
    $datingCountText = "Add Dating Profile";
    $datingCountText2 = "Add Dating Profile for free by filling out the form below";

}

$datingProfile = User::datingProfileDetails(Auth::user()['id']); ?>
?>

@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>{{$datingCountText}}</h1>
            <div> <strong> <br />
                    {{$datingCountText2}}
                </strong>
                <div> <br />
                    <h6 class="inner">Personal Information:</h6>
                    <br />


                    <form action="{{route('step2')}}" method="post" id="datingForm">



                        @csrf
                        <table width="80%" cellpadding="10" cellspacing="10">
                            <tr>
                                <td align="left" valign="top" class="body" ><strong> DOB:</strong></td>
                                <td align="left" valign="top"><input @if(!empty($datingProfile['dob'])) value="{{$datingProfile['dob']}}"  @endif autocomplete="off" name="dob" id="dob" type="text" size="22" style="width: 208px; font-size: 14px;" required /></td>
                            </tr>


                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Gender:</strong></td>
                                <td align="left" valign="top">
                                    <select name="gender" id="gender" style="width: 208px; font-size: 14px; " required>
                                        <option>Select</option>
                                        <option value="Male" @if(!empty($datingProfile['gender'])) @if($datingProfile->gender == "Male") selected @endif @endif> Male </option>
                                        <option value="Female" @if(!empty($datingProfile['gender'])) @if($datingProfile->gender == "Female") selected @endif @endif> Female </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Height:</strong></td>
                                <td align="left" valign="top">
                                    <select name="height" id="height" style="width: 208px; font-size: 14px; ">
                                        <option>Feet/Inches</option>
                                        <option value="4'0'" @if(!empty($datingProfile['height'])) @if($datingProfile->height == "4'0'") selected @endif @endif> 4'0"" </option>
                                        <option value="4'1'" @if(!empty($datingProfile['height'])) @if($datingProfile->height == "4'1'") selected @endif @endif> 4' 1"" </option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Marital Status:</strong></td>
                                <td align="left" valign="top">
                                    <select name="maritial_status" id="maritial_status" style="width: 208px; font-size: 14px; ">
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
                                    <select name="body_type" id="body_type" style="width: 208px; font-size: 14px; ">
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
                                    <select name="body_type" id="body_type" style="width: 208px; font-size: 14px; ">
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
                                <td align="left" valign="top"><input autocomplete="off" name="city" id="city" type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> State:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="state" id="state" type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Country:</strong></td>
                                <td align="left" valign="top">
                                    <select name="country" id="country" style="width: 208px; font-size: 14px; ">
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
                                    <select name="languages[]" id="language" multiple style="width: 208px; font-size: 14px; ">
                                        <option >Select</option>
                                        @foreach($languages as $language)
                                            <option value="{{$language->name}}">{{$language->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Hobbies:</strong></td>
                                <td align="left" valign="top">
                                    <select name="hobbies[]" id="hobby" multiple style="width: 208px; font-size: 14px; ">
                                        <option >Select</option>
                                        @foreach($hobbies as $hobby)
                                            <option value="{{$hobby->title}}">{{$hobby->title}}</option>
                                        @endforeach
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h6 class="inner">Education & Carrer</h6>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Highest Education:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="education" id="education" type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Occupation:</strong></td>
                                <td align="left" valign="top">
                                    <select name="occupation" id="occupation" style="width: 208px; font-size: 14px; ">

                                        <option value="">--</option>

                                        <option value="Student">Student</option>

                                        <option value="Not working">Not working</option>

                                        <option value="Non-mainstream">Non-mainstream</option>

                                        <option value="Accountant">Accountant</option>

                                        <option value="Acting">Acting</option>

                                        <option value="Actor">Actor</option>

                                        <option value="Administration">Administration</option>

                                        <option value="Advertising">Advertising</option>

                                        <option value="Advocate">Advocate</option>

                                        <option value="Air Hostess">Air Hostess</option>

                                        <option value="Airlines">Airlines</option>

                                        <option value="Architect">Architect</option>

                                        <option value="Artisan">Artisan</option>

                                        <option value="Audiologist">Audiologist</option>

                                        <option value="Banker">Banker</option>

                                        <option value="Beautician">Beautician</option>

                                        <option value="Biologist/Botanist">Biologist/Botanist</option>

                                        <option value="Business Person">Business Person</option>

                                        <option value="Chartered Accountant">Chartered Accountant</option>

                                        <option value="Chemist">Chemist</option>

                                        <option value="Civil Engineer">Civil Engineer</option>

                                        <option value="Clerical Official">Clerical Official</option>

                                        <option value="Commercial Pilot">Commercial Pilot</option>

                                        <option value="Company Secretary">Company Secretary</option>

                                        <option value="Computer Professional">Computer Professional</option>

                                        <option value="Consultant">Consultant</option>

                                        <option value="Contractor">Contractor</option>

                                        <option value="Cost Accountant">Cost Accountant</option>

                                        <option value="Creative Person">Creative Person</option>

                                        <option value="Customer Support">Customer Support</option>

                                        <option value="Defence Employee">Defence Employee</option>

                                        <option value="Dentist">Dentist</option>

                                        <option value="Designer">Designer</option>

                                        <option value="Doctor">Doctor</option>

                                        <option value="Economist">Economist</option>

                                        <option value="Engineer">Engineer</option>

                                        <option value="Engineer (Mechanical)">Engineer (Mechanical)</option>

                                        <option value="Engineer (Project)">Engineer (Project)</option>

                                        <option value="Entertainment">Entertainment</option>

                                        <option value="Event Manager">Event Manager</option>

                                        <option value="Executive">Executive</option>

                                        <option value="Factory worker">Factory worker</option>

                                        <option value="Farmer">Farmer</option>

                                        <option value="Fashion Designer">Fashion Designer</option>

                                        <option value="Finance">Finance</option>

                                        <option value="Flight Attendant">Flight Attendant</option>



                                        <option value="Freelancer">Freelancer</option>

                                        <option value="Government Employee">Government Employee</option>

                                        <option value="Health Care">Health Care</option>

                                        <option value="Home Maker">Home Maker</option>

                                        <option value="Hotel &amp; Restaurant">Hotel &amp; Restaurant</option>

                                        <option value="Human Resources">Human Resources</option>

                                        <option value="Interior Designer">Interior Designer</option>

                                        <option value="Investment">Investment</option>

                                        <option value="IT/Telecom">IT/Telecom</option>

                                        <option value="Journalist">Journalist</option>

                                        <option value="Lawyer">Lawyer</option>

                                        <option value="Lecturer">Lecturer</option>

                                        <option value="Legal">Legal</option>

                                        <option value="Manager">Manager</option>

                                        <option value="Marketing">Marketing</option>

                                        <option value="Media">Media</option>

                                        <option value="Medical">Medical</option>

                                        <option value="Medical Transcriptionist">Medical Transcriptionist</option>

                                        <option value="Merchant Naval Officer">Merchant Naval Officer</option>

                                        <option value="Model">Model</option>

                                        <option value="Nurse">Nurse</option>

                                        <option value="Occupational Therapist">Occupational Therapist</option>

                                        <option value="Optician">Optician</option>

                                        <option value="Pharmacist">Pharmacist</option>

                                        <option value="Physician Assistant">Physician Assistant</option>

                                        <option value="Physicist">Physicist</option>

                                        <option value="Physiotherapist">Physiotherapist</option>

                                        <option value="Pilot">Pilot</option>

                                        <option value="Politician">Politician</option>

                                        <option value="Production">Production</option>

                                        <option value="Professor">Professor</option>

                                        <option value="Psychologist">Psychologist</option>

                                        <option value="Public Relations">Public Relations</option>

                                        <option value="Real Estate">Real Estate</option>

                                        <option value="Research Scholar">Research Scholar</option>

                                        <option value="Retired Person">Retired Person</option>

                                        <option value="Retail">Retail</option>

                                        <option value="Sales">Sales</option>

                                        <option value="Scientist">Scientist</option>

                                        <option value="Self-employed Person">Self-employed Person</option>

                                        <option value="Social Worker">Social Worker</option>

                                        <option value="Software Consultant">Software Consultant</option>

                                        <option value="Software Engineer">Software Engineer</option>

                                        <option value="Sportsman">Sportsman</option>

                                        <option value="Student">Student</option>

                                        <option value="Teacher">Teacher</option>

                                        <option value="Technician">Technician</option>

                                        <option value="Training">Training</option>

                                        <option value="Transportation">Transportation</option>

                                        <option value="Veterinary Doctor">Veterinary Doctor</option>

                                        <option value="Volunteer">Volunteer</option>

                                        <option value="Web Designer">Web Designer</option>

                                        <option value="Writer">Writer</option>

                                        <option value="Zoologist">Zoologist</option>

                                        <option value="Other">Other</option>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Income:</strong></td>
                                <td align="left" valign="top">
                                    <select name="income" style="width: 208px; font-size: 14px; " >

                                        <option value="">--</option>

                                        <option value="Under $25,000">Under $25,000</option>

                                        <option value="$25,001-50,000">$25,001-50,000</option>

                                        <option value="$50,001-75,000">$50,001-75,000</option>

                                        <option value="$75,001-100,000">$75,001-100,000</option>

                                        <option value="$100,001-150,000">$100,001-150,000</option>

                                        <option value="$150,001-200,000">$150,001-200,000</option>

                                        <option value="$200,001 and above">$200,001 and above</option>

                                    </select>
                                </td>
                            </tr>


                            <tr>
                                <td colspan="2">
                                    <h6 class="inner">About Myself</h6>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> About me:</strong></td>
                                <td align="left" valign="top">
                                    <textarea name="about_myself" id="about_myself" style="width: 208px; font-size: 14px; height: 70px;" ></textarea>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2">
                                    <h6 class="inner">About My Preferred Partner</h6>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Partner Details:</strong></td>
                                <td align="left" valign="top">
                                    <textarea name="about_partner" id="about_partner" style="width: 208px; font-size: 14px; height: 70px;"></textarea>
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