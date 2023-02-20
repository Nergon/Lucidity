<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'lucidity'
    ];

    public function labels() {
        return $this->belongsToMany(Label::class);
    }

    public function getDecryptedContent() {
        try {
            return Crypt::decrypt($this->content);
        } catch (DecryptException $e) {
            return $this->content;
        }
    }

    public function getDecryptedTitle() {
        try {
            return Crypt::decrypt($this->title);
        } catch (DecryptException $e) {
            return $this->title;
        }
    }


}
