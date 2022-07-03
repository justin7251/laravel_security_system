<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;

    /**
     * Get Card hold info RFID card number
     *
     * @return void
     */
    public static function getCardHolderDetail()
    {
        $employee = DB::table("employees")
        ->select("employees.full_name", DB::raw("GROUP_CONCAT(departments.name) as department"))
        ->join("mappings", function($join) {
            $join->on("mappings.from_id", "=", "employees.id")
                ->where("mappings.deleted", "=", DB::raw("'0'"))
                ->where("mappings.from_model", "=", DB::raw("'Employee'"))
                ->where("mappings.to_model", "=", DB::raw("'Department'"));
        })
        ->leftJoin("departments", "departments.id", "=", 'mappings.to_id')
        ->where("rfid", DB::raw("'" . request('cn') . "'"))->get();

        $employee->transform(function ($staff) {
            if (is_null($staff->full_name) && is_null($staff->department)) {
                $staff->full_name = '';
                $staff->department = [];
            } else {
                $staff->department = explode(',', $staff->department);
            }
            return $staff;
        });
        return $employee;
    }

    /**
     * Check Card hold RFID card number has access to the building
     *
     * @return void
     */
    public function hasAccess()
    {
        $employee = DB::table("employees")
        ->select(
            "employees.id AS employees_id",
            "buildings.id as building_id",
            DB::raw("MAX(accesslogs.created_at) as last_access"),
            "accesslogs.building_id as last_building_id"
        )
        ->join("mappings as employee_mapping", function($join) {
            $join->on("employee_mapping.from_id", "=", "employees.id")
            ->where("employee_mapping.from_model", "=", DB::raw("'Employee'"))
            ->where("employee_mapping.to_model", "=", DB::raw("'Department'"))
            ->where("employee_mapping.deleted", "=", DB::raw("'0'"));
        })
        ->join("mappings as building_mapping", function($join) {
            $join->on("building_mapping.to_id", "=", "employee_mapping.to_id")
            ->where("building_mapping.from_model", "=", DB::raw("'Building'"))
            ->where("building_mapping.to_model", "=", DB::raw("'Department'"))
            ->where("building_mapping.deleted", "=", DB::raw("'0'"));
        })
        ->join("buildings", function($join) {
            $join->on("buildings.id", "=", "building_mapping.from_id")
            ->where("buildings.sip", "=", DB::raw("'" . request('sip') . "'"));
        })
        ->leftJoin("accesslogs", "accesslogs.employee_id", "=", "employees.id")
        ->where("employees.rfid", DB::raw("'" . request('cn') . "'"))->get();
        $employee->transform(function ($staff) {
            if (!is_null($staff->building_id) && !is_null($staff->last_building_id)) {
                if ($staff->building_id != $staff->last_building_id && date("Y-m-d H:i:s", strtotime("-10 minutes")) < $staff->last_access) {
                    $staff->building_id = null;
                }
            }
            return $staff;
        });
        return $employee->toArray();
    }
}
