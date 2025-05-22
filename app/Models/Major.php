<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tbl_major';
    protected $primaryKey='major_id';
    protected $fillable = [
        'major_name_en', 'major_name_ar', 'major_abbreviation', 'credits_required',
        'major_ministry_code', 'major_mode','degree_type', 'faculty_id',
        'number_of_semesters', 'program_duration', 'status'
    ];

    public function batchControls()
{
    return $this->hasMany(BatchControl::class, 'major_id');
}

    public function faculty()
    {
        return $this->belongsTo(Faculty::class, 'faculty_id');
    }
     /**
     * Create a new major
     *
     * @param array $data
     * @return Major
     */
    public static function createMajor(array $data)
    {
          return self::create($data);

        // Check if the query was successful

        // Uncomment the following line if you want to return the created major instance

        // return self::create([
        //     'major_name_en' => $data['major_name_en'],
        //     'major_name_ar' => $data['major_name_ar'],
        //     'major_abbreviation' => $data['major_abbreviation'],
        //     'credits_required' => $data['credits_required'],
        //     'major_ministry_code' => $data['major_ministry_code'],
        //     'major_mode' => $data['major_mode'],
        //     'degree_type' => $data['degree_type'],
        //     'faculty_id' => $data['faculty_id'],
        //     'number_of_semesters' => $data['number_of_semesters'],
        //     'program_duration' => $data['program_duration'],
        //     'status' => $data['status']
        // ]);
    }

    /**
     * Find a major by its ID
     *
     * @param int $majorId
     * @return Major
     */
    public static function findMajorById($majorId)
    {
        return self::findOrFail($majorId);
    }

    /**
     * Update the major details
     *
     * @param array $data
     * @return bool
     */
    public function updateMajor(array $data)
    {
        return $this->update($data);
    }

    /**
     * Delete the major
     *
     * @return bool|null
     */
    public function deleteMajor()
    {
        return $this->delete();
    }

    /**
     * Get all majors
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getAllMajors()
    {
        return self::all();
    }

    /**
     * Get majors by faculty ID
     *
     * @param int $facultyId
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function getMajorsByFaculty($facultyId)
    {
        return self::where('faculty_id', $facultyId)->get();
    }

    /**
     * Scope to filter majors by status
     *
     * @param $query
     * @param $status
     * @return mixed
     */
    public function scopeFilterByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope to filter majors by degree type
     *
     * @param $query
     * @param $degreeType
     * @return mixed
     */
    public function scopeFilterByDegreeType($query, $degreeType)
    {
        return $query->where('degree_type', $degreeType);
    }
}
