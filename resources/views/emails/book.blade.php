<x-mail::message>
# New Booking Notification
<hr>
<p>Booking Details:</p>
<p><strong>Name:</strong> {{ ($data['name']) }}</p>
<p><strong>Email:</strong> {{ ($data['email']) }}</p>
<p><strong>Cellphone Number:</strong> {{ $data['cellphone'] }}</p>
<p><strong>Checkin Date:</strong> {{ $data['checkin'] }}</p>
<p><strong>Checkout Date:</strong> {{ $data['checkout'] }}</p>
<p><strong>Message:</strong> {{ $data['message'] }}</p>
<hr>
Thank you!
</x-mail::message>
