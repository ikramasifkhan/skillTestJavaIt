@php
    $actions = [
                    'edit'=>route('class.edit', $class->id),
                    'active'=>route('class.ActiveInactive', $class->id),
                    'inactive'=>route('class.ActiveInactive', $class->id),
                    'delete' =>route('class.destroy', $class->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $class->status }}" />
