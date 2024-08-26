<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['task_name', 'status', 'date'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function getPriorityAttribute() {
        switch ($this->priority) {
            case 1:
                return 'Low';
            case 2:
                return 'Medium';
            case 3:
                return 'High';
            default:
                return 'Unknown';
        }
    }
}
