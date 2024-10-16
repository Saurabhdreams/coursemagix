<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    use HasFactory;

    protected $table = 'user_mail_templates';

    protected $fillable = ['user_id', 'mail_body', 'mail_subject', 'mail_type'];

    public $timestamps = false;


    public function user() {
        return $this->belongsTo(User::class);
    }
}
