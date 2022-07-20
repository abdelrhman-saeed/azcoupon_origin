@props(['name', 'label', 'value' => '', 'id' => '', 'class' => '', 'rows' => '3', 'required' => false, 'notes' => ''])

<div class="mb-3">
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    
    <small class='text-info'>{{ $notes }}</small>
    
    <textarea rows='{{ $rows }}' name='{{ $name }}' {{ $required ? 'required' : '' }} class="form-control {{ $class }}" id="{{ $id }}">{{ $value }}</textarea>

    @error($name)
        <p class='text-danger'>{{ $message }}</p>
    @enderror
    
</div>