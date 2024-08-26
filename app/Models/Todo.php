<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Todo extends Model
{
    use HasFactory, Sortable;
    protected $fillable = ['task_name', 'status', 'date', 'priority'];
    protected $sortable = ['id', 'status', 'date', 'priority'];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function getPriorityAttribute() {
        switch ($this->attributes['priority']) {
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
