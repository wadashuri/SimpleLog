@extends('layouts.app')

@section('content')
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4">Pricing</h1>
        <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example.
            It's built with default Bootstrap components and utilities with little customization.</p>
    </div>


    <div class="d-flex gap-2 align-items-stretch">
        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-header">
              <h6 class="my-0 font-weight-normal">Free</h6>
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h3>
              <ul class="list-unstyled mt-3 mb-4">
                <li>10 users included</li>
                <li>2 GB of storage</li>
                <li>Email support</li>
                <li>Help center access</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-header">
              <h6 class="my-0 font-weight-normal">Pro</h6>
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h3>
              <ul class="list-unstyled mt-3 mb-4">
                <li>20 users included</li>
                <li>10 GB of storage</li>
                <li>Priority email support</li>
                <li>Help center access</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100">
            <div class="card-header">
              <h6 class="my-0 font-weight-normal">Enterprise</h6>
            </div>
            <div class="card-body d-flex flex-column">
              <h3 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h3>
              <ul class="list-unstyled mt-3 mb-4">
                <li>30 users included</li>
                <li>15 GB of storage</li>
                <li>Phone and email support</li>
                <li>Help center access</li>
              </ul>
              <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
            </div>
          </div>
        </div>
    </div>
      
@endsection
