@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">Preferences</div>
                <div class="panel-body">
                    <p>You can configure your App here.</p>
                    @if (!empty($user))
                        <p><strong>User Information:</strong></p>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>ID:</strong> {{ $user['id'] }}</li>
                            <li class="list-group-item"><strong>Username:</strong> {{ $user['username'] }}</li>
                            <li class="list-group-item"><strong>Email:</strong> {{ $user['email'] }}</li>
                        </ul>
                    @endif
                    @if (!empty($themes))
                        <p><strong>Choose your theme:</strong></p>
                        <form role="form" method="POST" action="{{ route('update-preferences') }}">
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <select class="selectpicker" name="theme">
                                    @foreach($themes as $theme)
                                        @if(Auth::user()->preferences->theme == $theme) 
                                            <option class="form-control text-capitalize" value="{{ $theme }}" selected="selected">{{ $theme }}</option>
                                        @else
                                            <option class="form-control text-capitalize" value="{{ $theme }}">{{ $theme }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-9">
                                    <button type="submit" class="form-control btn btn-primary">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@if (session('message'))
<div class="message-popup animated fadeIn">
    <div class="message">
        <div class="alert alert-info">
            <p>{{ $message }}</p>
        </div>
    </div>
</div>
 @endif
@endsection
