@extends('layouts.app')

@section('content')
<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>
          Site
          <a class="btn btn-success float-xs-right" href="{{ route('sites.create') }}">Create</a>
        </h1>
      </div>

      <div class="card-body">
        @if($sites->count())
          <table class="table table-sm table-striped">
            <thead>
              <tr>
                <th class="text-xs-center">#</th>
                <th>Title</th> <th>Domain</th> <th>Config</th> <th>User_id</th> <th>Keyword</th> <th>Description</th> <th>Logo</th> <th>Icp</th> <th>Tel</th> <th>Email</th> <th>Counter</th>
                <th class="text-xs-right">OPTIONS</th>
              </tr>
            </thead>

            <tbody>
              @foreach($sites as $site)
              <tr>
                <td class="text-xs-center"><strong>{{$site->id}}</strong></td>

                <td>{{$site->title}}</td> <td>{{$site->domain}}</td> <td>{{$site->config}}</td> <td>{{$site->user_id}}</td> <td>{{$site->keyword}}</td> <td>{{$site->description}}</td> <td>{{$site->logo}}</td> <td>{{$site->icp}}</td> <td>{{$site->tel}}</td> <td>{{$site->email}}</td> <td>{{$site->counter}}</td>

                <td class="text-xs-right">
                  <a class="btn btn-sm btn-primary" href="{{ route('sites.show', $site->id) }}">
                    V
                  </a>

                  <a class="btn btn-sm btn-warning" href="{{ route('sites.edit', $site->id) }}">
                    E
                  </a>

                  <form action="{{ route('sites.destroy', $site->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Delete? Are you sure?');">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">

                    <button type="submit" class="btn btn-sm btn-danger">D </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {!! $sites->render() !!}
        @else
          <h3 class="text-xs-center alert alert-info">Empty!</h3>
        @endif
      </div>
    </div>
  </div>
</div>

@endsection
