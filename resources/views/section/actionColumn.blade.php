@php
    $actions = [
                    'edit'=>route('section.edit', $section->id),
                    'active'=>route('section.ActiveInactive', $section->id),
                    'inactive'=>route('section.ActiveInactive', $section->id),
                    'delete' =>route('section.destroy', $section->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $section->status }}" />
