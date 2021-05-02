@extends('layouts.master')


@section('content')
@include('Star.message')

<div class="d-flex justify-content-end">
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">Add <i class="fa fa-address-card" aria-hidden="true"></i></button>
</div>
<div class="accordion" id="accordionExample">
  @foreach ($stars as $star)
  
    <div class="card flex-sm-row">
      <div class=" col-sm-4 two " id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#{{\Str::slug($star->name)}}" aria-expanded="true" aria-controls="collapseOne">
            {{$star->name}}
          </button>
        </h2>
      </div>
      <div id="{{\Str::slug($star->name)}}" class="collapse   col-sm-8" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body ">
          
         
          <img class="shadow-lg p-3 m-3 bg-white rounded" src="{{asset('Stars/img/'.$star->image)}}" style="width: 160px ; heigth:160px" alt="" align=left> <h2>{{$star->name}}</h2>

          {{$star->description}}
          <div class="d-flex justify-content-end">
            <a class="modal-effect btn btn-sm btn-info mx-2" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$star->id}}"><i class="fa fa-pencil-square-o"></i>walld</a>
      <a class="modal-effect btn btn-sm btn-danger " data-effect="effect-scale"  data-toggle="modal" href="#delete{{$star->id}}"><i class="fa fa-trash-o"></i></a>
  
          </div>
        </div>
      </div>
      @include('star.edit')
      @include('star.delete')
    </div>
   
    
    @endforeach
</div>
@include('star.add')

@endsection

