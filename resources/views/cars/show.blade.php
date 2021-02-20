@extends('layouts.app')

@section('content')

<div class="container">

  @if ($message = Session::get('success'))
  <div class="alert alert-success text-center">
      <strong>{{ $message }}</strong>
  </div>
  @endif

  <div>
    <div class="card">
      <div class="row card-body">
        <div class="col-md-4">
          <img src="{{ $car->image }}" alt="" width="100%" height="300px">
          @if($car->available)
          @auth
          <button type="button" class="btn btn-info btn-lg btn-block mt-2 mb-3" data-toggle="modal" data-target="#exampleModal">RESERVE</button>
          @else
          <a href="/login" class="btn btn-info btn-lg btn-block mt-2 mb-3">LOGIN TO RESERVE</a>
          @endauth
          @else
          <button type="button" name="button" class="btn btn-warning btn-block btn-lg mt-2 mb-3" disabled>NOT AVAILABLE</button>
          @endif
        </div>
        <div class="col-md-8">
          <h4><strong>Brand:</strong> {{ $car->brand }}</h4><br>
          <h4><strong>model:</strong> {{ $car->model }}</h4><br>
          <h4><strong>Type:</strong> {{ $car->type }}</h4><br>
          <h4><strong>Price:</strong> {{ $car->price }} $ / Day</h4>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reserve : {{ $car->brand }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="{{ route('commands.store') }}" method="post">
          @csrf
          <input type="hidden" name="car_id" value="{{ $car->id }}">
          <input type="hidden" name="car_price" value="{{ $car->price }}">
          <div class="form-group">
            <label for="">Rental Date</label>
            <input type="date" name="rental_date" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Recovery Date</label>
            <input type="date" name="recovery_date" class="form-control">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">Reserve this car</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection
