@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">

      <div class="card-header">
        <h1>
          Site /
          @if($site->id)
            Edit #{{ $site->id }}
          @else
            Create
          @endif
        </h1>
      </div>

      <div class="card-body">
        @if($site->id)
          <form action="{{ route('sites.update', $site->id) }}" method="POST" accept-charset="UTF-8">
          <input type="hidden" name="_method" value="PUT">
        @else
          <form action="{{ route('sites.store') }}" method="POST" accept-charset="UTF-8">
        @endif

          @include('common.error')

          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          
                <div class="form-group">
                    <label for="title-field">Title</label>
                    <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $site->title ) }}" />
                </div> 
                <div class="form-group">
                    <label for="domain-field">Domain</label>
                    <input class="form-control" type="text" name="domain" id="domain-field" value="{{ old('domain', $site->domain ) }}" />
                </div> 
                <div class="form-group">
                    <label for="config-field">Config</label>
                    <input class="form-control" type="text" name="config" id="config-field" value="{{ old('config', $site->config ) }}" />
                </div> 
                <div class="form-group">
                    <label for="user_id-field">User_id</label>
                    <input class="form-control" type="text" name="user_id" id="user_id-field" value="{{ old('user_id', $site->user_id ) }}" />
                </div> 
                <div class="form-group">
                	<label for="keyword-field">Keyword</label>
                	<input class="form-control" type="text" name="keyword" id="keyword-field" value="{{ old('keyword', $site->keyword ) }}" />
                </div> 
                <div class="form-group">
                	<label for="description-field">Description</label>
                	<input class="form-control" type="text" name="description" id="description-field" value="{{ old('description', $site->description ) }}" />
                </div> 
                <div class="form-group">
                	<label for="logo-field">Logo</label>
                	<input class="form-control" type="text" name="logo" id="logo-field" value="{{ old('logo', $site->logo ) }}" />
                </div> 
                <div class="form-group">
                	<label for="icp-field">Icp</label>
                	<input class="form-control" type="text" name="icp" id="icp-field" value="{{ old('icp', $site->icp ) }}" />
                </div> 
                <div class="form-group">
                	<label for="tel-field">Tel</label>
                	<input class="form-control" type="text" name="tel" id="tel-field" value="{{ old('tel', $site->tel ) }}" />
                </div> 
                <div class="form-group">
                	<label for="email-field">Email</label>
                	<input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $site->email ) }}" />
                </div> 
                <div class="form-group">
                	<label for="counter-field">Counter</label>
                	<input class="form-control" type="text" name="counter" id="counter-field" value="{{ old('counter', $site->counter ) }}" />
                </div>

          <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link float-xs-right" href="{{ route('sites.index') }}"> <- Back</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
