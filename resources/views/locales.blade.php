@if(count($locales) > 0 &&  count($weathers) > 0)
    @foreach($locales as $locale)
        <div class="row mt-4">
            <div class="col-12">
                <h4 class="text-center"><b>Previsão para {{$locale->name}}</b></h4>
            </div>
        </div>
        @foreach($weathers as $weather)
            @if($weather->locale->id == $locale->id)
                <div class="row justify-content-center mt-3">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{Carbon\Carbon::parse($weather->date)->format('d/m/Y')}}</h5>
                                <p>{{$weather->text}}</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="figure">
                                                    <img src="{{asset('icons/upload.png')}}" alt="" class="figure-img img-fluid rounded">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <h3 class="text-primary">{{$weather->max}} °C</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="figure">
                                                    <img src="{{asset('icons/download.png')}}" alt="" class="figure-img img-fluid rounded">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <h3 class="text-danger">{{$weather->min}} °C</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="figure">
                                                    <img src="{{asset('icons/raindrop-close-up.png')}}" alt="" class="figure-img img-fluid rounded">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <h3>{{$weather->precipitation}} mm</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <figure class="figure">
                                                    <img src="{{asset('icons/protection-symbol-of-opened-umbrella-silhouette-under-raindrops.png')}}" alt="" class="figure-img img-fluid rounded">
                                                </figure>
                                            </div>
                                            <div class="col-9">
                                                <h3>{{$weather->probability}}%</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endforeach
@else
    <h3 class="text-center"> SEM REGISTRO</h3>
@endif