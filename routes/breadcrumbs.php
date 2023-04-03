<?php

use App\Models\Course;
use App\Models\Module;
use App\Models\Unit;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('courses.index', function ($trail) {
    $trail->push('Courses', route('courses.index'));
});

Breadcrumbs::for('courses.show', function ($trail, $id) {
    $course = Course::find($id);
    $trail->parent('courses.index');
    $trail->push($course->name, route('courses.show', $id));
    // dd($trail->parent('courses.index'), $trail->push($course->name, route('courses.show', $id)));
});

Breadcrumbs::for('modules.show', function ($trail, $id) {
    $module = Module::find($id);
    $trail->parent('courses.show', $module->course->id);
    $trail->push($module->name, route('modules.show', $id));
});

Breadcrumbs::for('units.show', function ($trail, $id) {
    $unit = Unit::find($id);
    $trail->parent('modules.show', $unit->module->id);
    $trail->push($unit->name, route('units.show', $id));
});

Breadcrumbs::for('units.edit', function ($trail, $id) {
    $unit = Unit::find($id);
    $trail->parent('modules.show', $unit->module->id);
    $trail->push($unit->name, route('units.edit', $id));
});
