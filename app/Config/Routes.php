<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Admin\Auth::login');

// Public routes
$routes->group('admin', function($routes) {
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('login', 'Admin\Auth::attemptLogin');
});

   // Protected routes
    $routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard/(:segment)', 'Admin\Dashboard::index/$1');
    $routes->get('spreadsheets/(:segment)', 'Admin\Dashboard::hr/$1');
    $routes->get('dashboard/calendar/(:segment)', 'Admin\Dashboard::calendar/$1');
    $routes->get('logout', 'Admin\Auth::logout');

  // Candidate routes
  $routes->get('candidates/(:segment)', 'Admin\Candidates\Candidates::listAllCandidates/$1');
  $routes->get('candidates/view/(:num)/(:segment)', 'Admin\Candidates\Candidates::listAllCandidates/$1');
  $routes->post('candidates/view/delete/(:num)', 'Admin\Candidates\Candidates::listCandidate_delete/$1');
  $routes->post('catalog/category_form/(:segment)', 'Admin\Category\Category::listCategory_save/$1');
  $routes->post('candidates/view/status_update/(:num)', 'Admin\Candidates\Candidates::listCandidate_status/$1');
  $routes->get('candidates/view/getbyid/(:num)', 'Admin\Candidates\Candidates::listCandidate_getByid/$1');
  $routes->get('candidates/view_app/getbyid/(:num)', 'Admin\Candidates\Candidates::listCandidate_app_getByid/$1');
  
  // Category routes
  $routes->get('category/(:segment)', 'Admin\Category\Category::listAllCategory/$1');
  $routes->get('category/category_form/(:segment)', 'Admin\Category\Category::listAllCategory_Form/$1');
  $routes->get('catalog/category_list/(:segment)', 'Admin\Category\Category::listAllCategory_list/$1');
  $routes->get('category/unit_product_list/(:segment)', 'Admin\Category\Category::listAllunit_product_list/$1');
  $routes->get('category/unit_product_form/(:segment)', 'Admin\Category\Category::listAllunit_product_form/$1');
  $routes->post('candidates/view/delete/(:num)', 'Admin\Candidates\Candidates::listCandidate_delete/$1');
  $routes->post('candidates/view/save', 'Admin\Candidates\Candidates::listCandidate_save');
  $routes->post('candidates/view/status_update/(:num)', 'Admin\Candidates\Candidates::listCandidate_status/$1');
  $routes->get('candidates/view/getbyid/(:num)', 'Admin\Candidates\Candidates::listCandidate_getByid/$1');
  $routes->get('candidates/view_app/getbyid/(:num)', 'Admin\Candidates\Candidates::listCandidate_app_getByid/$1');

  // Role routes
  
  $routes->get('roles/(:segment)', 'Admin\Role\Role::listAllRoles/$1');
  $routes->get('role/role_form/(:segment)', 'Admin\Role\Role::listAllRole_Form/$1');
  $routes->get('role/role_form_value/(:num)', 'Admin\Role\Role::listAllRole_Form_value/$1');
  $routes->get('role/role_delete/(:num)', 'Admin\Role\Role::listRole_delete/$1');
  $routes->post('role/role_form/(:segment)', 'Admin\Role\Role::listRole_save/$1');


// hr routes
$routes->get('hr_policies/(:segment)', 'Admin\Hr\Hr::listAllHr_policies/$1');
$routes->get('hr_policies/hr_form/(:segment)', 'Admin\Hr\Hr::listAllHr_form/$1');
  $routes->get('hr_policies/view/(:num)/(:segment)', 'Admin\Hr\Hr::listAllHr_policie/$1');
  $routes->post('hr_policies/view/delete/(:num)', 'Admin\Hr\Hr::listHr_delete/$1');
  $routes->post('hr_policies/hr_form/(:segment)', 'Admin\Hr\Hr::listHr_save/$1');
  $routes->post('hr_policies/status_update/(:num)', 'Admin\Hr\Hr::listHr_status/$1');
  $routes->get('hr_policies/view/getbyid/(:num)', 'Admin\Hr\Hr::listHr_getByid/$1');

 
   // Hotels routes
   $routes->get('hotels/(:segment)', 'Admin\Hotels\Hotels::listAllCandidates/$1');
   $routes->get('hotels/view/(:num)/(:segment)', 'Admin\Hotels\Hotels::listAllCandidates/$1');
   $routes->post('hotels/view/delete/(:num)', 'Admin\Hotels\Hotels::listCandidate_delete/$1');
   $routes->post('hotels/view/save', 'Admin\Hotels\Hotels::listCandidate_save');
   $routes->post('hotels/view/status_update/(:num)', 'Admin\Hotels\Hotels::listCandidate_status/$1');
   $routes->get('hotels/view/getbyid/(:num)', 'Admin\Hotels\Hotels::listCandidate_getByid/$1');
   $routes->get('hotels/view_app/getbyid/(:num)', 'Admin\Hotels\Hotels::listCandidate_app_getByid/$1');

// Agents routes
$routes->get('agents/(:segment)', 'Admin\Agents\Agents::listAllCandidates/$1');
   $routes->get('agents/view/(:num)/(:segment)', 'Admin\Agents\Agents::listAllCandidates/$1');
   $routes->post('agents/view/delete/(:num)', 'Admin\Agents\Agents::listCandidate_delete/$1');
   $routes->post('agents/view/save', 'Admin\Agents\Agents::listCandidate_save');
   $routes->post('agents/view/status_update/(:num)', 'Admin\Agents\Agents::listCandidate_status/$1');
   $routes->get('agents/view/getbyid/(:num)', 'Admin\Agents\Agents::listCandidate_getByid/$1');
   $routes->get('agents/view_app/getbyid/(:num)', 'Admin\Agents\Agents::listCandidate_app_getByid/$1');

// Reports routes
$routes->get('reports/(:segment)', 'Admin\Reports\Reports::listAllReports/$1');



  // Settings routes
   $routes->get('settings/(:segment)', 'Admin\Settings::index/$1');
   $routes->get('settings/listAdmins/(:segment)', 'Admin\Settings::listAdmins/$1');
   $routes->post('settings/storeAdmin', 'Admin\Settings::storeAdmin');
   $routes->get('settings/editAdmin/(:num)', 'Admin\Settings::editAdmin/$1');
   $routes->post('settings/updateAdmin/(:num)', 'Admin\Settings::updateAdmin/$1');
   $routes->post('settings/deleteAdmin/(:num)', 'Admin\Settings::deleteAdmin/$1');
    
   // API Users routes
   $routes->get('settings/listApiUsers/(:segment)', 'Admin\Settings::listApiUsers/$1');
   $routes->post('settings/storeApiUser', 'Admin\Settings::storeApiUser');
   $routes->get('settings/editApiUser/(:num)', 'Admin\Settings::editApiUser/$1');
   $routes->post('settings/updateApiUser/(:num)', 'Admin\Settings::updateApiUser/$1');
   $routes->post('settings/deleteApiUser/(:num)', 'Admin\Settings::deleteApiUser/$1');

   // Additional settings routes
   $routes->get('settings/listDataMaster/(:segment)', 'Admin\Settings::listDataMaster/$1');

   // Cities routes
   $routes->get('settings/listAllCities/(:segment)', 'Admin\Settings::listAllCities/$1');
   $routes->post('settings/storeCity', 'Admin\Settings::storeCity');
   $routes->get('settings/editCity/(:num)', 'Admin\Settings::editCity/$1');
   $routes->post('settings/updateCity/(:num)', 'Admin\Settings::updateCity/$1');
   $routes->post('settings/deleteCity/(:num)', 'Admin\Settings::deleteCity/$1');

   // Rewords routes
   $routes->get('settings/listAllRewords/(:segment)', 'Admin\Settings::listAllRewords/$1');
   $routes->post('settings/storeRewords', 'Admin\Settings::storeRewords');
   $routes->get('settings/editRewords/(:num)', 'Admin\Settings::editRewords/$1');
   $routes->post('settings/updateRewords/(:num)', 'Admin\Settings::updateRewords/$1');
   $routes->post('settings/deleteRewords/(:num)', 'Admin\Settings::deleteRewords/$1');

   // States routes
   $routes->get('settings/listAllStates/(:segment)', 'Admin\Settings::listAllStates/$1');
   $routes->post('settings/storeState', 'Admin\Settings::storeState');
   $routes->get('settings/editState/(:num)', 'Admin\Settings::editState/$1');
   $routes->post('settings/updateState/(:num)', 'Admin\Settings::updateState/$1');
   $routes->post('settings/deleteState/(:num)', 'Admin\Settings::deleteState/$1');

   // Pincodes routes
   $routes->get('settings/listAllPincodes/(:segment)', 'Admin\Settings::listAllPincodes/$1');
   $routes->post('settings/storePincode', 'Admin\Settings::storePincode');
   $routes->get('settings/editPincode/(:num)', 'Admin\Settings::editPincode/$1');
   $routes->post('settings/updatePincode/(:num)', 'Admin\Settings::updatePincode/$1');
   $routes->post('settings/deletePincode/(:num)', 'Admin\Settings::deletePincode/$1');

// Departments routes
$routes->get('settings/listAllDepartments/(:segment)', 'Admin\Masters\Departments::listAllDepartments/$1');
$routes->post('settings/storeDepartment', 'Admin\Masters\Departments::storeDepartment');
$routes->get('settings/editDepartment/(:num)', 'Admin\Masters\Departments::editDepartment/$1');
$routes->post('settings/updateDepartment/(:num)', 'Admin\Masters\Departments::updateDepartment/$1');
$routes->post('settings/deleteDepartment/(:num)', 'Admin\Masters\Departments::deleteDepartment/$1');

// Sub-departments routes
$routes->get('settings/listAllSubDepartments/(:segment)', 'Admin\Masters\Subdepartments::listAllSubDepartments/$1');
$routes->post('settings/storeSubdepartments', 'Admin\Masters\Subdepartments::storeSubDepartment');
$routes->get('settings/editSubdepartments/(:num)', 'Admin\Masters\Subdepartments::editSubDepartment/$1');
$routes->post('settings/updateSubdepartments/(:num)', 'Admin\Masters\Subdepartments::updateSubDepartment/$1');
$routes->post('settings/deleteSubdepartments/(:num)', 'Admin\Masters\Subdepartments::deleteSubDepartment/$1');

// Degrees routes
$routes->get('settings/listAllDegrees/(:segment)', 'Admin\Settings::listAllDegrees/$1');
$routes->post('settings/storeDegree', 'Admin\Settings::storeDegree');
$routes->get('settings/editDegree/(:num)', 'Admin\Settings::editDegree/$1');
$routes->post('settings/updateDegree/(:num)', 'Admin\Settings::updateDegree/$1');
$routes->post('settings/deleteDegree/(:num)', 'Admin\Settings::deleteDegree/$1');

// Colleges routes
$routes->get('settings/listAllColleges/(:segment)', 'Admin\Settings::listAllColleges/$1');
$routes->post('settings/storeCollege', 'Admin\Settings::storeCollege');
$routes->get('settings/editCollege/(:num)', 'Admin\Settings::editCollege/$1');
$routes->post('settings/updateCollege/(:num)', 'Admin\Settings::updateCollege/$1');
$routes->post('settings/deleteCollege/(:num)', 'Admin\Settings::deleteCollege/$1');

// Schools routes
$routes->get('settings/listAllSchools/(:segment)', 'Admin\Settings::listAllSchools/$1');
$routes->post('settings/storeSchool', 'Admin\Settings::storeSchool');
$routes->get('settings/editSchool/(:num)', 'Admin\Settings::editSchool/$1');
$routes->post('settings/updateSchool/(:num)', 'Admin\Settings::updateSchool/$1');
$routes->post('settings/deleteSchool/(:num)', 'Admin\Settings::deleteSchool/$1');

});
