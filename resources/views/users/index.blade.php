@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-dark">
                <div class="card-header text-light" style="background-color:#6F1E51;">Your Commands</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(auth()->user()->commands->count() == 0)
                    <div class="alert alert-info">
                      You have not orderd any command yet !
                    </div>
                    @else
                    <table class="table table-responsive-sm">
                      <thead>
                        <tr>
                          <th scope="col">Car</th>
                          <th scope="col">Rental Day</th>
                          <th scope="col">Recovery Day</th>
                          <th scope="col">Total Price</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(auth()->user()->commands as $command)
                        <tr>
                          <td>{{ $command->car->brand }}</td>
                          <td>{{ $command->rental_date }}</td>
                          <td>{{ $command->recovery_date }}</td>
                          <td>{{ $command->total_price }} $</td>
                          <td>
                            <div class="d-flex justify-content-center align-items-center">
                              <form action="{{ route('commands.destroy', $command) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                              </form>
                            </div>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
