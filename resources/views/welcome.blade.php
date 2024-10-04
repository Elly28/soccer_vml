@extends('layout.app')
@section('content')
    <div class="col-3">Left pane</div>
    <div class="col-6">
        <h1 class="m-0 pb-3 text-center">League Table</h1>
        <table class="table text-center">
            <tr class="custom-table-row">
                <th><a class="" href="">Table</a></th>
                <th><a class="" href="">Fixtures</a></th>
            </tr>
        </table>

        <table class="table standing">
            <tr>
                <th style="width:65%">Vlaka Masters League</th>
                <th>M</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>GD</th>
                <th>P</th>
            </tr>
        </table>
    </div>
    <div class="col-3">Right pane</div>
@endsection
