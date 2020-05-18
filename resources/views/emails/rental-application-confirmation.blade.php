@component('mail::message')
# Order Shipped

Your order has been shipped!

@component('mail::button', ['url' => route('rentals.show', [$application->rental])])
    View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
