@extends('layouts.master')
@section('title','articles')
@section('head-content','Article List')
@section('content')
<a href="/artikel/create" class="btn btn-primary mb-3">add artikel</a>
<div class="card">
  <div class="card-body">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Content</th>
          <th scope="col">Slug</th>
          <th scope="col">Tag</th>
          <th scope="col">Act</th>
        </tr>
      </thead>
      <tbody>
        @php
        $no = 1
        @endphp
        @foreach($read as $r)
        <tr>
          <th scope="row">{{$no++}}</th>
          <td>{{$r->title}}</td>
          <td>{{ \Illuminate\Support\Str::limit($r->content, 20, $end='...') }}</td>
          <td>{{$r->slug}}</td>
          <td>{{$r->tag}}</td>
          <td>
            <form action="/artikel/{{$r->id}}" method="post">
              @method("delete")
              <button class="btn btn-danger btn-sm" type="submit">Delete</button>
            </form>--------
            <form action="/artikel/{{$r->id}}" method="get">
              <button class="btn btn-success btn-sm" type="submit">Edit</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

@push('scripts')
<script>
  Swal.fire({
    title: 'Berhasil!',
    text: 'Memasangkan script sweet alert',
    icon: 'success',
    confirmButtonText: 'Cool'
  })
</script>
@endpush