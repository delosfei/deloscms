@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Site / Show #{{ $site->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('sites.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('sites.edit', $site->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Title</label>
<p>
	{{ $site->title }}
</p> <label>Domain</label>
<p>
	{{ $site->domain }}
</p> <label>Config</label>
<p>
	{{ $site->config }}
</p> <label>User_id</label>
<p>
	{{ $site->user_id }}
</p> <label>Keyword</label>
<p>
	{{ $site->keyword }}
</p> <label>Description</label>
<p>
	{{ $site->description }}
</p> <label>Logo</label>
<p>
	{{ $site->logo }}
</p> <label>Icp</label>
<p>
	{{ $site->icp }}
</p> <label>Tel</label>
<p>
	{{ $site->tel }}
</p> <label>Email</label>
<p>
	{{ $site->email }}
</p> <label>Counter</label>
<p>
	{{ $site->counter }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
