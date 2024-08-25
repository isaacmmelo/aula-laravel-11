<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes; # Adicionamos o SoftDeletes para que o laravel utilize a exclusão lógica automaticamente

    # Definimos as colunas que serão preenchidas automaticamente pelo Laravel durante o cadastro
    protected $fillable = ['título', 'texto', 'autor'];


}
