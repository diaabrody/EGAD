@extends('frontend.layouts.app')
@section('title', app_name() . ' | Tweets')

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Created At</th>
            <th>Tweet</th>
            <th>Images</th>
            <th>Favorite</th>
            <th>Retweet</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($tweets1['statuses']) && !empty($tweets2['statuses']))
            @foreach($tweets1['statuses'] as $tweet)
                <tr>
                    <td>{{ $tweet['created_at'] }}</td>
                    <td>{{ $tweet['text'] }}</td>
                    <td>
                        @if(!empty($tweet['extended_entities']['media']))
                            @foreach($tweet['extended_entities']['media'] as $v)
                                <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                            @endforeach
                        @endif
                    </td>
                    <td>{{ $tweet['favorite_count'] }}</td>
                    <td>{{ $tweet['retweet_count'] }}</td>
                </tr>
            @endforeach
            @foreach($tweets2['statuses'] as $tweet)
            <tr>
                <td>{{ $tweet['created_at'] }}</td>
                <td>{{ $tweet['text'] }}</td>
                <td>
                    @if(!empty($tweet['extended_entities']['media']))
                        @foreach($tweet['extended_entities']['media'] as $v)
                            <img src="{{ $v['media_url_https'] }}" style="width:100px;">
                        @endforeach
                    @endif
                </td>
                <td>{{ $tweet['favorite_count'] }}</td>
                <td>{{ $tweet['retweet_count'] }}</td>
            </tr>
        @endforeach
        @else
            <tr>
                <td colspan="6">There are no data.</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection