<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "report".
 *
 * @property int $id
 * @property int $order_id
 * @property int $days
 * @property string|null $detail
 * @property float $price
 * @property string $reason
 * @property int $help_id
 * @property int $quality_id
 *
 * @property Help $help
 * @property Order $order
 * @property Quality $quality
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'report';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'days', 'price', 'reason', 'help_id', 'quality_id'], 'required'],
            [['order_id', 'days', 'help_id', 'quality_id'], 'integer'],
            [['price'], 'number'],
            [['detail', 'reason'], 'string', 'max' => 255],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'id']],
            [['help_id'], 'exist', 'skipOnError' => true, 'targetClass' => Help::class, 'targetAttribute' => ['help_id' => 'id']],
            [['quality_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quality::class, 'targetAttribute' => ['quality_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'days' => 'Days',
            'detail' => 'Detail',
            'price' => 'Price',
            'reason' => 'Reason',
            'help_id' => 'Help ID',
            'quality_id' => 'Quality ID',
        ];
    }

    /**
     * Gets query for [[Help]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHelp()
    {
        return $this->hasOne(Help::class, ['id' => 'help_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['id' => 'order_id']);
    }

    /**
     * Gets query for [[Quality]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuality()
    {
        return $this->hasOne(Quality::class, ['id' => 'quality_id']);
    }
}
