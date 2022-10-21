<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notice extends Model
{
    use HasFactory;

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDriveLinkAttribute()
    {

        $gdriveurl = $this->url;

        $filter1 = preg_match('/drive\.google\.com\/open\?id\=(.*)/', $gdriveurl, $fileid1);
        $filter2 = preg_match('/drive\.google\.com\/file\/d\/(.*?)\//', $gdriveurl, $fileid2);
        $filter3 = preg_match('/drive\.google\.com\/uc\?id\=(.*?)\&/', $gdriveurl, $fileid3);
        if ($filter1) {
            $fileid = $fileid1[1];
        } else if ($filter2) {
            $fileid = $fileid2[1];
        } else if ($filter3) {
            $fileid = $fileid3[1];
        } else {
            $fileid = null;
        }

        return $fileid ? "https://drive.google.com/file/d/$fileid/preview" : $this->url;
    }


    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('jS F, Y');
    }


}