<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $guarded = [];

    /**
     * @var string[]
     */
    protected $touches = ['project'];

    protected $casts = [
        'completed' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
    }

    public function complete()
    {
        $this->update(['completed' => true]);

        $this->recordActivity('completed_task');
    }

    public function incomplete()
    {
        $this->update(['completed' => false]);

        $this->recordActivity('incompleted_task');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Returns the path to the current task
     *
     * @return string
     */
    public function path()
    {
        return '/projects/'.$this->project->id.'/tasks/'.$this->id;
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * Record activity for a project
     *
     * @param $description
     * @return void
     */
    public function recordActivity($description)
    {
        $this->activity()->create([
            'project_id' => $this->project_id,
            'description' => $description,
        ]);
    }
}
