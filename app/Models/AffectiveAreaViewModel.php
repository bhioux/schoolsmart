<?php namespace App\Models;

use CodeIgniter\Model;

class AffectiveAreaViewModel extends Model
{
    protected $table = 'view_studentaffectiveareas';
    protected $primaryKey = 'studentno';
    protected $allowedFields = [
        'studentid', 'regno', 'session', 'term', 'class', 'punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithstaffs', 'relationshipwithothers', 'leadership', 'emotionalstability', 'health', 'attitudetoschoolwork', 'attentiveness', 'persevearance', 'attendanceinclass', 'reliability', 'selfcontrol', 'cooperation', 'responsibility', 'initiative', 'organisationalability', 'fluency', 'games', 'sports', 'drawingandpainting', 'musicalskills', 'handlingoftools'
    ];
}