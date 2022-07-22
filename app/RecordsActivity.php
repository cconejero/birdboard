<?php

namespace App;

use App\Models\Activity;
use App\Models\Project;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait RecordsActivity
{
    public array $oldAttributes = [];

    /**
     * Boot the trait
     *
     * @return void
     */
    public static function bootRecordsActivity()
    {
        foreach (self::recordableEvents() as $event) {
            static::$event(function ($model) use ($event) {
                $model->recordActivity($model->activityDescription($event));
            });

            if ($event === 'updated') {
                static::updating(function ($model) {
                    $model->oldAttributes = $model->getOriginal();
                });
            }
        }
    }

    public function activityDescription($description)
    {
        return $description.'_'.Str::lower(class_basename($this));
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
            'user_id' => ($this->project ?? $this)->owner->id,
            'description' => $description,
            'changes' => $this->activityChanges(),
            'project_id' => class_basename($this) === 'Project' ? $this->id : $this->project_id,
        ]);
    }

    /**
     * @return array
     */
    public function activityChanges()
    {
        if ($this->wasChanged()) {
            return [
                'before' => Arr::except(array_diff($this->oldAttributes, $this->getAttributes()), 'updated_at'),
                'after' => Arr::except($this->getChanges(), 'updated_at'),
            ];
        } else {
            return null;
        }
    }

    public function activity()
    {
        return $this->morphMany(Activity::class, 'subject')->latest();
    }

    /**
     * @return string[]
     */
    public static function recordableEvents()
    {
        return static::$recordableEvents ?? ['created', 'updated', 'deleted'];
    }
}
