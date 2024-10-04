@extends('layout.app')
@section('content')
    <div class="col-3">
    </div>
    <div class="col-6">
        <h1 class="m-0 pb-3 text-center">Fixture</h1>
        <table class="table text-center">
            <tr class="custom-table-row">
                <th>Table</th>
                <th>Fixtures</th>
            </tr>
        </table>

        <table class="table table-bordered table-striped">
            <tr>
                <th style="width:55%">Vlaka Masters League</th>
                <th class="text-center">M</th>
                <th class="text-center">W</th>
                <th class="text-center">D</th>
                <th class="text-center">L</th>
                <th class="text-center">GD</th>
                <th class="text-center">P</th>
            </tr>
            @if (count($standings) > 0)
                @foreach ($standings as $standing)
                    <tr>
                        <td style="width:55%">{{ $standing->team_name }}</td>
                        <td class="text-center">{{ $standing->played }}</td>
                        <td class="text-center">{{ $standing->won }}</td>
                        <td class="text-center">{{ $standing->draw }}</td>
                        <td class="text-center">{{ $standing->lost }}</td>
                        <td class="text-center">{{ $standing->goal_difference }}</td>
                        <td class="text-center">{{ $standing->points }}</td>
                    </tr>
                @endforeach
            @else
                <p class="text-center mt-4">
                    No Results Found
                </p>
            @endif
        </table>
    </div>
    <div class="col-3">
    </div>
@endsection
