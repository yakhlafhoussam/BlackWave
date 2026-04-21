@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Historic Chat Members</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Member</th>
                <th>Profile</th>
                <th>Average Rating</th>
                <th>Your Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->username }}</td>
                <td><a href="{{ route('profile.show', $member) }}">View Profile</a></td>
                <td>{{ $member->ratings_avg ?? 'N/A' }}</td>
                <td>
                    @if(isset($ratings[$member->id]))
                        {{ $ratings[$member->id]->stars }} ★
                    @else
                        Not rated
                    @endif
                </td>
                <td>
                    @if(!isset($ratings[$member->id]))
                        <a href="{{ route('chat.rate', $member) }}" class="btn btn-primary btn-sm">Rate</a>
                    @else
                        <span class="text-success">Rated</span>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
