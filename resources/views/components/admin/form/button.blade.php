@props(['type', 'extraclasses' => ''])

<button type="submit" class="btn {{ $type }} px-5 {{ $extraclasses }}">
    {{ $slot }}
</button>