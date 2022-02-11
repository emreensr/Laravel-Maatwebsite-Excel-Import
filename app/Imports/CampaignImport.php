<?php

namespace App\Imports;

use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;

class CampaignImport implements ToModel,WithHeadingRow,WithValidation,SkipsOnFailure
{

    use Importable,SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    protected $campaign_name;
    protected $campaign_date;

    public function __construct($campaign_name,$campaign_date) 
    {
        $this->campaign_name = $campaign_name;
        $this->campaign_date = $campaign_date;

    }

    public function model(array $row)
    {
        return new Campaign([
            'campaign_name' => $this->campaign_name,
            'campaign_date' => $this->campaign_date,
            'name' => $row['name'],
            'surname' => $row['surname'],
            'email' => $row['email'],
            'employee_id' => $row['employee_id'],
            'phone' => $row['phone'],
            'points' => $row['point']
        ]);
    }

    public function rules(): array
    {

        return [
            '*.email' => [
                'unique:campaigns',
                'email',
            ],
            '*.phone' => [
                'unique:campaigns',
                 'regex:/^[0-9]{10}$/'
            ],
            '*.employee_id' => [
                'unique:campaigns'
            ]
        ];
    }
}
