<?php

namespace Database\Seeders;

use App\Models\TermBaseBooking;
use App\Models\TermBaseBookingDays;
use App\Models\TermBaseBookingPackage;
use App\Models\Timing;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class TermBaseBookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $parent_term_base_bookings = [
        //     [
        //         'user_id' => 1,
        //         'name' => 'Baby Ducks Full term',
        //         'venue_id' => 1,
        //         'class_type_id' => 1,
        //         'swimming_class_id' => 1,
        //         'timing_id' => Timing::all()->random(1)->first()->id,
        //         'trainer_id' => 5,
        //         'start_date' => '2022-09-01',
        //         'end_date' => '2022-09-30',
        //         'no_of_class' => 8,
        //         'no_of_student' => 10,
        //         'discount' => 10,
        //         'total' => 3600,
        //     ],
        // ];
        $term_base_bookings = [
            [
                'venue_id' => Venue::all()->random(1)->first()->id,
                'trainer_id' => User::where('is_trainer', true)->get()->random(1)->first()->id,
                'timing_id' => Timing::all()->random(1)->first()->id,

            ],
            [
                'venue_id' => Venue::all()->random(1)->first()->id,
                'trainer_id' => User::where('is_trainer', true)->get()->random(1)->first()->id,
                'timing_id' => Timing::all()->random(1)->first()->id,

            ],
        ];
        $parent_term_base_bookings = TermBaseBooking::create([
            'user_id' => 1,
            'name' => 'Baby Ducks Full term',
            'class_type_id' => 1,
            'swimming_class_id' => 1,
            'start_date' => '2022-09-01',
            'end_date' => '2022-09-30',
            'no_of_class' => 8,
            'no_of_student' => 10,
            'discount' => 10,
            'total' => 3600,
        ]);

        foreach ($term_base_bookings as $term_base_booking) {
            // dd($term_base_booking['venue_id']);
            $record = TermBaseBooking::create([
                'user_id' => 1,
                'name' => 'Baby Ducks Full term',
                'venue_id' => $term_base_booking['venue_id'],
                'class_type_id' => 1,
                'swimming_class_id' => 1,
                'timing_id' => $term_base_booking['timing_id'],
                'trainer_id' => $term_base_booking['trainer_id'],
                'start_date' => '2022-09-01',
                'end_date' => '2022-09-30',
                'no_of_class' => 8,
                'no_of_student' => 10,
                'discount' => 10,
                'total' => 3600,
                'parent_id' => $parent_term_base_bookings->id,
            ]);
            $term_base_booking_packages = [
                [
                    'term_base_booking_id' => $record->id,
                    'name' => 'Baby Ducks Package 1',
                    'start_date' => '2022-09-01',
                    'end_date' => '2022-09-15',
                    'no_of_class' => 4,
                    'price' => $record->class->price,
                    'total' => $record->class->price * 4,
                ],
                [
                    'term_base_booking_id' => $record->id,
                    'name' => 'Baby Ducks Package 2',
                    'start_date' => '2022-09-16',
                    'end_date' => '2022-09-30',
                    'no_of_class' => 4,
                    'price' => $record->class->price,
                    'total' => $record->class->price * 4,
                ],
            ];
            foreach ($term_base_booking_packages  as $term_base_booking_package) {
                TermBaseBookingPackage::create($term_base_booking_package);
            }
        }
        $day_id = [1, 2];
        foreach ($day_id as $item) {
            TermBaseBookingDays::create([
                'term_base_booking_id' => $parent_term_base_bookings->id,
                'day_id' => $item,
            ]);
        }
    }
}
