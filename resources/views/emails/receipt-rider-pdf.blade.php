<html>
<body>
    <div style="width: 100%; height: 80px; border-bottom: solid 1px #000">
        <img src="{{asset('images/email-header-logo.jpg')}}" >
    </div>
    <div style="padding-left: 70px; padding-top: 20px">
        <h3>Thanks for registering with turvy family.</h3>
        <p>Please login to your admin by clicking on the link to Update the following </p>
      <ul>
         <li>Profile</li>
         <li>Payment Method</li>
     </ul>
		<a href="{{url('/rider/email/verify/'.$verification_code.'/rider')}}">Click</a>
    </div>
    <div style="width: 80%; height: 10px; margin: 110px auto 0 auto; border-bottom: solid 1px #000;">
    </div>
    <div style="width: 100%; height: 225px; margin-top: 50px; background-color: #216da9;">
        <img src="{{asset('images/email-footer-logo.jpg')}}" style="margin-left: 20px; margin-top: 15px">
    </div>
    <div style="width: 100%; height: 28px; background-color: #000000; text-align: center; color: #ffffff; font-family: 'Times New Roman'; font-size: 12px; padding-top: 10px">
        Copyright 2010 by Turvy Pty Ltd. All rights Reserved
    </div>
</body>
</html>
