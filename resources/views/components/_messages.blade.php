<?php $bag = (isset($bag)) ? $bag :'default'; ?>


@if ($errors->{$bag}->any())
    @include('components._message', ['type' => 'danger', 'icon' => 'exclamation-circle', 'message' => $errors->{$bag}->all()])
@endif

@if ($bag === 'default' && session()->has('warning'))
    @include('components._message', ['icon' => 'exclamation-circle', 'message' => session()->get('warning')])
@endif

@if ($bag === 'default' && session()->has('success'))
    @include('components._message', ['type' => 'success', 'icon' => 'info-circle', 'message' => session()->get('success')])
@endif
