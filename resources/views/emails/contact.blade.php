@component('mail::message')
You got a message !!!

Name:&nbsp;&nbsp;<strong>{{$data['name']}}</strong><br>
Email:&nbsp;&nbsp;{{$data['email']}}<br>
Subject:&nbsp;&nbsp;<strong>{{$data['subject']}}</strong><br>
Message:<br>{{$data['message']}}

@endcomponent
