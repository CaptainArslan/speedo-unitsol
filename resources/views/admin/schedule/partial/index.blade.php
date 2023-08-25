<option value="">--select subscription--</option>
@foreach ($record as $item)
    <option value="{{ $item->id }}">
        {{ $item->swimmingClass->name . '- AED' . $item->price }}
    </option>
@endforeach
