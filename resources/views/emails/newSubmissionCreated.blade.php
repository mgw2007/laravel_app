@component('mail::message')
<h3>Welcome</h3>
New Submission Received: {{ $submisson->getSubmissionType() }} #{{ $submisson->getDisplayId() }}
<br/>
<br/>
from user email : {{ $submisson->getUser()->email }}
<br />
<br />

Thanks,<br>
{{ config('app.name') }}
@endcomponent