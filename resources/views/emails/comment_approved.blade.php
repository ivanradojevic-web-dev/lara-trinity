@component('mail::message')
# Comment Approved

Your comment on thread "{{ $postname }}" has been approved.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
