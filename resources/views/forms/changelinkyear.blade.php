<form class="pull-right form-inline" action="{{ url('manage') }}">
    <div class="form-group">
        <select name="year" id="year" class="form-control" value="{{ old('year') }}" onchange="this.form.submit()">
            <option value="" disabled selected=""></option>
            @foreach ($availableLinkYears as $year)
                <option value="{{ $year->start_year }}" {{ setActiveSelect($year->start_year) }}>
                    {{ $year->start_year }}-{{ $year->start_year + 1 }}
                </option>
            @endforeach
        </select>
    </div>
</form>
