<?php
namespace app\models;

use yii\db\ActiveRecord;

class Application extends ActiveRecord
{
	public static function tableName()
    {
        return 'application';
    }
    
    public function rules()
    {
		/**
		 * not sure I've understood this properly
		 * docs show:
		 * 	['id', 'integer']
		 * 	['first_name'], 'string'
		 * 	which seems like 2 different formats
		 */
        return [
            [['id', 'integer'], 'required'],
            [['first_name'], 'string', 'required', 'max' => 255],
            [['last_name'], 'string', 'required', 'max' => 255],
            [['date_of_birth'], 'date', 'required'],
            [['description'], 'string'],
            [['income'], 'int'],
            [['number_of_dependants'], 'int'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'Application ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'date_of_birth' => 'Date of Birth',//or DOB, consistent UI/UX will set a common rule for this feild across all files, code, applications, and company communications
            'description' => 'Description',
            'income' => 'Income',
            'number_of_dependants' => 'Number of Dependants',//or just dependants, again consistent UI/UX is important here
            'created_at' => 'Created At',//or Date Created?
            'updated_at' => 'Updated At',//or Date Updated?
        ];
    }

}
