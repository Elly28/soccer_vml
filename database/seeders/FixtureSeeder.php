<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Field;
use App\Models\Fixture;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FixtureSeeder extends Seeder
{
    public function run()
    {
        // Define available time slots
        $timeSlots = ['10h00', '11h40', '13h10', '14h45'];

        // Get all teams and fields
        $teams = Team::all();
        $fields = Field::all();

        // Total rounds (home and away)
        $rounds = 30;
        $matchDate = Carbon::create(2024, 3, 17); // Starting date (adjust as needed)

        // List of pairings to ensure no more than two games per team
        $pairings = [];

        // Generate the home and away matches (2 matches per pairing)
        for ($round = 1; $round <= $rounds; $round++) {
            // Reset pairings for each round
            $dailyFixtures = [];
            $teamsScheduled = []; // Track teams scheduled for the current round

            foreach ($teams as $homeTeam) {
                foreach ($teams as $awayTeam) {
                    if ($homeTeam->id != $awayTeam->id) {
                        // Create home and away pairing, ensure only twice per season
                        $pairKey = min($homeTeam->id, $awayTeam->id) . '-' . max($homeTeam->id, $awayTeam->id);

                        // Ensure $pairings[$pairKey] is initialized before incrementing or checking
                        if (!isset($pairings[$pairKey])) {
                            $pairings[$pairKey] = 0;
                        }

                        // Only proceed if the pair hasn't already played twice and neither team is already scheduled in this round
                        if ($pairings[$pairKey] < 2 && !in_array($homeTeam->id, $teamsScheduled) && !in_array($awayTeam->id, $teamsScheduled)) {
                            // Alternate home and away fixtures
                            $fixture = [
                                'home_team_id' => $pairings[$pairKey] % 2 == 0 ? $homeTeam->id : $awayTeam->id,
                                'home_team_name' => $pairings[$pairKey] % 2 == 0 ? $homeTeam->name : $awayTeam->name,
                                'away_team_id' => $pairings[$pairKey] % 2 == 0 ? $awayTeam->id : $homeTeam->id,
                                'away_team_name' => $pairings[$pairKey] % 2 == 0 ? $awayTeam->name : $homeTeam->name,
                                'round' => $round,
                                'match_date' => $matchDate->toDateString(),
                            ];
                            $dailyFixtures[] = $fixture;

                            // Add both teams to the list of scheduled teams for this round
                            $teamsScheduled[] = $homeTeam->id;
                            $teamsScheduled[] = $awayTeam->id;

                            // Increment the count for this pairing
                            $pairings[$pairKey]++;

                            if (count($dailyFixtures) == 8) {
                                break 2; // Only 8 games per round (16 teams / 2 = 8 games)
                            }
                        }
                    }
                }
            }

            // Schedule games for the day across two fields with four time slots
            foreach ($timeSlots as $slotIndex => $timeSlot) {
                for ($fieldIndex = 0; $fieldIndex < 2; $fieldIndex++) {
                    $fixtureIndex = $slotIndex * 2 + $fieldIndex;

                    if (isset($dailyFixtures[$fixtureIndex])) {
                        $fixture = $dailyFixtures[$fixtureIndex];
                        $field = $fields[$fieldIndex]; // Alternate between Field 1 and Field 2

                        // Insert the fixture into the database
                        Fixture::create([
                            'home_team_id' => $fixture['home_team_id'],
                            'home_team_name' => $fixture['home_team_name'],
                            'away_team_id' => $fixture['away_team_id'],
                            'away_team_name' => $fixture['away_team_name'],
                            'field_id' => $field->id,
                            'time_slot' => $timeSlot,
                            'round' => $fixture['round'],
                            'match_date' => $fixture['match_date'],
                        ]);
                    }
                }
            }

            // Move to the next day
            $matchDate->addWeek();
        }
    }
}
