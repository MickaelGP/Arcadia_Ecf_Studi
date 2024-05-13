<button {{ $attributes->merge(['class' => 'btn' . $type, 'type' => $buttonType, 'id' => $idName]) }}>{{ $slot }}</button>
