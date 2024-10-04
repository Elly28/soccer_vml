<!DOCTYPE html>
<html>

<head>
    <title>Weekly Report</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <h1 style="margin: 0; font-size: 24px; text-align: center;">Weekly Fixture</h1>
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">
        <tr>
            <th style="width:55%" colspan="5">Vlaka Masters League Fixture</th>
            <th style="padding: 20px; text-align: center;">Time</th>
            <th style="padding: 20px; text-align: center;">Field</th>
            <th style="padding: 20px; text-align: center;">Match Date</th>
        </tr>
        @if (count($data) > 0)
            @foreach ($data as $fixture)
                <tr>
                    <td style="padding: 10px; text-align: center;" colspan="5">{{ $fixture->home_team_name }} v {{ $fixture->away_team_name }}</td>
                    <td style="padding: 10px; text-align: center;">{{ $fixture->time_slot }}</td>
                    <td style="padding: 10px; text-align: center;">{{ $fixture->field_id }}</td>
                    <td style="padding: 10px; text-align: center;">{{ $fixture->match_date }}</td>
                </tr>
            @endforeach
        @else
            <p class="text-center mt-4">
                No Results Found
            </p>
            @endif
    </table>
</body>

</html>
