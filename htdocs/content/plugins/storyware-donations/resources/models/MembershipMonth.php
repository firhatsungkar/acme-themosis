<?php
namespace Us\Storyware\Donations\Models;

use Illuminate\Database\Eloquent\Model;
class MembershipMonth extends Model {
  protected $table = 'membership_months';
  protected $primaryKey = 'id';

  public function gifts()
  {
    return $this->hasMany(MonthlyGift::class, 'membership_month_id', 'id');
  }

  public function getExpectedGiftsAttribute()
  {
    return $this->calculateExpectedGifts($this->id);
  }

  public function getReceivedGiftsAttribute()
  {
    return $this->calculateReceivedGifts($this->id);
  }

  private function calculateExpectedGifts($id)
  {
    return $this->with('gifts')
                ->where('id', $id)
                ->first()
                ->gifts
                ->map(function($params, $index) {
                  return $params->expected_amount;
                })
                ->reduce(function($carry, $amount){
                  return $carry + $amount;
                }, 0);
  }

  private function calculateReceivedGifts($id)
  {
    return $this->with('gifts')
                ->where('id', $id)
                ->first()
                ->gifts
                ->map(function($params, $index) {
                  return $params->received_amount;
                })
                ->reduce(function($carry, $amount){
                  return $carry + $amount;
                }, 0);
  }
  
}