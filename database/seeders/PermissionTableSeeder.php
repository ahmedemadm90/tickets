<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $permissions = [
            'Super Setting',
            'Regions List',
            'VPS List', 'VPS Show', 'VPS Create', 'VPS Edit', 'VPS Destroy',
            'Roles List', 'Roles Show', 'Roles Create', 'Roles Edit', 'Roles Destroy',
            'Users List', 'Users Show', 'Users Create', 'Users Edit', 'Users Destroy',
            'Regions', 'Regions List', 'Region Create', 'Region Edit', 'Region Show', 'Region Delete',
            'Segments', 'Segments List', 'Segment Create', 'Segment Edit', 'Segment Show', 'Segment Delete',
            'Locations List', 'Locations Show', 'Locations Create', 'Locations Edit', 'Locations Destroy',
            'Areas List', 'Areas Show', 'Areas Create', 'Areas Edit', 'Areas Destroy',
            'Operational States List', 'Operational State Create', 'Operational State Edit', 'Operational State Show', 'Operational State Delete',
            'Vlans List', 'Vlan Create', 'Vlan Edit', 'Vlan Show', 'Vlan Delete',
            'Record Devices List', 'Record Device Create', 'Record Device Edit', 'Record Device Show', 'Record Device Delete',
            'Switches List', 'Switch Create', 'Switch Edit', 'Switch Show', 'Switch Delete',
            'Maintenance Categories List', 'Maintenance Category Create', 'Maintenance Category Edit', 'Maintenance Category Show', 'Maintenance Category Delete',
            'Maintenance Tools List', 'Maintenance Tool Create', 'Maintenance Tool Edit', 'Maintenance Tool Show', 'Maintenance Tool Delete',
            'Cleaning Tools List', 'Cleaning Tool Create', 'Cleaning Tool Edit', 'Cleaning Tool Show', 'Cleaning Tool Delete',
            'Cameras List', 'Camera Create', 'Camera Show', 'Camera Edit', 'Camera Delete',
            'Tickets List', 'Ticket Create', 'Ticket Show', 'Ticket Edit', 'Ticket Delete', 'Ticket Close',
        ]; */
        $permissions = [
            'Super Setting','Basic Setting',
            'Regions List','Regions Create', 'Regions Edit', 'Regions Destroy','Regions Show',
            'Segments List','Segments Create', 'Segments Edit', 'Segments Destroy','Segments Show',
            'Locations List','Locations Create', 'Locations Edit', 'Locations Destroy','Locations Show',
            'Operational State List','Operational State Create', 'Operational State Edit', 'Operational State Destroy','Operational State Show',
            'Areas List','Areas Create', 'Areas Edit', 'Areas Destroy','Areas Show',
            'Dispatches List','Dispatches Create', 'Dispatches Edit', 'Dispatches Destroy','Dispatches Show',
            'Vlans List','Vlans Create', 'Vlans Edit', 'Vlans Destroy','Vlans Show',
            'Record Devices List','Record Devices Create', 'Record Devices Edit', 'Record Devices Destroy','Record Devices Show',
            'Maintenance Categories List','Maintenance Categories Create', 'Maintenance Categories Edit', 'Maintenance Categories Destroy','Maintenance Categories Show',
            'Maintenance Tools List','Maintenance Tools Create', 'Maintenance Tools Edit', 'Maintenance Tools Destroy','Maintenance Tools Show',
            'Cleaning Tools List','Cleaning Tools Create', 'Cleaning Tools Edit', 'Cleaning Tools Destroy','Cleaning Tools Show',
            'Cameras List','Cameras Create','Cameras Edit','Cameras Destroy','Cameras Show',
            'Tickets List','Tickets Create','Tickets Edit','Tickets Destroy','Tickets Show','Tickets Comment','Tickets Close', 'Tickets Closed',
            'Roles List', 'Roles Show', 'Roles Create', 'Roles Edit', 'Roles Destroy',
            'Users List', 'Users Show', 'Users Create', 'Users Edit', 'Users Destroy',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
