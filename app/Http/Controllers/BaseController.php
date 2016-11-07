<?php

namespace App\Http\Controllers;

use App\DistributionCompany;
use App\EnergyAudit;
use App\EnergyAuditData;
use App\Region;
use App\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use PHPExcel_Worksheet_PageSetup;

class BaseController extends Controller
{
    public function getRegions()
    {
        $state_id = Input::get('id');
        $regions = Region::inState($state_id);

        $option = array();
        foreach ($regions as $region) {
            $option[] = ['Value' => $region->id, 'Text' => $region->region_name];
        }
        return json_encode($option, $state_id);
    }

    public function getRegionsByName()
    {
        $state_id = Input::get('id');
        $regions = Region::inState($state_id);

        $option = array();
        foreach ($regions as $region) {
            $option[] = ['Value' => $region->region_name, 'Text' => $region->region_name];
        }
        return json_encode($option, $state_id);
    }

    public function getEnergyAudit(Request $request)
    {
        /**
         * [data[x].state_name, data[x].local_gov_name, data[x].distribution_company, data[x].address,
         * data[x].mda_name, data[x].parent_federal_ministry, data[x].avg_electricity_bill_per_month, data[x].num_of_generators,
         * data[x].generator_running, data[x].num_of_years_at_location,
         * data[x].contact_of_mda_head, data[x].telephone
         * ]
         */
        if (!is_null($request['start_date']) && !is_null($request['end_date'])) {
            $start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            $end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $energy = EnergyAuditData::dateRange($start, $end);

            //dd($energy);
        } elseif (!is_null($request['state_name']) && !is_null($request['local_gov_name'])) {
            //$start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            //$end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $state = State::find($request['state_name'])->name;
            $lga = Region::find($request['local_gov_name'])->region_name;
//            $energy = EnergyAuditData::regionRange($start, $end,$state,$lga);
            $energy = EnergyAuditData::regionRange($state, $lga);

        } elseif (!is_null($request['disco_name'])) {
            $disco = $request['disco_name'];
            $energy = EnergyAuditData::discoFilter($disco);
        } elseif (!is_null($request['parent_fed_name'])) {
            $parent_fed_name = $request['parent_fed_name'];
            $energy = EnergyAuditData::ministryFilter($parent_fed_name);
        } else
            $energy = EnergyAuditData::latest('id')->get();

        $dataList = array();
        foreach ($energy as $i => $item) {
            $data['state_name'] = $item->state_id;
            $data['local_gov_name'] = $item->local_gov_id;
            $data['distribution_company'] = $item->disco_id;
            $data['address'] = $item->address;
            $data['mda_name'] = $item->mda_name;
            $data['parent_federal_ministry'] = $item->parent_fed_min_id;
            $data['avg_electricity_bill_per_month'] = $item->avg_electricity_bill_per_month;
            $data['num_of_generators'] = $item->num_of_generators;
            $data['generator_running'] = $item->generator_running;
            $data['num_of_years_at_location'] = $item->num_of_years_at_location;
            $data['contact_of_mda_head'] = $item->contact_of_mda_head;
            $data['telephone'] = $item->telephone;

            $dataList[] = $data;
        }

        return json_encode($dataList);

    }

    public function exportEnergyAudit()
    {
        Excel::create('MDA_EnergyAudit', function ($excel) {

            $excel->sheet('EnergyAudit', function ($sheet) {

                // first row styling and writing content
                $sheet->mergeCells('A1:M1');
                $sheet->setAllBorders('thin');
                $sheet->freezeFirstRow();
                // Auto filter for entire sheet
                $sheet->setAutoFilter();
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(20);
                });

                $sheet->row(1, array('MDA ENERGY AUDIT'));

                // second row styling and writing content
                $sheet->row(2, function ($row) {

                    // call cell manipulation methods
                    $row->setFontSize(12);
                    $row->setFontWeight('bold');
                    $row->setFontFamily('Calibri');
                    $row->setFontColor('#ff0000');
                });

                $sheet->row(2, array(
                    'S/N', 'STATE', 'LGA', 'Distribution Company', 'ADDRESS', 'MDA NAME', 'PARENT FEDERAL MINISTRY',
                    'Average Monthly Electricity Bill (NGN)', 'No of Generators', 'Generator Running Hrs/Month',
                    'No of Years at Location', 'Contact details of MDA Head', 'Telephone'
                ));

                // getting data to display - in my case only one record
                $energies = EnergyAuditData::all();

                // setting column names for data - you can of course set it manually
                //$sheet->appendRow(array_keys($users[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                // putting users data as next rows
                $i = 3;
                $c = 1;
                foreach ($energies as $energy) {
                    $sheet->row($i, array(
                        $c++,
                        $energy->state_id,
                        $energy->local_gov_id,
                        $energy->disco_id,
                        $energy->address,
                        $energy->mda_name,
                        $energy->parent_fed_min_id,
                        $energy->avg_electricity_bill_per_month,
                        $energy->num_of_generators,
                        $energy->generator_running,
                        $energy->num_of_years_at_location,
                        $energy->contact_of_mda_head,
                        $energy->telephone
                    ));
                    $i++;

                }
            });

        })->export('xls');
    }

    public function showLogin()
    {
        return view('admin.login');
    }


}
