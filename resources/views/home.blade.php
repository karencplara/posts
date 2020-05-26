@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                        <div class="col-md-10">
                            Posts
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('home.create')}}" type="button" class="btn btn-primary">Novo Post</a>
                        </div>
                   </div>
                </div>

                <div class="card-body">
                    @if (session('mensagem'))
                        <div class="alert alert-success" role="alert">
                            {{ session('mensagem') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach($posts as $post)
                        
                            <div class="col-md-4">
                                <div class="card">  
                                        <img src="..." class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$post->title}}</h5>
                                            <p class="card-text">{{$post->description}}</p>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ route('home.edit', $post->id)}}" class="btn btn-secondary">Editar</a>  
                                                </div>
                                                <div class="col-md-3">
                                                    <form action="{{route('home.destroy', $post->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button onclick="return confirm('Deseja realmente remover este item?')" class="btn btn-danger" type="submit">Remover</button>
                                                    </form>
                                                </div>
                                           </div>
                                           
                                        </div>
                                </div>
                            </div>
                    
                        @endforeach
                        
                    </div>

                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
