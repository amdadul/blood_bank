Hello {{ $vmail->receiver }},
{{ $vmail->sender }} are requested for {{ $vmail->blood_group }} blood near you.

Details:

    Blood Group: {{ $vmail->blood_group }}
    Donation Date: {{ $vmail->date }}
    Donation Location: {{ $vmail->hospital }}
    Mobile No: {{ $vmail->mobile_no }}
    Click Here to accept:


Thank You,
{{ $vmail->sender }}
