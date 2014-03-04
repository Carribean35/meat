<?php

/**
 * This is the model class for table "worker".
 *
 * The followings are the available columns in table 'worker':
 * @property integer $id
 * @property string $fio
 * @property string $pasport
 * @property string $phone
 * @property integer $idPlace
 * @property integer $idMarket
 * @property string $login
 * @property string $password
 */
class Worker extends EActiveRecord
{
	
	public $confirmPassword;
	private $place = array(1 => 'Склад', 2 => 'Торговый зал');
	
	public function getPlace() {
		return $this->place;
	}
	
	public function getSoult($password)
	{
		return md5($password.md5($password));
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'worker';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fio, pasport, phone, idPlace, idMarket, login', 'required'),
			array('idPlace, idMarket', 'numerical', 'integerOnly'=>true),
			array('fio, pasport', 'length', 'max'=>255),
			array('phone, password', 'length', 'max'=>32),
			array('login', 'length', 'max'=>64),
			array('login', 'unique', 'className' => 'Worker', 'attributeName' => 'login', 'caseSensitive' => true),
			array('confirmPassword', 'compare', 'compareAttribute'=>'password', 'message' => Yii::t('main','Confirm Password Validate Error'),),
			array('password', 'compare', 'compareAttribute'=>'confirmPassword', 'message' => Yii::t('main','Confirm Password Validate Error'),),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fio, pasport, phone, idPlace, idMarket, login, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fio' => 'Fio',
			'pasport' => 'Pasport',
			'phone' => 'Phone',
			'idPlace' => 'Id Place',
			'idMarket' => 'Id Market',
			'login' => 'Login',
			'password' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('pasport',$this->pasport,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('idPlace',$this->idPlace);
		$criteria->compare('idMarket',$this->idMarket);
		$criteria->compare('login',$this->login,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Worker the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
