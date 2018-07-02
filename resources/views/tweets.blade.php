@extends('layouts.app')

@section('content')
    
    <!-- Current tweets -->
    @if (count($tweets) > 0)
        <div class="panel panel-default">
            <div class="text-center panel-heading">
			ALL TWEETS
            </div>

            <div class="panel-body">
                <table class="table table-striped tweet-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>TWEET</th>
                      
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tweets as $key=>$tweet)
							<tr>
                                <!-- tweet Name -->
                                <td class="table-text">
                                    <div>{{ $tweet->tweet_desc }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection