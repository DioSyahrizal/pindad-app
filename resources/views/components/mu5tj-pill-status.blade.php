@php
    $isApproved = $status  === 1;
    $isRejected = $status  === 0;
@endphp

<span @class([
        'badge',
        'text-bg-danger' => $isRejected,
        'text-bg-primary' => $isApproved,
])>
    {{$status}}
</span>
