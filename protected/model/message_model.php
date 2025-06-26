<?php
class message_model extends Model
{
    public $table_name = 'mannabook_message';
    
    public $rules = array
    (
        'name' => array
        (
            'is_required' => array(TRUE, '姓名称呼不能为空'),
            'max_length' => array(128, '姓名不能超过128个字符'),
        ),
        'email' => array
        (
            'is_email' => array(TRUE, '电子邮箱不符合格式要求'),
            'max_length' => array(60, '电子邮箱不能超过60个字符'),
        ),
        'subject' => array
        (
            'max_length' => array(60, 'Subject不能超过128个字符'),
        ),
        'message' => array
        (
            'is_required' => array(TRUE, 'Message不能为空'),
        )
    );
}