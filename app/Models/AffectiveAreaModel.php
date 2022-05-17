<?php namespace App\Models;

use CodeIgniter\Model;

class AffectiveAreaModel extends Model
{
    protected $table = 'setup_affectivearea';
    protected $primaryKey = 'regno';
    protected $allowedFields = [
        'studentid', 'regno', 'session', 'term', 'class', 'punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithstaffs', 'relationshipwithothers', 'leadership', 'emotionalstability', 'health', 'attitudetoschoolwork', 'attentiveness', 'persevearance', 'attendanceinclass', 'reliability', 'selfcontrol', 'cooperation', 'responsibility', 'initiative', 'organisationalability', 'fluency', 'games', 'sports', 'drawingandpainting', 'musicalskills', 'handlingoftools'
    ];
}