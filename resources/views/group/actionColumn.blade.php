@php
    $actions = [
                    'edit'=>route('group.edit', $group->id),
                    'active'=>route('group.ActiveInactive', $group->id),
                    'inactive'=>route('group.ActiveInactive', $group->id),
                    'delete' =>route('group.destroy', $group->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $group->status }}" />
