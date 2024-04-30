<div>
    <label for="title">{{ __('app.conference_title') }}:</label>
    <input type="text" name="title" id="title" value="{{ old('title', $conference->title ?? '') }}" required>
</div>

<div>
    <label for="date">{{ __('app.date') }}:</label>
    <input type="date" name="date" id="date" value="{{ old('date', $conference->date ?? '') }}" required>
</div>

<div>
    <label for="time">{{ __('app.time') }}:</label>
    <input type="time" name="time" id="time" value="{{ old('time', $conference->time ?? '') }}" required>
</div>
