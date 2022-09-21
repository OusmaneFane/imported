<?php

namespace App\Imports;

use App\Models\User;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'no' => $row['no'],
            'name'     => $row['name'],
            'date'    =>date('m-d-Y', strtotime(str_replace('-', '/', $row['date']))),
            'timetable' => $row['timetable'],
            'onduty' => $row['onduty'],
            'offduty' => $row['offduty'],
            'clockin' => $row['clockin'],
            'clockout' => $row['clockout'],
            'normal' => $row['normal'],
            'realtime' => $row['realtime'],
            'late' => $row['late'],
            'early' => $row['early'],
            'absent' => $row['absent'],
            'ottime' => $row['ottime'],
            'worktime' => $row['worktime'],
            //'password' => Hash::make($row['password']),
        ]);
    }
}
