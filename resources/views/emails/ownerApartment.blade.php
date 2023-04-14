@component('mail::message')
# Reservation Confirmation for Apartment {{ $apartmentNumber }}

Dear {{ $ownerName }},

We are pleased to confirm that apartment number **{{ $apartmentNumber }}** has been reserved for the dates of **{{ $startDate }}** to **{{ $endDate }}**. The reservation was made by **{{ $userName }}**.

Please take note of the following details for your reference:

**Apartment Number:** {{ $apartmentNumber }}
**Check-in Date:** {{ $startDate }}
**Check-out Date:** {{ $endDate }}
**Guest Name:** {{ $userName }}

We kindly ask that you make the necessary arrangements to ensure that the apartment is ready for the guest's arrival on **{{ $startDate }}**. We understand that first impressions are everything, and we want to ensure that your guest's stay is comfortable and enjoyable. This includes ensuring that the apartment is sparkling clean and all necessary amenities are in working order.

If you have any questions or concerns, please do not hesitate to contact us. We appreciate your cooperation and look forward to providing your guest with an unforgettable experience.

Thank you for choosing **{{ $companyName }}**. We are committed to exceeding your expectations.

Warm regards,

Your friends at **{{ $companyName }}**
@endcomponent
