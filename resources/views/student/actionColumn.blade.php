@php
    $actions = [
                    'show'=>route('student.show', $student->id),
                    'edit'=>route('student.edit', $student->id),
                    'active'=>route('student.ActiveInactive', $student->id),
                    'inactive'=>route('student.ActiveInactive', $student->id),
                    'delete' =>route('student.destroy', $student->id),
                ];
@endphp

<x-action-component :actions="$actions" status="{{ $student->status }}" />
