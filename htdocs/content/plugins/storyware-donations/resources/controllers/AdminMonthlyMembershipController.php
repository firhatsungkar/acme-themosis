<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\View;
use Us\Storyware\Donations\Models\MembershipMonth;


class AdminMonthlyMembershipController extends BaseController {
  /**
   * @var MembershipMonth
   */
  protected $membershipMonth;
  
  /**
   * AdminMonthlyMembershipController Constructor
   *
   * @param MembershipMonth $membershipMonth
   */
  public function __construct(MembershipMonth $membershipMonth)
  {
    $this->membershipMonth = $membershipMonth;
  }

  /**
   * List All Monthly Member
   *
   * @param array $params
   * @return View
   */
  public function index($params = [])
  {
    return View::make('sample');
  }
  
}