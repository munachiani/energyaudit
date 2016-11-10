<?php

namespace App\Http\Controllers;

use App\CustomerBill;
use App\CustomerNote;
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

    public function getCustomerNote(Request $request)
    {
        /**
         * var addr = data[x].site_latitude + ", " + data[x].site_longitude;
         * table.row.add(["<a class='btn btn-primary' data-value='" +
         * data[x].customer_note_id + "' href='/Customer/ViewBill/" +
         * data[x].customer_note_id + "'>View Bills</a>", user_role == "Disco"?"":"<a class='btn btn-danger' data-value='" +
         * data[x].customer_note_id + "' href='/Customer/DeleteCustomerNote/" +
         * data[x].customer_note_id + "'>Delete</a>",
         * data[x].mda_name,
         * data[x].government_level,
         * data[x].parent_fed_minis_name,
         * data[x].sector_name,
         * data[x].site_address,
         * addr,
         * data[x].closet_landmark,
         * data[x].village,
         * data[x].town,
         * data[x].city,
         * data[x].lga_name,
         * data[x].state_name,
         * data[x].disco_name,
         * data[x].business_unit,
         * data[x].disco_acct_number,
         * data[x].customer_type,
         * data[x].customer_class,
         * data[x].meter_installed ? "Yes" : "No",
         * data[x].meter_no,
         * data[x].meter_type,
         * data[x].meter_brand,
         * data[x].meter_model
         * ]
         */
        if (!is_null($request['start_date']) && !is_null($request['end_date'])) {
            $start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            $end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $customer = CustomerNote::dateRange($start, $end);

            //dd($customer);
        } elseif (!is_null($request['state_name']) && !is_null($request['local_gov_name'])) {
            //$start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            //$end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $state = State::find($request['state_name'])->name;
            $lga = Region::find($request['local_gov_name'])->region_name;
//            $customer = EnergyAuditData::regionRange($start, $end,$state,$lga);
            $customer = CustomerNote::regionRange($state, $lga);

        } elseif (!is_null($request['disco_name'])) {
            $disco = $request['disco_name'];
            $customer = CustomerNote::discoFilter($disco);
        } elseif (!is_null($request['parent_fed_name'])) {
            $parent_fed_name = $request['parent_fed_name'];
            $customer = CustomerNote::ministryFilter($parent_fed_name);
        } else
            $customer = CustomerNote::latest('id')->get();

        $dataList = array();
        foreach ($customer as $i => $item) {
            $data['site_latitude'] = $item->site_latitude;
            $data['site_longitude'] = $item->site_longitude;
            $data['customer_note_id'] = $item->id;
            $data['mda_name'] = $item->mda_name;
            $data['government_level'] = $item->government_level;
            $data['parent_fed_minis_name'] = $item->parent_fed_min_id;
            $data['sector_name'] = $item->sector_id;
            $data['site_address'] = $item->site_address;
            $data['closet_landmark'] = $item->closet_landmark;
            $data['village'] = $item->village;
            $data['town'] = $item->town;
            $data['city'] = $item->city;
            $data['lga_name'] = $item->lga_id;
            $data['state_name'] = $item->state_id;
            $data['disco_name'] = $item->disco_id;
            $data['business_unit'] = $item->business_unit;
            $data['disco_acct_number'] = $item->disco_acct_number;
            $data['customer_type'] = $item->customer_type;
            $data['customer_class'] = $item->customer_class;
            $data['meter_installed'] = $item->meter_installed == 'METERED';
            $data['meter_no'] = $item->meter_no;
            $data['meter_type'] = $item->meter_type;
            $data['meter_brand'] = $item->meter_brand;
            $data['meter_model'] = $item->meter_model;

            $dataList[] = $data;
        }

        return json_encode($dataList);

    }

    public function getCustomerBill(Request $request)
    {
        /**
         * table.row.add(["<a class='btn btn-danger' data-value='" +
         * data[x].customer_bill_id +
         * "' href='/Customer/DeleteCustomerBill/" +
         * data[x].customer_bill_id +
         * "'>Delete</a>",
         * data[x].mda_name,
         * data[x].disco_name,
         * data[x].disco_acct_number,
         * data[x].acct_month,
         * data[x].invoice_number,
         * data[x].monthly_energy_consumptn,
         * data[x].actual_estimated_billing,
         * data[x].meter_reading,
         * data[x].tariff_rate,
         * data[x].fixed_charge,
         * data[x].invoice_amt
         * ]
         */
        if (!is_null($request['start_date']) && !is_null($request['end_date'])) {
            $start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            $end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $bill = CustomerBill::dateRange($start, $end);

            //dd($bill);
        } elseif (!is_null($request['disco_name'])) {
            $disco = $request['disco_name'];
            $bill = CustomerBill::discoFilter($disco);
        } /*elseif (!is_null($request['state_name']) && !is_null($request['local_gov_name'])) {
            //$start = Carbon::parse($request['start_date'])->format('Y-m-d H:i:s');
            //$end = Carbon::parse($request['end_date'])->format('Y-m-d H:i:s');
            $state = State::find($request['state_name'])->name;
            $lga = Region::find($request['local_gov_name'])->region_name;
//            $bill = EnergyAuditData::regionRange($start, $end,$state,$lga);
            $bill = CustomerNote::regionRange($state, $lga);

        } elseif (!is_null($request['parent_fed_name'])) {
            $parent_fed_name = $request['parent_fed_name'];
            $bill = CustomerNote::ministryFilter($parent_fed_name);
        } */
        else
            $bill = CustomerBill::latest('id')->get();

        $dataList = array();
        foreach ($bill as $i => $item) {
            $data['customer_bill_id'] = $item->id;
            $data['mda_name'] = $item->mda_name;
            $data['disco_name'] = $item->disco;
            $data['disco_acct_number'] = $item->disco_account_number;
            $data['acct_month'] = $item->account_month;
            $data['invoice_number'] = $item->invoice_number;
            $data['monthly_energy_consumptn'] = $item->monthly_energy_consumption;
            $data['actual_estimated_billing'] = $item->actual_estimated_billing;
            $data['meter_reading'] = $item->meter_reading;
            $data['tariff_rate'] = $item->tariff_rate;
            $data['fixed_charge'] = $item->fixed_charge;
            $data['invoice_amt'] = $item->invoice_amt;

            $dataList[] = $data;
        }

        return json_encode($dataList);

    }

    public function deleteCustomerBill($id)
    {

        return CustomerBill::find($id)->delete();

    }

    public function exportEnergyAudit()
    {
        Excel::create('MDA_EnergyAudit', function ($excel) {

            $excel->sheet('EnergyAudit', function ($sheet) {

                // first row styling and writing content
                $sheet->mergeCells('A1:M1');
                $sheet->setAllBorders('thin');
//                $sheet->freezeFirstRow();
                // Auto filter for entire sheet
//                $sheet->setAutoFilter();
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

    public function exportCustomerNote()
    {
        Excel::create('MDA_Customer_Data', function ($excel) {

            $excel->sheet('CustomerData', function ($sheet) {

                // first row styling and writing content
                $sheet->mergeCells('A1:W1');
                $sheet->setAllBorders('thin');
//                $sheet->freezeFirstRow();
                // Auto filter for entire sheet
//                $sheet->setAutoFilter();
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(20);
                });

                $sheet->row(1, array('MDA CUSTOMER PROFILE DATA'));

                // second row styling and writing content
                $sheet->row(2, function ($row) {

                    // call cell manipulation methods
                    $row->setFontSize(12);
                    $row->setFontWeight('bold');
                    $row->setFontFamily('Calibri');
                    $row->setFontColor('#ff0000');
                });

                $sheet->row(2, array(
                    'SN', 'MDA name', 'Government Level', 'Parent Ministry ', 'Sector ', 'Site Address', 'Site Address Coordinates (Longitude/Latitude)',
                    'Closest Landmark', 'Village ', 'Town ', 'City ', 'State', 'LGA', 'DisCo', 'Business Unit ', 'Disco Account Number ', 'Customer Type',
                    'Customer Tariff Class', 'Meter Installed ', 'Meter No', 'Meter Type', 'Meter Brand', 'Meter Model'

                ));

                // getting data to display - in my case only one record
                $customers = CustomerNote::all();

                // setting column names for data - you can of course set it manually
                //$sheet->appendRow(array_keys($users[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                // putting users data as next rows
                $i = 3;
                $sn = 1;
                foreach ($customers as $customer) {
                    $sheet->row($i, array(
                        $sn++,
                        $customer->mda_name,
                        $customer->government_level,
                        $customer->parent_fed_min_id,
                        $customer->sector_id,
                        $customer->site_address,
                        $customer->site_latitude . '/' . $customer->site_longitude,
                        $customer->closet_landmark,
                        $customer->village,
                        $customer->town,
                        $customer->city,
                        $customer->state_id,
                        $customer->lga_id,
                        $customer->disco_id,
                        $customer->business_unit,
                        $customer->disco_acct_number,
                        $customer->customer_type,
                        $customer->customer_class,
                        $customer->meter_installed,
                        $customer->meter_no,
                        $customer->meter_type,
                        $customer->meter_brand,
                        $customer->meter_model,
                    ));
                    $i++;

                }
            });

        })->export('xlsx');
    }

    public function exportCustomerBill()
    {
        Excel::create('MDA_Customer_Bill', function ($excel) {

            $excel->sheet('CustomerBill', function ($sheet) {

                // first row styling and writing content
                $sheet->mergeCells('A1:M1');
                $sheet->setAllBorders('thin');
//                $sheet->freezeFirstRow();
                // Auto filter for entire sheet
//                $sheet->setAutoFilter();
                $sheet->row(1, function ($row) {
                    $row->setFontFamily('Calibri');
                    $row->setFontSize(20);
                });

                $sheet->row(1, array('MDA CUSTOMER PROFILE DATA'));

                // second row styling and writing content
                $sheet->row(2, function ($row) {

                    // call cell manipulation methods
                    $row->setFontSize(12);
                    $row->setFontWeight('bold');
                    $row->setFontFamily('Calibri');
                    $row->setFontColor('#ff0000');
                });

                $sheet->row(2, array(
                    'SN','MDA Name','DisCo','Disco Account Number ','Invoice Date', 'Account Month',
                    'Invoice number ','Monthly Energy Consumption (kWH)','Meter Reading (kWH)','Actual or Estimated Billing',
                    'Tariff Rate (NGN/KwH)','Fixed Charge','Invoice Amount (NGN)'
                ));

                // getting data to display - in my case only one record
                $customers = CustomerBill::all();

                // setting column names for data - you can of course set it manually
                //$sheet->appendRow(array_keys($users[0])); // column names

                // getting last row number (the one we already filled and setting it to bold
                $sheet->row($sheet->getHighestRow(), function ($row) {
                    $row->setFontWeight('bold');
                });

                // putting users data as next rows
                $i = 3;
                $sn = 1;
                foreach ($customers as $customer) {
                    $sheet->row($i, array(
                        $sn++,
                        $customer->mda_name,
                        $customer->disco,
                        $customer->disco_account_number,
                        $customer->invoice_date,
                        $customer->account_month,
                        '00'.$customer->invoice_number,
                        $customer->monthly_energy_consumption,
                        $customer->meter_reading,
                        $customer->actual_estimated_billing,
                        $customer->tariff_rate,
                        ($customer->fixed_charge>0?$customer->fixed_charge:'NIL'),
                        $customer->invoice_amt,
                    ));
                    $i++;

                }
            });

        })->export('xlsx');
    }

    public function showLogin()
    {
        $user=auth()->user();
        if(!is_null($user))
            return redirect('dashboard');
        return view('admin.login');
    }


}
