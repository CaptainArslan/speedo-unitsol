<option value="">- Change Timing -</option>
@foreach ($records as $item)
    <option value="{{ $item->id }}">
        {{ $item->getName() }}
    </option>
@endforeach
