@extends('layouts.app')

@section('content')

<div class="container">

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <strong>{{ $message }}</strong>
  </div>
  @endif


  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card border-dark">
        <div class="card-header text-light" style="background-color:#6F1E51;">
          Search for a car
        </div>
        <div class="card-body">
          <form action="{{ route('cars.search') }}" method="post">
            @csrf
            <div class="form-group">
              <input type="text" name="search" placeholder="Search for a brand or type or price or model" class="form-control">
            </div>
            <button type="submit" class="btn btn-secondary btn-block" name="button">Search</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <br>
  <hr>

  <div class="row">
    <div class="col-md-12">
      <div class="card border-dark mb-3">
        <div class="card-header text-light" style="background-color:#6F1E51;">
          Available Cars  [ {{ $cars->count() }} ]
        </div>
        <div class="row card-body">
          @forelse($cars as $car)
          <div class="col-md-4">
            <div class="d-flex justify-content-start mt-2">
              <a href="{{ route('cars.show', $car) }}"><img src="{{ $car->image }}" alt="" width="100px" height="100px"></a>
              <div class="ml-3">
                <span><strong>Brand:</strong> {{ $car->brand }}</span><br>
                <span><strong>model:</strong> {{ $car->model }}</span><br>
                <span><strong>Type:</strong> {{ $car->type }}</span><br>
                <span><strong>Price:</strong> {{ $car->price }} $ / Day</span>
              </div>
            </div>
          </div>
          @empty
          <div class="alert alert-warning col-md-12">
            There is no available car for the moment !
          </div>
          @endforelse
          <div class="d-flex justify-content-center mt-3">
            {{ $cars->appends(['collection' => $collection->currentPage()])->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card border-dark">
        <div class="card-header text-light" style="background-color:#6F1E51;">
          Our Collection of Cars [ {{ $collection->count() }} ]
        </div>
        <div class="row card-body">
          @forelse($collection as $car)
          <div class="col-md-4">
            <div class="d-flex justify-content-start mt-2">
              <a href="{{ route('cars.show', $car) }}"><img src="{{ $car->image }}" alt="" width="100px" height="100px"></a>
              <div class="ml-3">
                <span><strong>Brand:</strong> {{ $car->brand }}</span><br>
                <span><strong>model:</strong> {{ $car->model }}</span><br>
                <span><strong>Type:</strong> {{ $car->type }}</span><br>
                <span><strong>Price:</strong> {{ $car->price }} $ / Day</span>
              </div>
            </div>
          </div>
          @empty
          <div class="alert alert-warning">
            There is no car for the moment !
          </div>
          @endforelse
        </div>
        <div class="d-flex justify-content-center mt-3">
          {{ $collection->appends(['cars' => $cars->currentPage()])->links() }}
        </div>
      </div>
    </div>
  </div>

</div>


@endsection
