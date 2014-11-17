<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "admins".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'admins';
    }
    
    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity( $id ) {
    	return static::findOne( $id );
    }
    
    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken( $token, $type = null ) {
    	return static::findOne( ['access_token' => $token] );
    }
    
    /**
     * Finds user by username
     *
     * @param  string $username
     * @return Admin
     */
    public static function findByUsername( $username ) {
    	return User::findOne( ['username' => $username] );
    }
    
    /**
     * @return int|string current user ID
     */
    public function getId() {
    	return $this->id;
    }
    
    /**
     * @return string current user auth key
     */
    public function getAuthKey() {
    	return $this->authKey;
    }
    
    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey( $authKey ) {
    	return $this->getAuthKey() == $authKey;
    }
    
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword( $password )
    {    	
    	return Yii::$app->getSecurity()->validatePassword( $password, $this->password );    	
    }
    
    public function beforeSave( $insert ) {
    	if ( parent::beforeSave( $insert ) ) {
    		if ( $this->isNewRecord ) {
    			$this->authKey = Yii::$app->getSecurity()->generateRandomString();
    		}
    		
    		return true;
    	}
    	
    	return false;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Tài Khoản',
            'password' => 'Mật Khẩu',
        ];
    }
}
