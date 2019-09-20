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

$datingProfile = User::datingProfileDetails(auth()->user()->id);

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
                        @if(!empty($datingProfile->user_id))
                        <input type="hidden" name="user_id" value="{{$datingProfile->user_id}}">
                        @endif
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
                                        <option value="Unmarried" @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Unmarried") selected @endif @endif> Unmarried </option>
                                        <option value="Married"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Married") selected @endif @endif> Married </option>
                                        <option value="Divorced"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Divorced") selected @endif @endif>Divorced</option>
                                        <option value="Widowed"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Widowed") selected @endif @endif>Widowed</option>
                                        <option value="Separated"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Separated") selected @endif @endif>Separated</option>
                                        <option value="Annulled"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Annulled") selected @endif @endif>Annulled</option>
                                        <option value="Other"  @if(!empty($datingProfile['maritial_status'])) @if($datingProfile->maritial_status == "Other") selected @endif @endif>Other</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Body Type:</strong></td>
                                <td align="left" valign="top">
                                    <select name="body_type" id="body_type" style="width: 208px; font-size: 14px; ">
                                        <option>Select body type</option>
                                        <option value="Slim"  @if(!empty($datingProfile['body_type'])) @if($datingProfile->body_type == "Slim") selected @endif @endif> Slim </option>
                                        <option value="Average" @if(!empty($datingProfile['body_type'])) @if($datingProfile->body_type == "Average") selected @endif @endif> Average </option>
                                        <option value="Athletic" @if(!empty($datingProfile['body_type'])) @if($datingProfile->body_type == "Athletic") selected @endif @endif> Athletic </option>
                                        <option value="heavy" @if(!empty($datingProfile['body_type'])) @if($datingProfile->body_type == "heavy") selected @endif @endif> Heavy </option>
                                    </select>
                                </td>
                            </tr>





                            <tr>
                                <td align="left" valign="top" class="body" ><strong> City:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="city" id="city" @if(!empty($datingProfile['city'])) value="{{$datingProfile['city']}}"  @endif type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> State:</strong></td>
                                <td align="left" valign="top"><input autocomplete="off" name="state" @if(!empty($datingProfile['state'])) value="{{$datingProfile['state']}}"  @endif id="state" type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Country:</strong></td>
                                <td align="left" valign="top">
                                    <select name="country" id="country" style="width: 208px; font-size: 14px; ">
                                        <option >Select</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->country_name}}" @if(!empty($datingProfile['country'])) @if($datingProfile->country == $country->country_name) selected @endif @endif>{{$country->country_name}}</option>
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
                                            <option value="{{$language->name}}" <?php if (!empty($datingProfile->languages)) { if(preg_match('/'.$language->name.'/i', $datingProfile->languages)) { echo "selected" ; } }?>>{{$language->name}}</option>
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
                                            <option value="{{$hobby->title}}" <?php if (!empty($datingProfile->hobbies)) { if(preg_match('/'.$hobby->title.'/i', $datingProfile->hobbies)) { echo "selected" ; } } ?>>{{$hobby->title}}</option>
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
                                <td align="left" valign="top"><input autocomplete="off" name="education" id="education" @if(!empty($datingProfile['education'])) value="{{$datingProfile['education']}}"  @endif type="text" size="22" style="width: 208px; font-size: 14px; " /></td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Occupation:</strong></td>
                                <td align="left" valign="top">
                                    <select name="occupation" id="occupation" style="width: 208px; font-size: 14px; ">

                                        <option value="">--</option>

                                        <option value="Student" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Student") selected @endif @endif>Student</option>

                                        <option value="Not working" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Not working") selected @endif @endif>Not working</option>

                                        <option value="Non-mainstream" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Non-mainstream") selected @endif @endif>Non-mainstream</option>

                                        <option value="Accountant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Accountant") selected @endif @endif>Accountant</option>

                                        <option value="Acting" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Acting") selected @endif @endif>Acting</option>

                                        <option value="Actor" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Actor") selected @endif @endif>Actor</option>

                                        <option value="Administration" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Administration") selected @endif @endif>Administration</option>

                                        <option value="Advertising" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Advertising") selected @endif @endif>Advertising</option>

                                        <option value="Advocate" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Advocate") selected @endif @endif>Advocate</option>

                                        <option value="Air Hostess" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Air Hostess") selected @endif @endif>Air Hostess</option>

                                        <option value="Airlines" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Airlines") selected @endif @endif>Airlines</option>

                                        <option value="Architect" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Architect") selected @endif @endif>Architect</option>

                                        <option value="Artisan" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Artisan") selected @endif @endif>Artisan</option>

                                        <option value="Audiologist" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Audiologist") selected @endif @endif>Audiologist</option>

                                        <option value="Banker" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Banker") selected @endif @endif>Banker</option>

                                        <option value="Beautician" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Beautician") selected @endif @endif>Beautician</option>

                                        <option value="Biologist/Botanist" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Biologist/Botanist") selected @endif @endif>Biologist/Botanist</option>

                                        <option value="Business Person" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Business Person") selected @endif @endif>Business Person</option>

                                        <option value="Chartered Accountant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Chartered Accountant") selected @endif @endif>Chartered Accountant</option>

                                        <option value="Chemist" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Chemist") selected @endif @endif>Chemist</option>

                                        <option value="Civil Engineer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Civil Engineer") selected @endif @endif>Civil Engineer</option>

                                        <option value="Clerical Official" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Clerical Official") selected @endif @endif>Clerical Official</option>

                                        <option value="Commercial Pilot" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Commercial Pilot") selected @endif @endif>Commercial Pilot</option>

                                        <option value="Company Secretary" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Company Secretary") selected @endif @endif>Company Secretary</option>

                                        <option value="Computer Professional" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Computer Professional") selected @endif @endif>Computer Professional</option>

                                        <option value="Consultant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Consultant") selected @endif @endif>Consultant</option>

                                        <option value="Contractor" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Contractor") selected @endif @endif>Contractor</option>

                                        <option value="Cost Accountant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Cost Accountant") selected @endif @endif>Cost Accountant</option>

                                        <option value="Creative Person" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Creative Person") selected @endif @endif>Creative Person</option>

                                        <option value="Customer Support" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Customer Support") selected @endif @endif>Customer Support</option>

                                        <option value="Defence Employee" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Defence Employee") selected @endif @endif>Defence Employee</option>

                                        <option value="Dentist" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Dentist") selected @endif @endif>Dentist</option>

                                        <option value="Designer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Designer</option>

                                        <option value="Doctor" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Doctor") selected @endif @endif>Doctor</option>

                                        <option value="Economist" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Economist") selected @endif @endif>Economist</option>

                                        <option value="Engineer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Engineer") selected @endif @endif>Engineer</option>

                                        <option value="Engineer (Mechanical)" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Engineer (Mechanical)") selected @endif @endif>Engineer (Mechanical)</option>

                                        <option value="Engineer (Project)" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Engineer (Project)") selected @endif @endif>Engineer (Project)</option>

                                        <option value="Entertainment" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Entertainment") selected @endif @endif>Entertainment</option>

                                        <option value="Event Manager" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Event Manager") selected @endif @endif>Event Manager</option>

                                        <option value="Executive" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Executive") selected @endif @endif>Executive</option>

                                        <option value="Factory worker" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Factory worker") selected @endif @endif>Factory worker</option>

                                        <option value="Farmer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Farmer") selected @endif @endif>Farmer</option>

                                        <option value="Fashion Designer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Fashion Designer") selected @endif @endif>Fashion Designer</option>

                                        <option value="Finance" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Finance") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Finance</option>

                                        <option value="Flight Attendant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Flight Attendant") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Flight Attendant</option>



                                        <option value="Freelancer" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Freelancer") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Freelancer</option>

                                        <option value="Government Employee" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Government Employee") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Government Employee</option>

                                        <option value="Health Care" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Health Care") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Health Care</option>

                                        <option value="Home Maker" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Home Maker") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Home Maker</option>

                                        <option value="Hotel &amp; Restaurant" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Hotel &amp; Restaurant") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Hotel &amp; Restaurant</option>

                                        <option value="Human Resources" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Human Resources") selected @endif @endif @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Designer") selected @endif @endif>Human Resources</option>


                                        <option value="Other" @if(!empty($datingProfile['occupation'])) @if($datingProfile->occupation == "Other") selected @endif @endif>Other</option>

                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Income:</strong></td>
                                <td align="left" valign="top">
                                    <select name="income" style="width: 208px; font-size: 14px; " >

                                        <option value="">--</option>

                                        <option value="Under $25,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "Under $25,000") selected @endif @endif>Under $25,000</option>

                                        <option value="$25,001-50,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$25,001-50,000") selected @endif @endif>$25,001-50,000</option>

                                        <option value="$50,001-75,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$50,001-75,000") selected @endif @endif>$50,001-75,000</option>

                                        <option value="$75,001-100,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$75,001-100,000") selected @endif @endif>$75,001-100,000</option>
                                        <option value="$100,001-150,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$100,001-150,000") selected @endif @endif>$100,001-150,000</option>
                                        <option value="$150,001-200,000" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$150,001-200,000") selected @endif @endif>$150,001-200,000</option>

                                        <option value="$200,001 and above" @if(!empty($datingProfile['income'])) @if($datingProfile->income == "$200,001 and above") selected @endif @endif>$200,001 and above</option>

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
                                    <textarea name="about_myself" id="about_myself" style="width: 208px; font-size: 14px; height: 70px;" >
                                        @if(!empty($datingProfile['about_myself'])) {{$datingProfile['about_myself']}}  @endif
                                    </textarea>
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
                                    <textarea name="about_partner" id="about_partner" style="width: 208px; font-size: 14px; height: 70px;">
                                        @if(!empty($datingProfile['about_partner'])) {{$datingProfile['about_partner']}}  @endif
                                    </textarea>
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