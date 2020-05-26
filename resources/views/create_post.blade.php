@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Novo Post') }}</div>

                <div class="card-body">
                
                    <form method="POST" action="{{ route('home.store') }}">
                        @csrf
                  

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Título') }}</label>

                            <div class="col-md-10">
                                <input id="title" type="text" placeholder="Título" class="form-control  @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      
                        <div class="form-group row">
                            <label for="description" class="col-md-2 col-form-label text-md-right" >{{ __('Descrição') }}</label>

                            <div class="col-md-10">
                                <textarea id="description" class="form-control  @error('description') is-invalid @enderror"  name="description" placeholder="Descrição"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="url" class="col-md-2 col-form-label text-md-right">{{ __('URL da imagem') }}</label>

                            <div class="col-md-10">
                                <input id="url" type="text" placeholder="URL da imagem" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                   

                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-2">
                              <div class="row">
                                    <div class="col-md-3">
                                            <a href="{{ url()->previous() }}" type="button" class="btn btn-secondary">Voltar</a>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Cadastrar') }}
                                            </button>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
