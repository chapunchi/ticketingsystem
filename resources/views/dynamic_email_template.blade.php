@if($data['name']!=1)
    <p>Hi, {{ $data['name'] }}</p>
    <p>Your inquiry has been received.</p>
    <p>Your reference number is  {{ $data['refno'] }}.</p>
@elseif ($data['name']==1)
    <p>Your reference number {{ $data['refno'] }} has been updated.</p>
    <p>Please check the ticket status on http://127.0.0.1:8000/ticketstatus</p>
@endif
