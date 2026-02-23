@extends('layouts.app')

@section('content')
<div class="container">
    
    {{-- 1. ADMIN VIEW: SHOW RESULTS --}}
    @if(Auth::user()->user_level === 'admin')
        <div class="card shadow border-danger">
            <div class="card-header bg-danger text-white">
                <h4 class="mb-0">Live Election Results (Admin Only)</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Candidate</th>
                            <th>Party</th>
                            <th>Total Votes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($results as $result)
                        <tr>
                            <td><strong>{{ $result->name }}</strong></td>
                            <td>{{ $result->party_name }}</td>
                            <td><span class="badge badge-pill badge-success" style="background-color: #28a745; color: white;">{{ $result->total_votes }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    {{-- 2. USER VIEW: SHOW VOTING FORM --}}
    @else
        <div class="card shadow border-primary">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Cast Your Vote</h4>
            </div>
            <div class="card-body">
                @if(Auth::user()->voted_candidate_id)
                    <div class="alert alert-info">
                        <h5>Thank you! You have already cast your vote.</h5>
                    </div>
                @else
                    <form action="{{ route('vote.store') }}" method="POST">
                        @csrf
                        <table class="table table-hover">
                            <tbody>
                                @foreach($candidates as $candidate)
                                <tr>
                                    <td width="50">
                                        <input type="radio" name="candidate_id" value="{{ $candidate->id }}" required>
                                    </td>
                                    <td>{{ $candidate->name }} ({{ $candidate->party_name }})</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary btn-block">Submit Vote</button>
                    </form>
                @endif
            </div>
        </div>
    @endif

</div>
@endsection
