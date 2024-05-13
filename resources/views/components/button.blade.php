<button {{ $attributes->merge(['class' => 'btn' . $type, 'type' => $buttonType]) }}>{{ $slot }}</button>
