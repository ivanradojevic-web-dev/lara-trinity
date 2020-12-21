@component('mail::message')
# Comment Approved

Your comment on thread "{{ $postname }}" has approved.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
