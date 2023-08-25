<option value="">select area</option>
@foreach ($records as $area)
    <option value="{{ $area->id }}" @if ($area->id == $user->area_id) selected @endif>
        {{ $area->name }}
    </option>
@endforeach
