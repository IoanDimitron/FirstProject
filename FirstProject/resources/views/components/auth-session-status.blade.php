@props(['status'])

@if ($status)
    <div {{ $attributes->erge(['class' => 'font-medium text-sm text-green-600']) }}>
        {{ $status }}
    </div>
@endif
