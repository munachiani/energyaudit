<?php

namespace App\Http\Controllers;

use App\AuditTrail;
use App\CustomerBill;
use App\CustomerNote;
use App\DistributionCompany;
use App\EnergyAuditData;
use App\Region;
use App\Role;
use App\User;
use App\UserDisco;
use App\UserRegion;
use App\UserRole;
use Illuminate\Http\Request;
use App\AuditAction;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function __construct()
    {
        /*  $user=auth()->user();
          if(is_null($user))
              return redirect('/')
                  ->withErrors(['loginError'=>'Please login to access the dashboard']);*/
        $this->middleware('auth');
    }


    public function dashboard()
    {
        $mdasUploaded = CustomerBill::all()->count();
        $mdasCaptured = CustomerBill::distinct('mda_name')->count('mda_name');
        $mdaCapturedDistinct = CustomerBill::distinctBill();
//        dd($mdaCapturedDistinct);
        $customerNotes = CustomerNote::all();
        $disco = DistributionCompany::all();
        return view('admin.dashboard')
            ->with(compact('mdasUploaded', 'mdasCaptured', 'customerNotes', 'disco', 'mdaCapturedDistinct'));
    }

    public function viewUsers()
    {
        return view('admin.users.index');
    }

    public function editUsers($id)
    {
        $user = User::find($id);
        return view('admin.users.edit')
            ->with(compact('user'));
    }

    public function activateUsers()
    {
        return view('admin.users.activate');
    }

    public function createUsers()
    {
        return view('admin.users.create');
    }

    public function uploadMDAEnergyAuditData()
    {
        return view('admin.upload');
    }

    public function uploadMDACustomerNote()
    {
        return view('admin.uploadMdaCustomerNote');
    }

    public function uploadMDACustomerBill()
    {
        return view('admin.uploadMdaCustomerBill');
    }

    public function saveMDAEnergyAuditData(Request $request)
    {

        $file = $request->file('file');
        if ($file->isFile()) {
            $destinationPath = public_path('tempUploads/');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'xls' && $extension != 'xlsx')
                return redirect()->back()->withErrors(['uploadError' => 'Invalid File Format! Accepted File formats are [.xls and .xlsx Only. Please download sample below]']);

            /*$filename = 'mda_' . '.' . $extension;

            if ($file->move($destinationPath, $filename)) {
                session()->flash('flash_message', 'Data Uploaded.');
                return redirect()->back();

            }*/
            else {
                try {
                    Excel::selectSheetsByIndex(0)->load($file, function ($reader) {

                        $cc = 0;
                        foreach ($reader->toArray() as $row) {
                            if ($cc++ <= 0)
                                continue;
                            else {
                                //dd($row);
                                $key = array_keys($row);

                                $energyAudit = new EnergyAuditData();
                                $energyAudit->state_id = $row[$key[1]];
                                $energyAudit->local_gov_id = $row[$key[2]];
                                $energyAudit->disco_id = $row[$key[3]];
                                $energyAudit->address = $row[$key[4]];
                                $energyAudit->mda_name = $row[$key[5]];
                                $energyAudit->parent_fed_min_id = $row[$key[6]];
                                $energyAudit->avg_electricity_bill_per_month = $row[$key[7]];
                                $energyAudit->num_of_generators = $row[$key[8]];
                                $energyAudit->generator_running = $row[$key[9]];
                                $energyAudit->num_of_years_at_location = $row[$key[10]];
                                $energyAudit->contact_of_mda_head = $row[$key[11]];
                                $energyAudit->telephone = $row[$key[12]];

                                $energyAudit->save();
//                                dd($energyAudit);//->save();
                            }
                        }

//                        }
                    });
                    session()->flash('flash_message', 'Report uploaded successfully.');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['uploadError' => $e->getMessage()]);
                }
            }
        }
    }

    public function saveMDACustomerNote(Request $request)
    {

        $file = $request->file('file');
        if ($file->isFile()) {
            $destinationPath = public_path('tempUploads/');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'xls' && $extension != 'xlsx')
                return redirect()->back()->withErrors(['uploadError' => 'Invalid File Format! Accepted File formats are [.xls and .xlsx Only. Please download sample below]']);

            /*$filename = 'mda_' . '.' . $extension;

            if ($file->move($destinationPath, $filename)) {
                session()->flash('flash_message', 'Data Uploaded.');
                return redirect()->back();

            }*/
            else {
                try {
                    Excel::selectSheetsByIndex(1)->load($file, function ($reader) {
                        $sheet = $reader->getExcel()->getSheet(1);
                        $highestRow = $sheet->getHighestRow();
                        $cc = 4;
                        foreach ($reader->toArray() as $row) {
                            if ($cc++ < 7)
                                continue;
                            else {

                                //dd($row);
                                $key = array_keys($row);

                                $siteLoc = explode('/', $row[$key[6]]);

                                $energyMdaNote = new CustomerNote();
                                $energyMdaNote->mda_name = $row[$key[1]];
                                $energyMdaNote->government_level = $row[$key[2]];
                                $energyMdaNote->parent_fed_min_id = $row[$key[3]];
                                $energyMdaNote->sector_id = $row[$key[4]];
                                $energyMdaNote->site_address = $row[$key[5]];
                                $energyMdaNote->site_latitude = $siteLoc[0];
                                $energyMdaNote->site_longitude = $siteLoc[1];
                                $energyMdaNote->closet_landmark = $row[$key[7]];
                                $energyMdaNote->village = $row[$key[8]];
                                $energyMdaNote->town = $row[$key[9]];
                                $energyMdaNote->city = $row[$key[10]];
                                $energyMdaNote->state_id = $row[$key[11]];
                                $energyMdaNote->lga_id = $row[$key[12]];
                                $energyMdaNote->disco_id = $row[$key[13]];
                                $energyMdaNote->business_unit = $row[$key[14]];
                                $energyMdaNote->disco_acct_number = $row[$key[15]];
                                $energyMdaNote->customer_type = $row[$key[16]];
                                $energyMdaNote->customer_class = $row[$key[17]];
                                $energyMdaNote->meter_installed = $row[$key[18]];
                                $energyMdaNote->meter_no = $row[$key[19]];
                                $energyMdaNote->meter_type = $row[$key[20]];
                                $energyMdaNote->meter_brand = $row[$key[21]];
                                $energyMdaNote->meter_model = $row[$key[22]];

                                $energyMdaNote->save();
//                                dd($energyMdaNote);//->save();
                            }

                        }
                    });
                    session()->flash('flash_message', 'Report uploaded successfully.');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['uploadError' => $e->getMessage()]);
                }
            }
        }
    }

    public function saveMDACustomerBill(Request $request)
    {

        $file = $request->file('file');
        if ($file->isFile()) {
            $destinationPath = public_path('tempUploads/');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'xls' && $extension != 'xlsx')
                return redirect()->back()->withErrors(['uploadError' => 'Invalid File Format! Accepted File formats are [.xls and .xlsx Only. Please download sample below]']);

            /*$filename = 'mda_' . '.' . $extension;

            if ($file->move($destinationPath, $filename)) {
                session()->flash('flash_message', 'Data Uploaded.');
                return redirect()->back();

            }*/
            else {
                try {
                    Excel::selectSheetsByIndex(2)->load($file, function ($reader) {
                        $sheet = $reader->getExcel()->getSheet(2);
                        $highestRow = $sheet->getHighestRow();
                        $cc = 1;
                        foreach ($reader->toArray() as $row) {
                            if ($cc++ < 1)
                                continue;
                            else {

//                                dd($row);
                                $key = array_keys($row);

                                $siteLoc = explode('/', $row[$key[6]]);

                                $energyMdaBill = new CustomerBill();
                                $energyMdaBill->mda_name = $row[$key[1]];
                                $energyMdaBill->disco = $row[$key[2]];
                                $energyMdaBill->disco_account_number = $row[$key[3]];
                                $energyMdaBill->invoice_date = $row[$key[4]]->format('Y-m-d');
                                $energyMdaBill->account_month = $row[$key[5]];
                                $energyMdaBill->invoice_number = $row[$key[6]];
                                $energyMdaBill->monthly_energy_consumption = $row[$key[7]];
                                $energyMdaBill->meter_reading = $row[$key[8]];
                                $energyMdaBill->actual_estimated_billing = $row[$key[9]];
                                $energyMdaBill->tariff_rate = $row[$key[10]];
                                $energyMdaBill->fixed_charge = $row[$key[11]];
                                $energyMdaBill->invoice_amt = $row[$key[12]];

                                $energyMdaBill->save();
//                                dd($energyMdaBill);//->save();
                            }

                        }
                    });
                    session()->flash('flash_message', 'Report uploaded successfully.');
                    return redirect()->back();
                } catch (\Exception $e) {
                    return redirect()->back()->withErrors(['uploadError' => $e->getMessage()]);
                }
            }
        }
    }

    public function addRole(Request $request)
    {
        $id = $request['id'];
        $role = $request['role'];
        $actor = auth()->user();

        $userRole = new UserRole();
        $userRole->fill(['userId' => $id, 'roleId' => $role]);
        $userRole->save();

        $this->auditTrail($actor, AuditAction::$ASSIGN_ROLE, ['{UserName}', '{Role}'], [$actor->UserName, Role::find($role)->name]);
        session()->flash('flash_message', 'Role Assigned Successfully');
        return redirect()->back();


    }

    public function addRegion(Request $request)
    {
        $id = $request['id'];
        $state = $request['State'];
        $region = $request['Region'];

        $regn = Region::find($region);
        $actor = auth()->user();

        $userRegion = new UserRegion();
        $userRegion->fill(['user_id' => $id, 'region_id' => $region]);
        $userRegion->save();

        $this->auditTrail($actor, AuditAction::$ASSIGN_REGION, ['{UserName}', '{Region}'], [$actor->UserName, $regn->region_name]);
        session()->flash('flash_message', 'Region Assigned Successfully');
        return redirect()->back();


    }

    public function deleteRole($id)
    {
        $role = UserRole::find($id);

        $role->delete();
        $actor = auth()->user();

        $this->auditTrail($actor, AuditAction::$REMOVE_USER_ROLE, ['{UserName}', '{Role}'], [$actor->UserName, $role->name]);
        session()->flash('flash_message', 'Successful!');
        return redirect()->back();


    }

    public function deleteRegion($id)
    {
        $region = UserRegion::find($id);

        $region->delete();
        $actor = auth()->user();

        $this->auditTrail($actor, AuditAction::$DELETE_USER_REGION, ['{UserName}', '{Region}'], [$actor->UserName, $region->region_name]);
        session()->flash('flash_message', 'Successful!');
        return redirect()->back();


    }

    public function reportInfo()
    {
        return view('admin.report');
    }

    public function customerData()
    {
        return view('admin.customer.data');
    }

    public function customerBilling()
    {
        return view('admin.customer.billing');
    }

    public function map()
    {
        return view('admin.map');
    }

    public function audit()
    {
        return view('admin.audit');
    }

    public function changePassword($id)

    {
        $user = User::find($id);

        return view('admin.users.password')
            ->with(compact('user'));
    }

    public function updatePassword(Request $request)
    {

        $rules = [
            'OldPassword' => 'required',
            'NewPassword' => 'required',
            'ConfirmPassword' => 'required|same:NewPassword'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->passes()) {

            $user = User::find($request['id']);
            $oldPassword = $request['OldPassword'];


            $newPassword = $request['NewPassword'];

            $userData = [
                'UserName' => $user->UserName,
                'password' => $oldPassword
            ];
            if (Auth::attempt($userData)) {

                $user->password = bcrypt($newPassword);
                $user->save();
                $this->auditTrail($user, AuditAction::$UPDATE_USER, ['{UserName}'], [$user->UserName]);
                session()->flash('updateSuccess', 'Password Updated Successfully');
                return redirect()->back();
            } else {
                return redirect()->back()
                    ->withErrors(['updateError' => 'Invalid Old Password']);
            }
        } else {

            return redirect()->back()
                ->withErrors($validator);
        }
    }

    public function ManageRole($id)
    {
//        dd($id);

        $user = User::find($id);
        return view('admin.users.manageRole')
            ->with(compact('user'));
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function ChangeAvatar(Request $request)
    {


        $rules = [
            'ImageInfo' => 'required|mimes:jpeg,jpg,png'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {

            $user = User::find($request['id']);
//            $user = User::find($request['id']);


            $userName = $user->getFullNameAttribute();

            $file = $request->file('ImageInfo');


            if ($file->isFile()) {
                $destinationPath = public_path('userimages/');
                $extension = $file->getClientOriginalExtension();
                $name = explode(' ', $userName);
                $name = implode('', $name);

                $filename = $name . '.' . $extension;

                if ($file->move($destinationPath, $filename)) {
                    $user->ImageInfo = $filename;

                }
            }

            $user->save();
            $this->auditTrail($user, AuditAction::$UPDATE_USER, ['{UserName}'], [$user->UserName]);
            session()->flash('flash_message', 'Avatar Updated.');
            return redirect()->back();
        }

    }


    public function updateProfile(Request $request, $id)
    {

        $rules = [
            'FirstName' => 'required',
            'LastName' => 'required',
            'MiddleName' => 'required',
//            'Email' => 'required|unique:users',
            'Address' => 'required',
            'PhoneNumber' => 'required',
            'UserRoles' => 'required',
            'Gender' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {


            $firstName = $request['FirstName'];
            $lastName = $request['LastName'];
            $middleName = $request['MiddleName'];
            $email = $request['Email'];
            $address = $request['Address'];
            $PhoneNumber = $request['PhoneNumber'];

            $user = User::find($id);

            $user->FirstName = $firstName;
            $user->LastName = $lastName;
            $user->MiddleName = $middleName;
            $user->email = $email;
            $user->Address = $address;
            $user->PhoneNumber = $PhoneNumber;

            session()->flash('flashMessage', 'User Updated');

            $user->save();
            return redirect()->back();

        }
    }


    public function createUser(Request $request)
    {
        $rules = [
            'LastName' => 'required',
            'FirstName' => 'required',
            'MiddleName' => 'required',
            'Gender' => 'required',
            'PhoneNumber' => 'required',
            'Email' => 'required|string|unique:users',
            'Address' => 'required',
            'UserRole' => 'required',
            'password' => 'required|max:14|min:6',
            'confirmPassword' => 'required|same:password|max:14|min:6',
        ];


        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator);
        } else {
            $LastName = $request['LastName'];
            $FirstName = $request['FirstName'];
            $MiddleName = $request['MiddleName'];
            $Gender = $request['Gender'];
            $address = $request['Address'];
            $PhoneNumber = $request['PhoneNumber'];
            $Email = $request['Email'];
            $UserRole = $request['UserRole'];
            $password = $request['password'];

            $user = new User();
            $user->LastName = $LastName;
            $user->FirstName = $FirstName;
            $user->MiddleName = $MiddleName;
            $user->Gender = $Gender;
            $user->Email = $Email;
            $user->PhoneNumber = $PhoneNumber;
            $user->Address = $address;
            $user->UserName = $Email;
            $user->IsActive = 1;
            $user->EmailConfirmed = 1;
            $user->password = bcrypt($password);

            $user->save();

            $user_role = new UserRole();
            $user_role->userId = $user->id;
            $user_role->roleId = Role::byName($UserRole)->id;
            $user_role->save();


            switch ($UserRole) {
                case Role::$DISCO:

                    $disco = new UserDisco();

                    $disco->user_id = $user->id;
                    $disco->disco_id = $request['disco_id'];

                    $disco->save();

                    break;
                case Role::$FIELD_AGENT:
                case Role::$REGIONAL_ADMIN:
                case Role::$REGIONAL_SUPERVISOR:

                    $region = new UserRegion();

                    $region->user_id = $user->id;
                    $region->region_id = $request['Region'];

                    $region->save();

                    break;

            }

            session()->flash('flash_message', 'User created succesfully.');
            return redirect()->back();


        }
    }

    public function changeStatus($status, $id)
    {
        $user = User::find($id);
//dd($status);
        $user->isActive = !$status;

        $user->save();

        $user->isActive() ? $this->auditTrail($user, AuditAction::$DEACTIVATE_USER, ['{UserName}'], [$user->UserName]) :
            $this->auditTrail($user, AuditAction::$ACTIVATE_USER, ['{UserName}'], [$user->UserName]);;


        return redirect('admin/users/activate/' . $user->id);
    }

    public function checkStatus($id)
    {
        $user = User::find($id);
        return view('admin.users.activate')
            ->with(compact('user'));
    }


}
