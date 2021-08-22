Hello <i>{{ $vmail->receiver }}</i>,
<p>{{ $vmail->sender }} are requested for {{ $vmail->blood_group }} blood near you. </p>

<p><u>Details:</u></p>

<div>
    <p><b>Blood Group:</b>&nbsp;{{ $vmail->blood_group }}</p>
    <p><b>Donation Date:</b>&nbsp;{{ $vmail->date }}</p>
    <p><b>Donation Location:</b>&nbsp;{{ $vmail->hospital }}</p>
    <p><b>Mobile No:</b>&nbsp;{{ $vmail->mobile_no }}</p>
    <p><b>Click Here to accept:</b>&nbsp;<a href="{{route('request.view',$vmail->url)}}"> Accept </a></p>
</div>

Thank You,
<br/>
<i>{{ $vmail->sender }}</i>
