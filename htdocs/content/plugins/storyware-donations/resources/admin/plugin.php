<?php

use Themosis\Facades\Action;
use Themosis\Facades\Input;
use Themosis\Facades\Page;
use Us\Storyware\Donations\Models\Member;
use Us\Storyware\Donations\Controllers\AdminDonationsController;


/**
 * Write your plugin custom code below.
 */

// Get All Request Input
$request = Input::all();

// Initiate Model
$model = new Member();

// Initiate Controller
$controller = new AdminDonationsController( $model );

// Define The Page
$donation = Page::make(
              'storyware-donations',
              'All Donations',
              null,
              $controller->index($request)
            )
            ->set([
              'capability' => 'manage_options',
              'icon' => 'dashicons-archive',
              'position' => 20,
              'tabs' => true,
              'menu' => __("Donations")
            ]);

// Define Sub Menu of storyware-donations
$monthlyMembership = Page::make(
              'storyware-monthly-membership',
              'Monthly Membership',
              'storyware-donations',
              $controller->monthlyMembership($request)
            )
            ->set([
              'menu' => __("Monthly Membership")
            ]);

$constituentMatching = Page::make(
              'storyware-constituent-matching',
              'Constituent Matching',
              'storyware-donations',
              $controller->constituentMatching($request)
            )
            ->set([
              'menu' => __("Constituent Matching")
            ]);