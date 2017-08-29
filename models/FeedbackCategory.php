<?php

namespace bttree\smyfeedback\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%feedback_category}}".
 *
 * @property integer    $id
 * @property string     $name
 *
 * @property Feedback[] $feedbacks
 */
class FeedbackCategory extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%feedback_category}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'   => Yii::t('smy.feedback', 'ID'),
            'name' => Yii::t('smy.feedback', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery|Feedback[]
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['category_id' => 'id']);
    }

    /**
     * @param integer|null $id
     * @return array
     */
    public static function getAllArrayForSelect($id = null)
    {
        $query = self::find();
        if (!empty($id)) {
            $query->where(['!=', 'id', $id]);
        }

        return ArrayHelper::map($query->orderBy('id')->asArray()->all(), 'id', 'name');
    }
}