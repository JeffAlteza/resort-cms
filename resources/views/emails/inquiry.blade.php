<x-mail::message>
# New Inquiry Notification
<hr>
<p>Inquiry Details:</p>
<p><strong>Email:</strong> {{ ($data['email']) }}</p>
<p><strong>Cellphone Number:</strong> {{ $data['cellphone'] }}</p>
<p><strong>Subject:</strong> {{ $data['subject'] }}</p>
<p><strong>Message:</strong> {{ $data['message'] }}</p>
<hr>
Thank you!
</x-mail::message>
