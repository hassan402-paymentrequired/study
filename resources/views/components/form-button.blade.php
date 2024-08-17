<button {{ $attributes->merge(['class' => 'w-full p-2 bg-gray-800 ring-1  text-white text-sm font-bold']) }}>
    {{ $slot }}
</button>