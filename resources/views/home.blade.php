@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center border-bottom">Nosotros</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title text-center border-bottom">Nuestro Servicio</h5>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="..." class="card-img" alt="...">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center border-bottom">Conoce Nuestros Clientes</h5>
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <vs-avatar></vs-avatar>
                            <blockquote class="text-muted text-right">
                                <i class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</i>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                        <div class="col-md-4 border-right">
                            <vs-avatar></vs-avatar>
                            <blockquote class="text-muted text-right">
                                <i class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</i>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                        <div class="col-md-4 border-right">
                            <vs-avatar></vs-avatar>
                            <blockquote class="text-muted text-right">
                                <i class="mb-0">"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante."</i>
                                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
