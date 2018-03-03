<?php

use Themosis\Facades\Action;
use Themosis\Facades\Input;
use Themosis\Facades\Page;
use Us\Storyware\Donations\Models\Member;
use Us\Storyware\Donations\Models\MembershipMonth;
use Us\Storyware\Donations\Models\MembershipConstituent;
use Us\Storyware\Donations\Controllers\AdminController;
use Us\Storyware\Donations\Controllers\AdminDonationsController;
use Us\Storyware\Donations\Controllers\AdminMonthlyMembershipController;
use Us\Storyware\Donations\Controllers\AdminConstituentMatchingController;


/**
 * Write your plugin custom code below.
 */

/** Get All Request Input */
$request = Input::all();

/** Initiate Model */
$model = [
  'member' => new Member(),
  'membershipMonth' => new MembershipMonth(),
  'membershipConstituent' => new MembershipConstituent(),
];

/** Initiate BaseController */
$baseController = new AdminController($request);

/** Initiate Controller */
$controller = [
  'donations'         => new AdminDonationsController( $model['member'] ),
  'monthlyMembership' => new AdminMonthlyMembershipController( $model['membershipMonth'] ),
  'constituentMatching' => new AdminConstituentMatchingController( $model['membershipConstituent'] ),
];

/** Define The Page */
$donation = Page::make(               /** Page Settings */
  'storyware-donations',                // Page slug
  'All Donations',                      // Page Title
  null,                                 // Parent Page (null = root)
  $controller['donations']->index()     // Controller of page
)->set([                              /** Menu Settings */
  'capability' => 'manage_options',     // User capabilty
  'icon' => 'dashicons-archive',        // Menu Icon
  'position' => 20,                     // Menu Position
  'tabs' => true,                       // Support tabs
  'menu' => __("Donations")             // Menu Title
]);

/** Define Sub Menu of storyware-donations */
$monthlyMembership = Page::make(
  'storyware-monthly-membership',
  'Monthly Membership',
  'storyware-donations',
  $controller['monthlyMembership']->index()
)->set([
  'menu' => __("Monthly Membership")
]);

$constituentMatching = Page::make(
  'storyware-constituent-matching',
  'Constituent Matching',
  'storyware-donations',
  $controller['constituentMatching']->index()
)->set([
  'menu' => __("Constituent Matching")
]);