@php
    $actions = [
                    'edit'=>route('payment.edit', $payment->id),
                    'active'=>route('payment.ActiveInactive', $payment->id),
                    'inactive'=>route('payment.ActiveInactive', $payment->id),
                    'delete' =>route('payment.destroy', $payment->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $payment->status }}" />
