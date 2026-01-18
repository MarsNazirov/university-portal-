<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PDO;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'faculty_id',
        'score',
        'message',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function faculty(): BelongsTo
    {
        return $this->belongsTo(Faculty::class);
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when($filters['status'] ?? false, function ($q, $status) {
            $q->where('status', '=' , $status);
        });

        $query->when($filters['faculty_id'] ?? false, function ($q, $faculty) {
            $q->where('faculty_id', '=', $faculty);
        });

        $query->when($filters['search'] ?? false, function ($q, $search) {
            $q->whereHas('user', function ($userQuery) use ($search) {
                $userQuery->where('name', 'like', '%' . $search . '%');
            });
        });
    }
}
