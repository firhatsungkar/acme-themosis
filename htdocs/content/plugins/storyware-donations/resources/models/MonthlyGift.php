<?php
namespace Us\Storyware\Donations\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyGift extends Model {
  protected $table = 'monthly_gifts';
  protected $primaryKey = 'id';

  public function month()
  {
    $this->belongsTo(MembershipMonth::class, 'membership_month_id' );
  }
  
}