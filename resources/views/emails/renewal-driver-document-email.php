<html>

<body>

    <div style="width: 100%; height: 80px; border-bottom: solid 1px #000">
        <img src="{{asset('images/email-header-logo.jpg')}}" >
    </div>

    <div style="padding-left: 70px; padding-top: 20px">
        <h3>Your document is expiring</h3>
        <p>Please update your {{$document->document->name}} by {{$document->expiredate}} to continue using the Turvy app</p>

        <a href="{{url('/driver/email/verify/'.$verification_code.'/driver')}}">Update now<i class="material-icons">arrow-forward</i></a>

    </div>

    <div style="width: 80%; height: 10px; margin: 110px auto 0 auto; border-bottom: solid 1px #000;">

    </div>

    <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">

        <img src="{{asset('images/email-footer-logo.jpg')}}" style="margin-left: 20px; margin-top: 15px">

    </div>

    <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff; font-family: 'Times New Roman'; font-size: 12px; padding-top: 10px">

        Copyright 2023 by Turvy Pty Ltd. All rights Reserved

    </div>

</body>

</html>

