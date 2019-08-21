@extends('layouts.app')
@section('title','Category')
@section('content')
<div class="d-flex justify-content-end mb-2">
  <a href="{{route('categories.create')}}" class="btn btn-success">Add new Category</a>
</div>
<div class="card card-default">
  <div class="card card-header">
    Categories
  </div>
  <div class="card-body">
  @if($categories->count()>0)
  <table class="table">
    <thead>
      <th>Name</th>
      <th>Post Count</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td>{{$category->posts->count()}}</td>
          <td>
              <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info btn-sm">Edit</a>
              <button  class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">Delete</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <form  action="" method="post" id="deleteCategoryform">
    @method('DELETE')
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-center text-bold">Are you sure want to delete this category?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No,Go Back</button>
        <button type="submit" class="btn btn-danger">Yes,Delete It.</button>
      </div>
    </div>
  </form>
</div>
</div>
  @else
  <h2 class="text-center">No Category Yet!</h2>
  @endif
  </div>
</div>
@endsection

@section('scripts')
  <script>
    function handleDelete(id){

      var form=document.getElementById('deleteCategoryform')
      form.action='/categories/'+id
      $('#deleteModal').modal('show')
    }
  </script>
@endsection
