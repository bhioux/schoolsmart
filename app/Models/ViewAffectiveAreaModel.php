<?php namespace App\Models;

use CodeIgniter\Model;

class ViewAffectiveAreaModel extends Model
{
    protected $table = 'view_affectiveareas';
    protected $primaryKey = 'studentno';
    protected $allowedFields = [
        'studentid', 'surname', 'othernames', 'class', 'regno', 'session', 'term', 'affectiverecordid', 'punctuality', 'neatness', 'politeness', 'honesty', 'relationshipwithothers', 'leadership', 'emotionalstability', 'health', 'attitudetoschoolwork', 'attentiveness', 'persevearance', 'attendance', 'reliability', 'selfcontrol', 'cooperation', 'responsibility', 'innitiative', 'orgability', 'verbalfluency', 'games', 'sports', 'drawingpainting', 'musicalskills', 'handlingtools'
    ];
}