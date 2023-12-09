<!-- resources/views/components/select.blade.php -->

@props(['options', 'name', 'selected' => null])

<select name="{{ $name }}" {{ $attributes }} class="'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mb-4">
    @foreach($options as $value => $label)
        <option value="{{ $value }}" @if($value == $selected) selected @endif>{{ $label }}</option>
    @endforeach
</select>
