<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Building;
use App\Models\Accesslog;

class AccessController extends Controller
{
    /**
     * Get Card Hold Info by using RFID card number
     *
     * @return void
     */
    public function getCardHolderInfo()
    {
        return Employee::getCardHolderDetail();
    }

    /**
     * Check users accessible to the building with RFID card number, building SIP
     *
     * @return void
     */
    public function authentication()
    {
        if (Building::where('sip', '=', request('sip'))->exists()) {
            if (request('cn')) {
                $has_access = Employee::hasAccess();
                if (!is_null($has_access[0]->building_id)) {
                    $log = new Accesslog;
                    $log->employee_id = $has_access[0]->employees_id;
                    $log->building_id = $has_access[0]->building_id;
                    $log->save();
                    return ['access'=> true];
                } else {
                    return response()->json(['access' => false], 200);
                }
            } else {
                return response()->json(['access' => false], 200);
            }
        } else {
            return response()->json(['access' => false], 200);
        }
    }
}
