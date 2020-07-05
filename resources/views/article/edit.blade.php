@extends('layouts.master')
@section('title','edit articles')
@section('content')
<div class="card">
  <div class="card-body">
    <form action="/artikel" method="post">
      @method("put")
      @csrf
      <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" name="title" value="{{$article->title}}" class="form-control" id="Title">
        <input type="hidden" name="slug" value="{{$article->slug}}">
        <input type="hidden" name="tag" value="1">
        <small class="form-text text-muted">input your article title.</small>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" class="form-control" id="content">{{$article->content}}</textarea>
      </div>
      <div class="form-group">
        <label for="tag">Tag</label>
        <select multiple class="custom-select" id="tag" name="tags[]">
          <option selected>Choose...</option>
          @foreach($read as $r)
          <option value="{{$r->id}}">{{$r->name}}</option>
          @endforeach
        </select>
        <small class="form-text text-muted">press <code>ctrl</code> and select tags.</small>
      </div>
      <button type="submit" class="btn btn-primary">edit</button>
    </form>
  </div>
</div>
@endsection
@section('head-content','Create Article')