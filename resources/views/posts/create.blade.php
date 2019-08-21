@extends('layouts.app')
@section('title','Post')
@section('content')
<div class="card card-default">
  <div class="card-header">
    {{isset($post) ? 'Edit Post' :'Create Post'}}
  </div>
  <div class="card-body">
   @include('partial.error')
    <form  action="{{isset($post) ? route('posts.update',$post->id) : route('posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      @if(isset($post))
        @method('PUT')
      @endif
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control"  id="title" value="{{isset($post) ? $post->title :''}}">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="5" cols="5" class="form-control">
          {{isset($post) ? $post->description :''}}
        </textarea>
      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content :''}}">
        <trix-editor input="content"></trix-editor>
      </div>
      <div class="form-group">
        <label for="published_at">Published At</label>
        <input type="text" name="published_at" class="form-control"  id="published_at" value="{{isset($post) ? $post->published_at :''}}">
      </div>
      @if(isset($post))
        <div class="form-group">
          <img src="{{asset('storage/'.$post->image)}}" width="400px" height="250px" alt="">
        </div>
      @endif
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control"  id="image">
      </div>
      <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control tags-selector" name="category" id="category">
          @foreach($categories as $category)
            <option value="{{$category->id}}"
              @if(isset($post))
                @if($category->id==$post->category_id)
                selected
               @endif
              @endif
              >
              {{$category->name}}
            </option>
          @endforeach
        </select>
      </div>
      @if($tags->count()>0)
      <div class="form-group">
        <label for="tags">Tag</label>
        <select class="form-control tags-selector" name="tags[]" id="tags" multiple>
          @foreach($tags as $tag)
            <option value="{{$tag->id}}"
              @if(isset($post))
                @if($post->hasTag($tag->id))
                  selected
                @endif
              @endif
              >
              {{$tag->name}}
            </option>
          @endforeach
        </select>
      </div>
      @endif
      <div class="form-group">
        <button type="submit" class="btn btn-success">{{isset($post) ? 'Update Post' :'Create Post'}}</button>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
  <script>
    flatpickr('#published_at',{
      enableTime: true,
      enableSeconds: true
    })
    $(document).ready(function() {
    $('.tags-selector').select2();
})
  </script>
@endsection
@section('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <link  href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection
