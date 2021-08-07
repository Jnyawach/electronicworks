@extends('layouts.admin_layout')
@section('title', 'Essay')
@section('body-class','green-body')

@section('content')
    <div class="dashboard-wrapper green-body pt-5">

        <div class="container p-5">
            <h5 class="w-100">Essay Test
                <a href="{{route('manager-essay.create')}}" class="float-end text-decoration-none btn-primary btn-sm
                hire">Create Test</a>
            </h5>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <hr class="dropdown-divider">
            @if($essays->count()>0)
                @foreach($essays as $essay)
                    <div>
                        <h5 class="p-0 m-0">{!! $essay->title !!}</h5>
                        <p class="m-0 p-0">Word Count: <span>{!! $essay->words !!}</span></p>
                        <p class="m-0 p-0">Delivery time in: <span>{!! $essay->delivery !!}</span></p>
                        <div class="d-inline-flex">
                            <a href="{{route('manager-essay.edit', $essay->id)}}" class="btn-sm btn-primary m-1 hire
                    text-decoration-none">Edit
                                <i class="fas fa-external-link-square-alt ms-2"></i></a>
                        </div>
                        <hr class="dropdown-divider">
                    </div>
                @endforeach
            @else
                <h5>Please add essays to view</h5>
            @endif



        </div>
    </div>
@endsection


