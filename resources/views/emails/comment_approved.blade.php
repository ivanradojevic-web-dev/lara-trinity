@component('mail::message')
# Comment Approved

Your comment on thread "{{ $channelname }}" has been approved.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
