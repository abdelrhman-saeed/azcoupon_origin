@props(['name', 'label', 'value' => '', 'id', 'type' => 'text', 'required' => false, 'notes' => '', 'step' => ''])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>

    <small class='text-info'>{{ $notes }}</small>

    <input step='{{ $step }}' autocomplete='off' value='{{ $value }}' name='{{ $name }}' {{ $required ? 'required' : '' }} type="{{ $type }}" class="form-control" id="{{ $id }}">

    @error($name)
        <p class='text-danger'>{{ $message }}</p>
    @enderror

</div>