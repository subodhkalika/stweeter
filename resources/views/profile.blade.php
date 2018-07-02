@extends('layouts.app')

@section('content')
    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New tweet Form -->
        <form action="{{ url('tweet') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- tweet Name -->
            <div class="form-group">
                <label for="tweet" class="col-sm-3 control-label">tweet</label>

                <div class="col-sm-6">
                    <input type="text" name="tweet_desc" id="tweet-name" class="form-control">
                </div>
            </div>

            <!-- Add tweet Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> POST MY TWEET
                    </button>
                </div>
            </div>
        </form>
    </div>



    <!-- Current tweets -->
    @if (count($tweets) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
			{{ Auth::user()->name }}'s recent 5 tweets
            </div>

            <div class="panel-body">
                <table class="table table-striped tweet-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>TWEET</th>
                        <th>ACTION</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tweets as $key=>$tweet)
							
                            <tr>
                                <!-- tweet Name -->
                                <td class="table-text">
                                    <div>{{ $tweet->tweet_desc }}</div>
                                </td>

                                <td>
									<form action="{{ url('tweet/'.$tweet->id) }}" method="POST">
										{{ csrf_field() }}
										{{ method_field('DELETE') }}
							
										<button type="submit" class="btn btn-danger">
											<i class="fa fa-trash"></i> Delete
										</button>
									</form>
								</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection