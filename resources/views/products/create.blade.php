@extends('layouts.app')

@section('content')


    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800  ">Create Product</h1>
    </div>

    <div>
        @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
           

        </div>
    @endif
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="  d-flex justify-content-around ">

                <div class=" ">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Name</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="product-name">

                    </div>
                   
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Description</label>
                        <textarea name="description" class="form-control"   cols="20" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Image</label>
                        <input type="file" class="form-control"   name="product_image" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>


                </div>
                <div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Color</label>
                        <input type="text" class="form-control" name=" color" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="red,green,blue">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Size</label>
                        <input type="text" class="form-control" name=" size" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="sm,xll">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product style</label>
                        <input type="text" class="form-control" name=" style" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="half,full">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Price</label>
                        <input type="number" class="form-control" name=" price" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="5000 tk">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Product Stock</label>
                        <input type="number" class="form-control" name=" stock" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="500-pic">
                    </div>


                </div>
          
            </div>

            <button type="submit" class="btn btn-primary w-100 ">Submit</button>


         
        </form>
    </div>
 

 
    </div>
@endsection
