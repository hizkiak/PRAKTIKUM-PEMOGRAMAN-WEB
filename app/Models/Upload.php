<?php

namespace App\Models;

use Database\Factories\UploadFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Upload extends Model
{
    /** @use HasFactory<UploadFactory> */
    use HasFactory;

    protected $table = 'uploads'; // Nama tabel yang dihubungkan

    /**
     * Kolom yang boleh diisi secara massal (mass assignment).
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'judul',
        'keterangan',
        'filename',
        'filepath',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'user_id' => 'integer',
        ];
    }

    /**
     * Relasi: setiap berkas dimiliki oleh satu user.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}