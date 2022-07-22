<?php

namespace App\Models;

use App\RecordsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    use RecordsActivity;

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

    protected static array $recordableEvents = ['created', 'deleted'];

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
}
