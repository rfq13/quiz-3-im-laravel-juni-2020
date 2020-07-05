@extends('layouts.master')
@section('title','articles')
@section('content')
<div class="card">
  <div class="card-body">
    <form action="/artikel" method="post">
      @csrf
      <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" name="title" class="form-control" id="Title">
        <small class="form-text text-muted">input your article title.</small>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" class="form-control" id="content"></textarea>
      </div>
      <div class="form-group">
        <label for="tag">Tag</label>
        <select multiple class="custom-select" id="tag" name="tag[]">
          <option selected>Choose...</option>
          @foreach($read as $r)
          <option value="{{$r->id}}">{{$r->name}}</option>
          @endforeach
        </select>
        <small class="form-text text-muted">press <code>ctrl</code> and select tags.</small>
      </div>
      <button type="submit" class="btn btn-primary">Post</button>
    </form>
  </div>
</div>
@endsection
@section('head-content','Create Article')