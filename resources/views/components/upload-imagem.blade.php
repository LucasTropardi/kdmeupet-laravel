<!-- resources/views/components/upload-imagem.blade.php -->

@props(['disabled' => false])

<div>
    <label for="imagem" class="mt-2 font-medium text-md text-gray-900">Selecione uma imagem*</label>
    <input type="file" id="imagem" name="anFoto" accept=".jpg, .jpeg, .png"
           {{ $disabled ? 'disabled' : '' }}
           {!! $attributes->merge(['class' => 'border-gray-300 font-medium text-md focus:border-indigo-600 focus:ring-indigo-600 rounded-lg shadow-lg bg-white text-gray-900 py-2 px-3']) !!}>
    @error('imagem')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
