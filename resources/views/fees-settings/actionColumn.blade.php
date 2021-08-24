@php
$actions = [
    'edit' => route('fees-setup.edit', $feesSetup->id),
    'active' => route('fees-setup.ActiveInactive', $feesSetup->id),
    'inactive' => route('fees-setup.ActiveInactive', $feesSetup->id),
    'delete' => route('fees-setup.destroy', $feesSetup->id),
];
@endphp

<x-action-component :actions="$actions" status="{{ $feesSetup->status }}" />
