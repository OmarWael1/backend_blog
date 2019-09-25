@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">{{ __('Add Paint') }}</div>
          @if (session('message'))
            <div class="alert alert-success">
              {{ session('message') }}
            </div>
          @endif
          <div class="card-body">
            <form method="POST" action="{{ route('addPaint') }}" enctype="multipart/form-data">
              @csrf

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                <div class="col-md-6">
                  <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}"  required autocomplete="name" autofocus>

                  @error('title')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                <textarea id="description"  type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  >
                </textarea>
                  @error('description')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Collection') }}</label>

                <div class="col-md-6">
                  <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="collection" required>
                    <option value="published">نشرت</option>
                    <option value="unpublished">لم تنشر</option>
                  </select>
                  @error('collection')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Date of publication') }}</label>

                <div class="col-md-6">
                  <input  type="text" class="form-control @error('date_of_publication') is-invalid @enderror" name="date_of_publish" value="{{ old('date_of_publication') }}"  required autocomplete="name" autofocus>

                  @error('date_of_publication')
                  <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                  @enderror
                </div>
              </div>

              <div class="form-group row">
                <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Paint File') }}</label>

                <div class="col-md-6">
                  <input  type="file" accept="image/*"   name="file_name"  required>
                </div>
              </div>
              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Add') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
