<!-- resources/views/components/upload-imagem.blade.php -->

@props(['disabled' => false, 'inputName' => 'anFoto'])

<div>
    <label for="{{ $inputName }}" class="text-left block font-medium text-md text-gray-900">Selecione uma imagem*</label>
    <input type="file" id="{{ $inputName }}" name="{{ $inputName }}" accept=".jpg, .jpeg, .png"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge(['class' => 'block w-full text-sm font-medium text-gray-900 border border-gray-500 rounded-lg cursor-pointer bg-gray-50 focus:outline-none mb-4']) !!}>
    @error($inputName)
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
