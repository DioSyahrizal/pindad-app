@php
    $isApproved = $mato  === 1;
    $isRejected = $mato  === 0;
@endphp

<span @class([
        'badge',
        'text-bg-danger' => $isRejected,
        'text-bg-primary' => $isApproved,
])>
    {{$status}}
</span>
