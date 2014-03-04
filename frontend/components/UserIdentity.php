<?php 
class UserIdentity extends CUserIdentity
{
	private $_id;
	
	public function authenticate()
	{
		$record = Market::model()->findByAttributes(array('login'=>$this->username));
		
		if($record===null)
			$record = Worker::model()->findByAttributes(array('login'=>$this->username));

		if($record===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($record->password!==crypt($this->password, $record->getSoult($this->password)))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			$this->_id=$record->id;
			if (get_class($record) == 'Market') {
				$type = 'Admin';
				$idMarket = $record->id;
			} else if (get_class($record) == 'Worker') {
				if ($record->idPlace == 1)
					$type = 'WorkerWarehouse';
				else 
					$type = 'WorkerTradingRoom';
				$idMarket = $record->idMarket;
			}
			$this->setState('type', $type);
			$this->setState('idMarket', $idMarket);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
	{
		return $this->_id;
	}
}