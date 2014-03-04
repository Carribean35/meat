<?php

/**
 * This is the model class for table "importGoods".
 *
 * The followings are the available columns in table 'importGoods':
 * @property integer $id
 * @property integer $idMarket
 * @property integer $idProduct
 * @property string $importer
 * @property double $weight
 * @property double $price
 * @property string $date
 */
class ImportGoods extends EActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'importGoods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idMarket, idProduct, importer, weight, price', 'required'),
			array('idMarket, idProduct', 'numerical', 'integerOnly'=>true),
			array('weight, price', 'numerical'),
			array('importer', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, idMarket, idProduct, importer, weight, price, date', 'safe', 'on'=>'search'),
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
			'product'=>array(self::BELONGS_TO, 'Product', 'idProduct'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'idMarket' => 'Id Market',
			'idProduct' => 'Id Product',
			'importer' => 'Поставщик',
			'weight' => 'Вес',
			'price' => 'Цена за 1 кг',
			'date' => 'Date',
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
		$criteria->compare('idMarket',$this->idMarket);
		$criteria->compare('idProduct',$this->idProduct);
		$criteria->compare('idPlace',$this->idPlace);
		$criteria->compare('importer',$this->importer,true);
		$criteria->compare('weight',$this->weight);
		$criteria->compare('price',$this->price);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ImportGoods the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
