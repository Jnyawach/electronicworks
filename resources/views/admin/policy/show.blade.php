@extends('layouts.admin_layout')
@section('title' ,$policy->category)
@section('content')
    <div class="dashboard-wrapper green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
    <section>
        <h4> @if($policy->category=='Policy')
                Privacy Policy
            @else
                Terms and Condition
            @endif</h4>
        <div class="d-inline-flex">
            <a class="btn-sm btn-primary hire m-1 text-decoration-none" href="{{route('policy.edit', $policy->id)
            }}">Edit <i class="fas fa-external-link-alt ms-2"></i></a>

            <form>
                <button type="submit" class="btn-sm btn-primary m-1">Delete <i class="far fa-trash-alt"></i></button>

            </form>

        </div>

        <p>{!! $policy->text!!}</p>

    </section>
            </div>
        </div>
    </div>
@endsection
