@extends('template')
@section('content')

<a href="/" class=" btn btn-primary"> Strona główna</button></a>
<h3>Wyrzut 1 tony paliwa</h3>

@if (isset($errorforms) && $errorforms != "")
<div class="alert alert-danger" role="alert">
    {{$errorforms}}
</div>
@endif

<div class="container">
    <form action="" method="Post">
        @csrf
        <div class="form-group">
            <label>Prędkość wyrzutu (m/s)</label>
            <input type="text" name="sped1" class="form-control" placeholder="" value="{{$sped1}}">
        </div>

        <div class="form-group">
            <label>Prędkość do osiągniecia (m/s)</label>
            <input type="text" name="sped2" class="form-control" placeholder="" value="{{$sped2}}">
        </div>

        <div class="form-group">
            <input type="hidden" value="1" name="save" />

            <input type="submit" class="btn btn-info" value="Oblicz" />
        </div>
    </form>

    @if ($calco)
    <h4>Masa</h4>
    {{$calco['mk']}} Tona <br />
    @endif
</div>

@endsection('content')