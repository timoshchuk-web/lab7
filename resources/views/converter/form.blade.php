<script src="../resources/js/converter.js"></script>

<form class = "main-form" method="POST" action="{{route("converter.convert")}}">
    @csrf

    @if (Session::has('Converted'))
        <div>
            Converted value = {{ Session::get('Converted') }}
        </div>
    @endif

    <div class="form-labels">
    <div class="form-control">
        <label for="sum">Value</label>
        <input id="sum" name="sum" type="text" class="@error('sum') is-invalid @enderror">
        @error('sum')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <label for="currency">From</label>
        {{Form::select("currency_from", $currencies ?? [])}}
        @error('currency_from')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-control">
        <label for="currency">To</label>
        {{Form::select("currency_to", $currencies ?? [])}}
        @error('currency_to')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    </div>
    <div class="form-control button-container">
        <button type="submit">Ok</button>
    </div>

</form>
