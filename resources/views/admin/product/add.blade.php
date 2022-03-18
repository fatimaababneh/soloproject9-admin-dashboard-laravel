@extends('layouts.general')

@section('content')

<form action="{{ url('insert-product') }}" method="POST" style="margin:15vh auto auto 0; width:65vw;">
    @csrf
    <h1>Add Product</h1>
    <br>
  <div class="form-group" >
    <label for="name">Name</label>
    <input required style="color:white;" type="text" class="form-control" id="name" name="name" placeholder="Product Name">
  </div>
  <div class="form-group" >
    <label for="price">Image URL</label>
    <input required style="color:white;" type="text" class="form-control" id="image" name="image" placeholder="Image URL">
  </div>
  <div class="form-group" >
    <label for="price">Price</label>
    <input required style="color:white;" type="text" pattern="[0-9]+" class="form-control" id="price" name="price" placeholder="Product Price">
  </div>
  <div class="form-group" >
    <label for="stock">Stock</label>
    <input required style="color:white;" type="text" pattern="[0-9]+" class="form-control" id="stock" name="stock" placeholder="Product Stock">
  </div>
  <div class="form-group">
    <label for="cat_id">Category</label>
    <select required id="cat_id" name="cat_id" style="color:white;" class="form-control" id="cat_id">
    <option disabled selected>Select a Category</option>
    @foreach($category as $item)  
    <option value="{{ $item->id }}">{{$item->name}}</option>
    @endforeach

    </select>
  </div>
  <div class="form-group">
    <label for="brief">Brief</label>
    <textarea required name="brief" id="brief" style="color:white;" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Add Product</button>
  </div>

</form>

@endsection