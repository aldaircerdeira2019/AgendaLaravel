<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContatoModel extends Model
{
    protected $table    = 'contatos';
    protected $fillable = ['user_id','nome','telefone','email', 'data_nas', 'descrição','avatar'];

    public function getAvatarImageAttribute($value) {
        return $this->avatar == null ? asset('imagens/default.png') : asset($this->avatar);
    }
    public function getAvatarFilenameAttribute($value) {
        return substr($this->avatar, 30, strlen($this->avatar));
    }
    public function getDataNasAttribute($value) {
        return dateFormatDatabaseScreen($value, 'screen');
    }

    // Mutator
    public function setDataNasAttribute($value) {
        $this->attributes['data_nas'] = dateFormatDatabaseScreen($value);
    }
    public function setAvatarAttribute($value) {
        $filename = substr(md5(rand(100000, 999999)),0,5) .'_'. $value->getClientOriginalName();
        $filepath = 'public/uploads/'.date('Y').'/'.date('m').'/';
        if ($value->isValid()) {
            $path = $value->storeAs($filepath, $filename);
        }
        $this->attributes['avatar'] = str_replace('public', 'storage', $filepath) . $filename;
    }
}
