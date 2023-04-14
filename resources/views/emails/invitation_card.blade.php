@component('mail::message')
# Your Apartment Reservation has been Confirmed

Dear {{ $userName }},

We are pleased to inform you that your reservation for apartment number **{{ $apartmentNumber }}** has been confirmed for the dates of **{{ $startDate }}** to **{{$endDate}}**. Your reservation was made under the name of **{{$userName}}**.

Please take note of the following details for your reference:

 ** Apartment Number: **{{ $apartmentNumber }}
 ** location : ** {{$location}}
 ** dimensions: ** {{$dimansions}}
 ** descrption: ** {{$descriptions}}
 ** Check-in Date: ** {{ $startDate }}
 ** Check-out Date: ** {{$endDate}}


We look forward to hosting you during your stay. If you have any questions or concerns, please do not hesitate to contact us.

Thank you for choosing **{{ $companyName }}** for your accommodation needs.

Best regards,

{{ $companyName }}
@endcomponent
