@extends('production.layout._html')
@section('title','Product Page')


@section('content')

    {{--PRODUCTS WRAPPER--}}
    <section class = "products-page-wrapper">

    @if( is_object($products))
            @if(!(empty($products)))
                @foreach( $products as $product)
                    <div class = "product col-xs-4" id = "prod-{{$product->id}}">
                        <header class = "title">
                            <h2 class = "name">{{$product->name}}</h2>
                        </header>
                        <div class = "content">
                            <p class = "description">{{$product->description}}
                                <span class = "price">{{$product->price}}</span>
                            </p>
                        </div>
                        <div class = "clearfix"></div>
                    </div>
                @endforeach

            @else
                <div class = "product col-xs-12" id = "prod-{{$product->id}}">
                    <header class = "title">
                        <h2 class = "name">{{$product->name}}</h2>
                    </header>
                    <div class = "content">
                        <p class = "description">{{$product->description}}
                            <span class = "price">{{$product->price}}</span>
                        </p>
                    </div>
                </div>
            @endif
        @endif
    </section>


@stop

