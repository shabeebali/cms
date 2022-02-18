<?php

namespace Comasy\J2C\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessImmigration extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'aoi' => 'array',
        'visited_countries' => 'array',
        'relative_province' => 'array',
        'visited_province' => 'array',
        'interested_programs' => 'array'
    ];

    public function application_form()
    {
        return $this->morphOne(ApplicationForm::class, 'typable');
    }

    public function getAoiAttribute($val)
    {
        $val = json_decode($val);
        $array = [];
        if (in_array('manufacturing', $val)) {
            $array[] = 'Manufacturing / trading';
        }
        if (in_array('trading', $val)) {
            $array[] = 'Only trading / Import / Export';
        }
        if (in_array('project', $val)) {
            $array[] = 'Project work (builder / Construction etc)';
        }
        if (in_array('wholesale', $val)) {
            $array[] = 'Wholesale / Retail establishment';
        }
        if (in_array('consulting', $val)) {
            $array[] = 'Consulting';
        }
        if (in_array('other', $val)) {
            $array[] = 'Other';
        }
        return $array;
    }
    public function getQualificationAttribute($val)
    {
        $str = '';
        switch ($val) {
            case 1:
                $str = 'Post graduate';
                break;
            case 2:
                $str = 'Bachelors degree (15 years of education)';
                break;
            case 3:
                $str = 'Did not complete Bachelors degree';
                break;
            case 4:
                $str = 'Grade 12 education with at least one year diploma / certificate';
                break;
            case 5:
                $str = 'Grade 12 (Secondary school) completed';
                break;
            case 6:
                $str = ' Grade 10 completed';
                break;
            case 7:
                $str = 'Grade 10 not completed';
                break;
            case 8:
                $str = 'Other';
                break;
        }
        return $str;
    }

    public function getSpouseExperienceAttribute($val)
    {
        $str = '';
        switch ($val) {
            case 1:
                $str = 'Work Experience as a Business person';
                break;
            case 2:
                $str = 'Work Experience as a Skilled Worker';
                break;
            case 3:
                $str = 'Not employed currently';
                break;
            case 4:
                $str = 'Never employed';
                break;
            case 5:
                $str = 'NA';
                break;
        }
        return $str;
    }

    public function getVisitedCountriesAttribute($val)
    {
        $val = json_decode($val);
        $data = [];
        foreach ($val as $item) {
            $data[] = \Illuminate\Support\Str::title(str_replace('_', ' ', $item));
        }
        return implode(",", $data);
    }

    public function getRelativeProvinceAttribute($val)
    {
        $val = json_decode($val);
        $data = [];
        foreach ($val as $item) {
            $data[] = \Illuminate\Support\Str::title(str_replace('_', ' ', $item));
        }
        return implode(",", $data);
    }
    public function getVisitedProvinceAttribute($val)
    {
        $val = json_decode($val);
        $data = [];
        foreach ($val as $item) {
            $data[] = \Illuminate\Support\Str::title(str_replace('_', ' ', $item));
        }
        return implode(",", $data);
    }

    public function getAssetsAttribute($val)
    {
        $str = '';
        switch ($val) {
            case 1:
                $str = '$100,000 to $199,000';
                break;
            case 2:
                $str = '$200,000 to $299,000';
                break;
            case 3:
                $str = '$300,000 to $399,000';
                break;
            case 4:
                $str = '$400,000 to $499,000';
                break;
            case 5:
                $str = '$500,000 to $599,000';
                break;
            case 6:
                $str = '$600,000 to $799,000';
                break;
            case 7:
                $str = '$800,000 to $999,000';
                break;
            case 8:
                $str = '$1 million to $2 million';
                break;
            case 9:
                $str = '$2 million and up';
                break;
        }
        return $str;
    }

    public function getLanguageProfciencyAttribute($val)
    {
        $str = '';
        switch ($val) {
            case 1:
                $str = 'Very Good / Fluent';
                break;
            case 2:
                $str = 'Moderate to Good';
                break;
            case 3:
                $str = ' With difficulty';
                break;
        }
        return $str;
    }

    public function getInterestedProgramsAttribute($val)
    {
        $val = json_decode($val);
        $array = [];
        if (in_array(1, $val)) {
            $array[] = 'Canada Start Up Visa
                            leading to permanent residence in Canada';
        }
        if (in_array(2, $val)) {
            $array[] = 'I operate my own
                            business
                            and world like to se up a branch / office in Canada and world like to be transferred to the
                            Canadian Operation';
        }
        if (in_array(3, $val)) {
            $array[] = 'My current company
                            intends to transfer me to Canada by setting up their branch / subsidiary in Canada';
        }
        if (in_array(4, $val)) {
            $array[] = 'Canada\'s personal
                            Nominee
                            program for business person & Senior Managers';
        }
        if (in_array(5, $val)) {
            $array[] = 'LMIA / work permit
                            as
                            a
                            business owner / operator in Canada';
        }
        if (in_array(6, $val)) {
            $array[] = 'I am open to Discuss
                            all
                            applicable options';
        }
        return $array;
    }
}
