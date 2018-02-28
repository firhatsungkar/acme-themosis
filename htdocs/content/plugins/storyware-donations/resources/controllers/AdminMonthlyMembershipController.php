<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\View;
use Us\Storyware\Donations\Models\MembershipMonth;


class AdminMonthlyMembershipController extends BaseController {
  protected $membershipMonth;
  public function __construct(MembershipMonth $membershipMonth)
  {
    $this->membershipMonth = $membershipMonth;
  }

  public function index($params = [])
  {
    return View::make('sample');
  }
  
}