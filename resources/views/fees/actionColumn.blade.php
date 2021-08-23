@php
    $actions = [
                    'edit'=>route('fees.edit', $fees->id),
                    'active'=>route('fees.ActiveInactive', $fees->id),
                    'inactive'=>route('fees.ActiveInactive', $fees->id),
                    'delete' =>route('fees.destroy', $fees->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $fees->status }}" />
