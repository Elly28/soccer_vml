@extends('layout.app')
@section('content')
    @include('partials.left-pane')
    <div class="col-6">
        <h1 class="m-0 pb-3 text-center">Fixture</h1>
        <table class="table text-center">
            <tr class="custom-table-row">
                <th>Table</th>
                <th>Fixtures</th>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th style="width:65%" colspan="5">Vlaka Masters League Fixture</th>
                <th class="text-center">Time</th>
                <th class="text-center">Field</th>
                <th class="text-center">Round</th>
            </tr>
            @if (count($fixtures) > 0)
                @foreach ($fixtures as $fixture)
                    <tr>
                        <td colspan="5">{{ $fixture->home_team_name }} v {{ $fixture->away_team_name }}</td>
                        <td class="text-center">{{ $fixture->time_slot }}</td>
                        <td class="text-center">{{ $fixture->field_id }}</td>
                        <td class="text-center">{{ $fixture->round }}</td>
                    </tr>
                @endforeach
            @else
                <p class="text-center mt-4">
                    No Results Found
                </p>
            @endif
            <div class="mt-3">
                {{ $fixtures->links() }}
            </div>

        </table>
    </div>
    @include('partials.right-pane')
@endsection
