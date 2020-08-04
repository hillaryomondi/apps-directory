@component('mail::message')
# New ticket created in Apps Directory.

## Application name: {{$ticket->suApplication->name}}

Reporter Name: <strong>{{$ticket->reporter_name}}</strong>

Reporter Email: <strong>{{$ticket->reporter_email}}</strong>

## Ticket Title: {{$ticket->title}}

## Ticket Description

<p>{{$ticket->description}}</p>

@component('mail::button', ['url' => $ticket->suApplication->url])
Go to Application
@endcomponent

Please resolve ticket within SLA time.

Thanks,<br>
{{ config('app.name') }}
@endcomponent




