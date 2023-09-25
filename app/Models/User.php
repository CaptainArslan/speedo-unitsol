<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, Billable, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'contact_number',
        'mobile_number',
        'salary',
        'dob',
        'country_code',
        'passport_number',
        'gender',
        'nationality_id',
        'designation_id',
        'contract_start_date',
        'contract_end_date',
        'address',
        'status',
        'kids',
        'activity_log',
        'emirate_id',
        'area_id',
        'relation',
        'street_name',
        'building_name',
        'villa_no',
        'nearest_landmark',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function CustomerOrderBalance()
    {
        return $this->hasOne(CustomerOrderBalance::class);
    }

    public function getStatus()
    {
        return $this->status == 'Active' ? "<span class='badge badge-success ml-2 text-white'>Active</span>"
            : "<span class='badge badge-warning ml-2 text-white'>de Active</span>";
    }
    public function getType()
    {
        $designation = $this->designation ? $this->designation->name : '';
        return "<span class='badge badge-warning ml-2 text-white'>$designation</span>";
    }
    public function getEmarateId()
    {
        return "<span class='badge badge-primary ml-2 text-white'>92348923-8238746</span>";
    }

    public function getName()
    {
        $designation = $this->designation ? $this->designation->name : '';
        $first = substr($this->first_name, 0, 1);
        $last = substr($this->last_name, 0, 1);
        return " <div class='user-card'>
                    <div class='user-avatar bg-primary-dim d-none d-sm-flex'>
                        <span>$first$last</span>
                         </div>
                      <div class='user-info'>
                      <span class='tb-lead'>$this->first_name $this->last_name <span
                       class='dot dot-success d-md-none ml-1'></span>$designation</span>
                   </div>
                  </div>";
    }
    public function getEmployeeName()
    {
        $designation = $this->designation ? $this->designation->name : '';
        $first = substr($this->first_name, 0, 1);
        $last = substr($this->last_name, 0, 1);
        return " <div class='user-card'>
                    <div class='user-avatar bg-dim-primary d-none d-sm-flex'>
                        <span>$first$last</span>
                         </div>
                      <div class='user-info'>
                      <span class='tb-lead'>$this->first_name $this->last_name <span
                       class='dot dot-success d-md-none ml-1'></span></span>
                       <span class='badge badge-warning ml-2 text-white'>$designation</span>
                   </div>
                  </div>";
    }
    /*
     * Scope a query get user who have roles.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $search
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStoreName($query, $search)
    {
        if (isset($search)) {
            $query->whereHas('vendorDetail', function ($q) use ($search) {
                $q->orWhere('store_name', 'Like', '%' . $search . '%');
            });
        }

        return $query;
    }

    /**
     * Scope a query get user who have roles.
     *
     * @param Builder $query
     * @param string $role
     * @return Builder
     */
    public function scopeWhereRole(Builder $query, string $role): Builder
    {
        $query->whereHas(
            'roles',
            function ($q) use ($role) {
                return $q->where('name', $role);
            }
        );

        return $query;
    }

    // /**
    //  * Check if user has role.
    //  *
    //  * @param $role
    //  * @return bool
    //  */
    // public function hasRole($role): bool
    // {
    //     return (bool) $this->roles()->where('name', $role)->first();
    // }
    public function userDoc()
    {
        return $this->hasOne(UserReqDoc::class, 'user_id');
    }

    public function employeeSchedules()
    {
        return $this->hasMany(EmployeeSchedule::class, 'employee_id', 'id');
    }
    public function userPaymentInformations()
    {
        return $this->hasMany(UserPaymentInformation::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class, 'user_id', 'id');
    }
    public function getKid()
    {
        $total = count($this->students);
        return "<span class='badge badge-primary ml-2 text-white'>$total kid(s)</span>";
    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}
