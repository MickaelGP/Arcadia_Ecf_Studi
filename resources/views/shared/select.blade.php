@php
    $class ??= null;
    $needLabel ??= false;
    $name ??= '';
    $id ??= 'select'.ucfirst($name);
    $label ??= ucfirst($name);
@endphp



<div @class($class)>
    @if ($needLabel)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    <select class="form-select" name="{{ $name }}" id="{{ $id }}" required>
        <option selected>Sélectionner une valeur</option>
        @forelse ($options as $valeur)
         <option value="{{ $valeur->id }}">{{ $valeur->label }}</option>
        @empty
            <h1>Aucune données</h1>
        @endforelse

    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
