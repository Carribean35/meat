<?php

/**
 * This is the model class for table "web_zakaz".
 *
 * The followings are the available columns in table 'web_zakaz':
 * @property integer $id
 * @property integer $id_client
 * @property datetime $dat_tim
 * @property integer $id_user
 * @property integer $status
 */
class NewOrder extends EActiveRecord
{
	
	// отдаём соединение, описанное в компоненте db_vsht
    public function getDbConnection(){
        return Yii::app()->db_vsht;
    }
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'volga_google.web_zakaz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
//			array('nik', 'required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
//			array('id, name, name2, createDate, text, visible', 'safe', 'on'=>'search'),
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
			'client'=>array(self::BELONGS_TO, 'Clients', 'id_client'),
			'worker'=>array(self::BELONGS_TO, 'Worker', 'id_user'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('main', 'ID'),
			'nik' => Yii::t('main', 'Nic'),
			'tel' => Yii::t('main', 'Phone'),
			'email' => Yii::t('main', 'Email'),
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

		$worker = "";
		$client = "";
		if (!empty($_GET['NewOrder'])) {
			if (!empty($_GET['NewOrder']['status']))
				$this->status = $_GET['NewOrder']['status'];
			if (!empty($_GET['NewOrder']['worker']))
				$worker = $_GET['NewOrder']['worker'];
			if (!empty($_GET['NewOrder']['client']))
				$client = $_GET['NewOrder']['client'];
			if (!empty($_GET['NewOrder']['dat_tim']))
				$this->dat_tim = $_GET['NewOrder']['dat_tim'];
		}
		
		$criteria->order = "dat_tim DESC";
		
		$criteria->compare('id',$this->id);
		$criteria->compare('id_client',$this->id_client,true);
		$criteria->compare('dat_tim',$this->dat_tim,true);
		$criteria->compare('id_user',$this->id_user,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('worker.fio',$worker,true);
		$criteria->compare('client.nik',$client,true);
		$criteria->with = array('client' => array(), 'worker' => array());

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getOrderAmount() {
		$connection = Yii::app()->db_vsht;
		$command = $connection->createCommand('SELECT SUM( cen ) amount FROM  `web_zakaz_tabl` WHERE  `id_zakaza` = :id_zakaza');
		$command->params = array(':id_zakaza' => $this->id);
		$row = $command->queryRow();
		return $row['amount'];
	}
}
