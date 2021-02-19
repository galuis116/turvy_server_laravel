<?php

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
        $permissions = [
            ['id' => 1, 'name' => 'role-management','parent_id' => 0],
            ['id' => 2, 'name' => 'role-list','parent_id' => 1],
            ['id' => 3, 'name' => 'role-create','parent_id' => 1],
            ['id' => 4, 'name' => 'role-edit','parent_id' => 1],
            ['id' => 5, 'name' => 'role-delete','parent_id' => 1],
            
            ['id' => 6, 'name' => 'advertise-management','parent_id' => 0],
            ['id' => 7, 'name' => 'advertise-list','parent_id' => 6],
            ['id' => 8, 'name' => 'advertise-create','parent_id' => 6],
            ['id' => 9, 'name' => 'advertise-edit','parent_id' => 6],
            ['id' => 10, 'name' => 'advertise-delete','parent_id' => 6],

            ['id' => 11, 'name' => 'airport-management','parent_id' => 0],
            ['id' => 12, 'name' => 'airport-list','parent_id' => 11],
            ['id' => 13, 'name' => 'airport-create','parent_id' => 11],
            ['id' => 14, 'name' => 'airport-edit','parent_id' => 11],
            ['id' => 15, 'name' => 'airport-delete','parent_id' => 11],

            ['id' => 16, 'name' => 'airport-pricing-management','parent_id' => 0],
            ['id' => 17, 'name' => 'airportpricing-list','parent_id' => 16],
            ['id' => 18, 'name' => 'airportpricing-create','parent_id' => 16],
            ['id' => 19, 'name' => 'airportpricing-edit','parent_id' => 16],
            ['id' => 20, 'name' => 'airportpricing-delete','parent_id' => 16],

            ['id' => 21, 'name' => 'currency-management','parent_id' => 0],
            ['id' => 22, 'name' => 'currency-list','parent_id' => 21],
            ['id' => 23, 'name' => 'currency-create','parent_id' => 21],
            ['id' => 24, 'name' => 'currency-edit','parent_id' => 21],
            ['id' => 25, 'name' => 'currency-delete','parent_id' => 21],

            ['id' => 26, 'name' => 'distance-management','parent_id' => 0],
            ['id' => 27, 'name' => 'distance-list','parent_id' => 26],
            ['id' => 28, 'name' => 'distance-create','parent_id' => 26],
            ['id' => 29, 'name' => 'distance-edit','parent_id' => 26],
            ['id' => 30, 'name' => 'distance-delete','parent_id' => 26],

            ['id' => 31, 'name' => 'payment-method-management','parent_id' => 0],
            ['id' => 32, 'name' => 'payment-list','parent_id' => 31],
            ['id' => 33, 'name' => 'payment-create','parent_id' => 31],
            ['id' => 34, 'name' => 'payment-edit','parent_id' => 31],
            ['id' => 35, 'name' => 'payment-delete','parent_id' => 31],

            ['id' => 36, 'name' => 'booking-management','parent_id' => 0],
            ['id' => 37, 'name' => 'booking-list','parent_id' => 36],
            ['id' => 38, 'name' => 'booking-create','parent_id' => 36],

            ['id' => 39, 'name' => 'cancel-reason-management','parent_id' => 0],
            ['id' => 40, 'name' => 'cancelreason-list','parent_id' => 39],
            ['id' => 41, 'name' => 'cancelreason-create','parent_id' => 39],
            ['id' => 42, 'name' => 'cancelreason-edit','parent_id' => 39],
            ['id' => 43, 'name' => 'cancelreason-delete','parent_id' => 39],

            ['id' => 44, 'name' => 'charge-management','parent_id' => 0],
            ['id' => 45, 'name' => 'charge-list','parent_id' => 44],
            ['id' => 46, 'name' => 'charge-create','parent_id' => 44],
            ['id' => 47, 'name' => 'charge-edit','parent_id' => 44],
            ['id' => 48, 'name' => 'charge-delete','parent_id' => 44],
            
            ['id' => 49, 'name' => 'peaktime-charge-management','parent_id' => 0],
            ['id' => 50, 'name' => 'peaktime-list','parent_id' => 49],
            ['id' => 51, 'name' => 'peaktime-create','parent_id' => 49],
            ['id' => 52, 'name' => 'peaktime-edit','parent_id' => 49],
            ['id' => 53, 'name' => 'peaktime-delete','parent_id' => 49],

            ['id' => 54, 'name' => 'nighttime-charge-management','parent_id' => 0],
            ['id' => 55, 'name' => 'nighttime-list','parent_id' => 54],
            ['id' => 56, 'name' => 'nighttime-create','parent_id' => 54],
            ['id' => 57, 'name' => 'nighttime-edit','parent_id' => 54],
            ['id' => 58, 'name' => 'nighttime-delete','parent_id' => 54],

            ['id' => 59, 'name' => 'cms-management','parent_id' => 0],
            ['id' => 60, 'name' => 'banner','parent_id' => 59],
            ['id' => 61, 'name' => 'charity','parent_id' => 59],
            ['id' => 62, 'name' => 'about','parent_id' => 59],
            ['id' => 63, 'name' => 'home','parent_id' => 59],
            ['id' => 64, 'name' => 'policy','parent_id' => 59],
            ['id' => 65, 'name' => 'social','parent_id' => 59],
            ['id' => 66, 'name' => 'terms','parent_id' => 59],
            
            ['id' => 67, 'name' => 'comment-management','parent_id' => 0],
            ['id' => 68, 'name' => 'comment-list','parent_id' => 67],
            ['id' => 69, 'name' => 'comment-create','parent_id' => 67],
            ['id' => 70, 'name' => 'comment-edit','parent_id' => 67],
            ['id' => 71, 'name' => 'comment-delete','parent_id' => 67],

            ['id' => 72, 'name' => 'coupon-management','parent_id' => 0],
            ['id' => 73, 'name' => 'coupon-list','parent_id' => 72],
            ['id' => 74, 'name' => 'coupon-create','parent_id' => 72],
            ['id' => 75, 'name' => 'coupon-edit','parent_id' => 72],
            ['id' => 76, 'name' => 'coupon-delete','parent_id' => 72],

            ['id' => 77, 'name' => 'airport-destination-management','parent_id' => 0],
            ['id' => 78, 'name' => 'destination-list','parent_id' => 77],
            ['id' => 79, 'name' => 'destination-create','parent_id' => 77],
            ['id' => 80, 'name' => 'destination-edit','parent_id' => 77],
            ['id' => 81, 'name' => 'destination-delete','parent_id' => 77],

            ['id' => 82, 'name' => 'document-management','parent_id' => 0],
            ['id' => 83, 'name' => 'document-list','parent_id' => 82],
            ['id' => 84, 'name' => 'document-create','parent_id' => 82],
            ['id' => 85, 'name' => 'document-edit','parent_id' => 82],
            ['id' => 86, 'name' => 'document-delete','parent_id' => 82],

            ['id' => 87, 'name' => 'document-state-relation-management','parent_id' => 0],
            ['id' => 88, 'name' => 'documentstate-list','parent_id' => 87],
            ['id' => 89, 'name' => 'documentstate-create','parent_id' => 87],
            ['id' => 90, 'name' => 'documentstate-edit','parent_id' => 87],
            ['id' => 91, 'name' => 'documentstate-delete','parent_id' => 87],

            ['id' => 92, 'name' => 'driver-management','parent_id' => 0],
            ['id' => 93, 'name' => 'driver-list','parent_id' => 92],
            ['id' => 94, 'name' => 'driver-create','parent_id' => 92],
            ['id' => 95, 'name' => 'driver-edit','parent_id' => 92],
            ['id' => 96, 'name' => 'driver-delete','parent_id' => 92],

            ['id' => 97, 'name' => 'email-template-management','parent_id' => 0],
            ['id' => 98, 'name' => 'signup','parent_id' => 97],
            ['id' => 99, 'name' => 'invoice','parent_id' => 97],

            ['id' => 100, 'name' => 'feedback-management','parent_id' => 0],
            ['id' => 101, 'name' => 'feedback-list','parent_id' => 100],
            ['id' => 102, 'name' => 'feedback-delete','parent_id' => 100],

            ['id' => 103, 'name' => 'vehicle-make-management','parent_id' => 0],
            ['id' => 104, 'name' => 'vehiclemake-list','parent_id' => 103],
            ['id' => 105, 'name' => 'vehiclemake-create','parent_id' => 103],
            ['id' => 106, 'name' => 'vehiclemake-edit','parent_id' => 103],
            ['id' => 107, 'name' => 'vehiclemake-delete','parent_id' => 103],

            ['id' => 108, 'name' => 'vehicle-model-management','parent_id' => 0],
            ['id' => 109, 'name' => 'vehiclemodel-list','parent_id' => 108],
            ['id' => 110, 'name' => 'vehiclemodel-create','parent_id' => 108],
            ['id' => 111, 'name' => 'vehiclemodel-edit','parent_id' => 108],
            ['id' => 112, 'name' => 'vehiclemodel-delete','parent_id' => 108],

            ['id' => 113, 'name' => 'vehicle-type-management','parent_id' => 0],
            ['id' => 114, 'name' => 'vehicletype-list','parent_id' => 113],
            ['id' => 115, 'name' => 'vehicletype-create','parent_id' => 113],
            ['id' => 116, 'name' => 'vehicletype-edit','parent_id' => 113],
            ['id' => 117, 'name' => 'vehicletype-delete','parent_id' => 113],

            ['id' => 118, 'name' => 'ride-type-management','parent_id' => 0],
            ['id' => 119, 'name' => 'ridetype-list','parent_id' => 118],
            ['id' => 120, 'name' => 'ridetype-create','parent_id' => 118],
            ['id' => 121, 'name' => 'ridetype-edit','parent_id' => 118],
            ['id' => 122, 'name' => 'ridetype-delete','parent_id' => 118],

            ['id' => 123, 'name' => 'notification-management','parent_id' => 0],
            ['id' => 124, 'name' => 'notification-list','parent_id' => 123],
            ['id' => 125, 'name' => 'notification-create','parent_id' => 123],

            ['id' => 126, 'name' => 'partner-management','parent_id' => 0],
            ['id' => 127, 'name' => 'partner-list','parent_id' => 126],
            ['id' => 128, 'name' => 'partner-create','parent_id' => 126],
            ['id' => 129, 'name' => 'partner-edit','parent_id' => 126],
            ['id' => 130, 'name' => 'partner-delete','parent_id' => 126],

            ['id' => 131, 'name' => 'rider-reward-point-management','parent_id' => 0],
            ['id' => 132, 'name' => 'riderreward-list','parent_id' => 131],
            ['id' => 133, 'name' => 'riderreward-create','parent_id' => 131],
            ['id' => 134, 'name' => 'riderreward-edit','parent_id' => 131],
            ['id' => 135, 'name' => 'riderreward-delete','parent_id' => 131],

            ['id' => 136, 'name' => 'driver-loyalty-point-management','parent_id' => 0],
            ['id' => 137, 'name' => 'driverloyalty-list','parent_id' => 136],
            ['id' => 138, 'name' => 'driverloyalty-create','parent_id' => 136],
            ['id' => 139, 'name' => 'driverloyalty-edit','parent_id' => 136],
            ['id' => 140, 'name' => 'driverloyalty-delete','parent_id' => 136],

            ['id' => 141, 'name' => 'queue-management','parent_id' => 0],
            ['id' => 142, 'name' => 'queue-list','parent_id' => 141],
            ['id' => 143, 'name' => 'queue-delete','parent_id' => 141],

            ['id' => 144, 'name' => 'driver-rating-management','parent_id' => 0],
            ['id' => 145, 'name' => 'driverrating-list','parent_id' => 144],
            ['id' => 146, 'name' => 'driverrating-approve','parent_id' => 144],

            ['id' => 147, 'name' => 'rider-rating-management','parent_id' => 0],
            ['id' => 148, 'name' => 'riderrating-list','parent_id' => 147],
            ['id' => 149, 'name' => 'riderrating-approve','parent_id' => 147],

            ['id' => 150, 'name' => 'country-management','parent_id' => 0],
            ['id' => 151, 'name' => 'country-list','parent_id' => 150],
            ['id' => 152, 'name' => 'country-create','parent_id' => 150],
            ['id' => 153, 'name' => 'country-edit','parent_id' => 150],
            ['id' => 154, 'name' => 'country-delete','parent_id' => 150],

            ['id' => 155, 'name' => 'state-management','parent_id' => 0],
            ['id' => 156, 'name' => 'state-list','parent_id' => 155],
            ['id' => 157, 'name' => 'state-create','parent_id' => 155],
            ['id' => 158, 'name' => 'state-edit','parent_id' => 155],
            ['id' => 159, 'name' => 'state-delete','parent_id' => 155],

            ['id' => 160, 'name' => 'city-management','parent_id' => 0],
            ['id' => 161, 'name' => 'city-list','parent_id' => 160],
            ['id' => 162, 'name' => 'city-create','parent_id' => 160],
            ['id' => 163, 'name' => 'city-edit','parent_id' => 160],
            ['id' => 164, 'name' => 'city-delete','parent_id' => 160],

            ['id' => 165, 'name' => 'ride-management','parent_id' => 0],
            ['id' => 166, 'name' => 'activeride-list','parent_id' => 165],
            ['id' => 167, 'name' => 'activeride-edit','parent_id' => 165],
            ['id' => 168, 'name' => 'completedride-list','parent_id' => 165],

            ['id' => 169, 'name' => 'rider-management','parent_id' => 0],
            ['id' => 170, 'name' => 'rider-list','parent_id' => 169],
            ['id' => 171, 'name' => 'rider-create','parent_id' => 169],
            ['id' => 172, 'name' => 'rider-edit','parent_id' => 169],
            ['id' => 173, 'name' => 'rider-delete','parent_id' => 169],

            ['id' => 174, 'name' => 'settings-management','parent_id' => 0],
            ['id' => 175, 'name' => 'settings','parent_id' => 174],

            ['id' => 176, 'name' => 'sos-contact-management','parent_id' => 0],
            ['id' => 177, 'name' => 'soscontact-list','parent_id' => 176],
            ['id' => 178, 'name' => 'soscontact-create','parent_id' => 176],
            ['id' => 179, 'name' => 'soscontact-edit','parent_id' => 176],
            ['id' => 180, 'name' => 'soscontact-delete','parent_id' => 176],

            ['id' => 181, 'name' => 'sos-request-management','parent_id' => 0],
            ['id' => 182, 'name' => 'sosrequest-list','parent_id' => 181],
            ['id' => 183, 'name' => 'sosrequest-delete','parent_id' => 181],

            ['id' => 184, 'name' => 'mapview-management','parent_id' => 0],
            ['id' => 185, 'name' => 'usermap','parent_id' => 184],
            ['id' => 186, 'name' => 'drivermap','parent_id' => 184],
            ['id' => 187, 'name' => 'driverairport','parent_id' => 184],
            ['id' => 188, 'name' => 'heatmap','parent_id' => 184],

            ['id' => 189, 'name' => 'super-admin-management','parent_id' => 0],
            ['id' => 190, 'name' => 'superadmin-list','parent_id' => 189],
            ['id' => 191, 'name' => 'superadmin-create','parent_id' => 189],
            ['id' => 192, 'name' => 'superadmin-edit','parent_id' => 189],
            ['id' => 193, 'name' => 'superadmin-delete','parent_id' => 189],

            ['id' => 194, 'name' => 'sub-admin-management','parent_id' => 0],
            ['id' => 195, 'name' => 'subadmin-list','parent_id' => 194],
            ['id' => 196, 'name' => 'subadmin-create','parent_id' => 194],
            ['id' => 197, 'name' => 'subadmin-edit','parent_id' => 194],
            ['id' => 198, 'name' => 'subadmin-delete','parent_id' => 194],

            ['id' => 199, 'name' => 'transaction-management','parent_id' => 0],
            ['id' => 200, 'name' => 'transaction-list','parent_id' => 199],

            ['id' => 201, 'name' => 'driver-note-delete','parent_id' => 0]
         ];
 
 
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission['name'], 'guard_name' => 'admin', 'parent_id' => $permission['parent_id']]);
         }
    }
}
