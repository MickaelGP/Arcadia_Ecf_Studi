@php
    $feedBack ??= false;
    $needLabel ??= false;
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $id ??= $name.ucfirst($type);
    $value ??= '';
    $messagePerso ??= 'Le champ n\'est pas conforme';
    $placeholder ??= ucfirst($name);
    $label ??= ucfirst($name);
@endphp

<div @class($class)>
    @if ($needLabel)
        <label for="{{ $name }}">{{ $label }}</label>
    @endif
    @if ($type === 'textarea')
        <textarea class="form-control @error($name) is-invalid @enderror" type="{{ $type }}" name="{{ $name }}"
            id="{{ $id }}" placeholder="{{ $placeholder }}" required>
        {{ old($name, $value) }}
    </textarea>
    @else
        <input class="form-control @error($name) is-invalid @enderror" type="{{ $type }}"
            name="{{ $name }}" value="{{ old($name, $value) }}" id="{{ $id }}"
            placeholder="{{ $placeholder }}" required>
    @endif
    @if ($feedBack)
        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    @else
        <div class="invalid-feedback">
           <strong> {{ $messagePerso }} </strong>
        </div>
    @endif
</div>
