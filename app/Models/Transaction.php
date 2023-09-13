<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction'; // Sesuaikan dengan nama tabel Anda
    protected $fillable = ['document_code', 'document_number', 'user', 'total', 'date'];
}
