<?php
class subscription_model extends Model
{
    public $table_name = 'mannabook_subscription';
    
    public $rules = array
    (
        'email' => array
        (
            'is_email' => array(TRUE, '电子邮箱不符合格式要求'),
            'max_length' => array(60, '电子邮箱不能超过60个字符'),
        ),
        
    );
}