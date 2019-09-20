@extends('layouts.frontLayout.front_design')

@section('content')
    <div id="right_container">
        <div style="padding:20px 15px 30px 15px;">
            <h1>My Photos</h1>
            <div> <strong> <br />
                   You can upload your multiple photos of your choice:
                </strong>
                <div> <br />
                    <h6 class="inner">Upload Photos:</h6>
                    <br />


                    <form action="{{route('step3')}}" method="post" id="datingForm" enctype="multipart/form-data">
                        @csrf

                        <table width="80%" cellpadding="10" cellspacing="10">
                            <tr>
                                <td align="left" valign="top" class="body" ><strong> Photos:</strong></td>
                                <td align="left" valign="top"><input  autocomplete="off" name="photo[]" id="photo" type="file" multiple="multiple" size="22" style="width: 208px; font-size: 14px;" required /></td>
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