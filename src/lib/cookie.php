<?php
	/**
	 * Created by YiiMan.
	 * Programmer: gholamreza beheshtian
	 * Mobile:09353466620
	 * Site:http://yiiman.ir
	 * Date: 8/24/2018
	 * Time: 9:25 PM
	 */
	
	namespace Yiiman\YiiLibCookie\lib;
	
	
	use BadMethodCallException;
	use Yii;
    use yii\base\Component;
    use yii\web\BadRequestHttpException;
	
	class cookie extends Object1 {
		public $expire = self::MONTH;
		private $currentSessionId;
		public $SID = 'PHOMESID';
		
		
		const MINUTE = 60;
		const HOUR = 3600;
		const DAY = 86400;
		const WEEK = 604800;
		const MONTH = 2678400;
		
		public function init() {
			$this->currentSessionId = session_id();
			if (!empty(Yii::$app)){

                $this->SID              = hash( 'adler32' , $this->SID.Yii::$app->id );
            }else{

                $this->SID              = hash( 'adler32' , $this->SID );
            }
			if ( empty( ini_get( 'session.use_cookies' ) ) ) {
				throw new BadMethodCallException( 'لطفا در تنظیمات سرور، استفاده از کوکی ها را فعال نمایید' );
			}
			
			
			/* < UnpackData > */
			{
				if ( ! empty( $_COOKIE[ $this->SID ] ) ) {
					$pack         = json_decode( $_COOKIE[ $this->SID ] ,true);
					$this->object = [];
					
					if ( is_array( $pack ) ) {
						
						foreach ( $pack as $property => $value ) {
							$this->object[ $property ] = $value;
						}
					}
					$this->object = (object) $this->object;
				}
				
			}
			/* </ UnpackData > */
			
		}
		
		public function __set( $name , $value ) {
			
			parent::__set( $name , $value ); // TODO: Change the autogenerated stub
			
			
			$this->save();
			
		}
		
		public function save() {
			
			
			 setcookie( $this->SID , json_encode( $this->object ) , time()+$this->expire , '/' );
			 
			
		}
		
		
	}
