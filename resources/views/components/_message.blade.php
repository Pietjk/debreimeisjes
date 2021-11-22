<?php
    $type = $type ?? 'primary';
    $messages = is_array($message) ? $message : [$message];
    $icon = ($icon ?? false) ? '<i class="fas fa-'.$icon.' me-3"></i> ' : '' ;
?>

<div class="alert alert-{{ $type }} fs-5" role="alert">
    <ul class="list-group">
        @foreach ($messages as $message)
            <li class="list-group-item list-group-item-{{ $type }} border-0">
                {!! e($icon) !!}
                {{ $message }}
            </li>
        @endforeach
    </ul>
</div>
