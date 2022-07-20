
@props(['name', 'label', 'value' => '', 'id', 'placeholder', 'dataDtp', 'required' => false])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    <input value='{{ $value }}' name='{{ $name }}' {{ $required ? 'required' : '' }} type="text" placeholder='{{ $placeholder }}' data-dtp='{{ $dataDtp }}' class="form-control" id="{{ $id }}">

    @error($name)
        <p class='text-danger'>{{ $message }}</p>
    @enderror
</div>