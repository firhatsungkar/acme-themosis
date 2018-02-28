<?php

namespace Us\Storyware\Donations\Controllers;

use Themosis\Route\BaseController;
use Themosis\Facades\View;
use Us\Storyware\Donations\Models\MembershipConstituent;


class AdminConstituentMatchingController extends BaseController {
  /**
   * @var MembershipConstituent
   */
  protected $membershipConstituent;

  /**
   * AdminConstituentMatchingController Constructor
   *
   * @param MembershipConstituent $membershipConstituent
   */
  public function __construct(MembershipConstituent $membershipConstituent)
  {
    $this->membershipConstituent = $membershipConstituent;
  }
  
  /**
   * List All Constituent Member
   *
   * @param array $params
   * @return View
   */
  public function index($params = [])
  {
    return View::make('sample');
  }
  
}