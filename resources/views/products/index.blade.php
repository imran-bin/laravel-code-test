@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
    </div>


    <div class="card">
        <form action="{{route('search')}}" method="get" class="card-header">
            <div class="form-row justify-content-between">
                <div class="col-md-2">
                    <input type="text" name="title" placeholder="Product Title" class="form-control">
                </div>
                <div class="col-md-2">
                    <select name="variant"   id="" class="form-control">
                          <option value="">--select variant--</option>
                         @foreach ($product as $data)
                         <option  value="{{$data->size}}" >{{$data->size}} </option> 
                         @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Price Range</span>
                        </div>
                        <input type="number" name="price_from" aria-label="First name" placeholder="From"
                            class="form-control">
                        <input type="number" name="price_to" aria-label="Last name" placeholder="To" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="date" name="date" placeholder="Date" class="form-control">
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary float-right"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
        @if (session()->has('message'))
        <div class="alert alert-danger">
            {{ session()->get('message') }}
           

        </div>
    @endif
        <div class="card-body">
            <div class="table-response">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sl .</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Variant</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($product as $item => $data)
                            <tr>
                                <td>{{++$item}}</td>
                                <td>{{$data->title}} <br> Created at : {{date_format($data->created_at,"Y F d")}}</td>
                                <td>{{$data->description}}</td>
                                <td class="fs-1" style="font-size: larger;font-weight: 800">
                                     
                                            {{$data->size}}/{{$data->color}}/{{$data->style}}
     
                                </td>
                                <td>Price : $ {{$data->price}}</td>
                                <td>In-Stock : {{$data->stock}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('product.edit',$data->id) }}" class="btn btn-success">Edit</a>
                                    </div>
                                    <div class="btn-group btn-group-sm">
                                        <form action="{{ route('product.destroy',$data->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are sure to delete data')" type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                     
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                      

                    </tbody>

                </table>
                {{$product->links()}}
            </div>

        </div>
      

        
    </div>
@endsection
